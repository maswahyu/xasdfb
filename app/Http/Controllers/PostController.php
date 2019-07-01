<?php

namespace App\Http\Controllers;

use App\News;
use App\Http\Repository\CategoryRepository;
use App\Http\Repository\NewsRepository;
use Faker\Factory as Faker;

use Illuminate\Http\Request;

class PostController extends Controller
{	
	protected $catRepo;
	protected $newsRepo;

	function __construct(CategoryRepository $catRepo, NewsRepository $newsRepo)
	{
		$this->catRepo = $catRepo;
		$this->newsRepo = $newsRepo;
	}

    public function category($category)
    {	
    	$category = $this->catRepo->findByField('slug', $category);

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
    	$category = $this->catRepo->findByField('slug', $category);

	    if (!$category) {
	    	abort(404);
	    }

	    $subcategory = $this->catRepo->findByField('slug', $subcategory);

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
    	$post = $this->newsRepo->findByField('slug', $slug);
    	if (!$post) {
	    	abort(404);
	    }

	    $related = News::related($post->slug);

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
