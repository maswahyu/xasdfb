<?php

namespace App\Http\Controllers;

use App\News;
use App\Category;
use Faker\Factory as Faker;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function category($category)
    {	
    	$category = Category::detail($category);

	    if (!$category) {
	    	abort(404);
	    }

	    $sticky 	 = News::getSticky(2);
	    $latest 	 = News::getLatest(3);
	    $recommended = News::getRecommended();

	    return view('frontend.pages.category', [
			'category'         => $category,
			'stickyPosts'      => $sticky,
			'latestPosts'      => $latest,
			'recommendedPosts' => $recommended,
	    ]);
    }

    public function subcategory($category, $subcategory)
    {	
    	$category = Category::detail($category);

	    if (!$category) {
	    	abort(404);
	    }

	    $subcategory = $category = Category::detail($subcategory);

	    if (!$subcategory) {
	    	abort(404);
	    }

    	$sticky 	 = News::getSticky(2);
	    $latest 	 = News::getLatest(3);
	    $recommended = News::getRecommended();

	    return view('frontend.pages.category', [
	        'category' => $category,
	        'stickyPosts' => $sticky,
	        'latestPosts' => $latest,
	        'recommendedPosts' => $recommended,
	    ]);
    }

    public function detailPost($category, $subcategory, $slug)
    {	
    	$post = News::detail($slug);
    	if (!$post) {
	    	abort(404);
	    }

	    $related = News::related($post->slug, $post->category_id);

	    return view('frontend.pages.post', [
	        'post' => $post,
	        'relatedPosts' => $related,
	    ]);
    }

    public function tags($lug)
    {
    	return view('frontend.pages.search');
    }
}
