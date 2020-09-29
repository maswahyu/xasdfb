<?php

namespace App\Http\Controllers;

use App\Tag;
use App\News;
use App\Setting;
use App\Category;
use Carbon\Carbon;

use App\StickyBanner;
use Illuminate\Http\Request;
use App\Http\Resources\NewsCollection;

class PostController extends Controller
{
    public function category($category)
    {
    	$category = Category::detail($category);

	    if (!$category) {
	    	abort(404);
	    }

        if ($category->parent_id != Category::TOP_PARENT) {

            $slug = array(Category::SNEAKERLAND, Category::LENSA);

            if (!in_array($category->slug, $slug)) {
                return redirect($category->url);
            }
        }

	    $sticky 	 = News::getSticky(2, $category);
	    $latest 	 = News::getLatest(3, $category);
	    $recommended = News::getRecommended();
	    $type 	 	 = 1;

        $ads = [
            'url' => Setting::getConfig('banner_post_url'),
            'image' => Setting::getConfig('banner_post'),
        ];

	    return view('frontend.pages.category', [
			'category'         => $category,
            'head'             => $category,
			'type'             => $type,
			'stickyPosts'      => $sticky,
			'latestPosts'      => $latest,
			'recommendedPosts' => $recommended,
            'ads' => $ads
	    ]);
    }

    public function subcategory($category, $subcategory)
    {
    	$category = Category::detail($category);

	    if (!$category) {
	    	abort(404);
	    }

	    $subcategory = Category::detail($subcategory);

	    if (!$subcategory) {
	    	abort(404);
	    }

        if ($subcategory->parent_id == Category::TOP_PARENT) {

            return redirect($category->url);

        } else {

            $slug = array(Category::SNEAKERLAND, Category::LENSA);

            if (in_array($subcategory->slug, $slug)) {
                return redirect($subcategory->slug);
            }
        }

    	$sticky 	 = News::getSticky(2, $subcategory);
	    $latest 	 = News::getLatest(3, $subcategory);
	    $recommended = News::getRecommended();
	    $type 	 	 = 0;

        $ads = [
            'url' => Setting::getConfig('banner_post_url'),
            'image' => Setting::getConfig('banner_post'),
        ];

	    return view('frontend.pages.category', [
			'category'         => $category,
			'subcategory'      => $subcategory,
            'head'             => $subcategory,
			'type'             => $type,
			'stickyPosts'      => $sticky,
			'latestPosts'      => $latest,
			'recommendedPosts' => $recommended,
            'ads' => $ads
	    ]);
    }

    public function detailPost($category, $subcategory, $slug)
    {
        $slug = preg_replace('/~.+/', '', $slug);
    	$post = News::detail($slug);

    	if (!$post) {
	    	abort(404);
	    }

        $category = Category::detail($category);

        if (!$category) {
            return redirect($post->url);
        }

        $subcategory = Category::detail($subcategory);

        if (!$subcategory) {
            return redirect($post->url);
        }

        if ($subcategory->slug == Category::SNEAKERLAND) {
            return redirect(Category::SNEAKERLAND.'/'.$slug);
        }

        if ($subcategory->slug == Category::LENSA) {
            return redirect(Category::LENSA.'/'.$slug);
        }

	    $related = News::related($post->slug, $post->category_id);

        $ads = [
            'url' => Setting::getConfig('banner_post_url'),
            'image' => Setting::getConfig('banner_post'),
        ];
        $stickyBanner = StickyBanner::where([
            ['status', '=', 1],
            ['pub_day', '=', Carbon::now()->dayOfWeekIso],
            ['page', '=', StickyBanner::PAGE_ARTICLE]
        ])->first();
	    return view('frontend.pages.post', [
            'stickyBanner' => $stickyBanner,
	        'post' => $post,
	        'relatedPosts' => $related,
            'ads' => $ads
	    ]);
    }

    public function topPost($slug)
    {
        $slug = preg_replace('/~.+/', '', $slug);
        $post = News::detail($slug);

        if (!$post) {
            abort(404);
        }

        $related = News::related($post->slug, $post->category_id);

        $ads = [
            'url' => Setting::getConfig('banner_post_url'),
            'image' => Setting::getConfig('banner_post'),
        ];

        return view('frontend.pages.post', [
            'post' => $post,
            'relatedPosts' => $related,
            'ads' => $ads,
        ]);
    }

    public function tags($hashtag)
    {
    	return view('frontend.pages.tags');
    }

    public function feedTags(Request $request)
    {
		$hashtag = strip_tags($request->get('hashtag'));
		$page    = $request->get('page');

	    $posts = News::getNewsTags($page, $hashtag);
	    return response()->json(new NewsCollection($posts));
    }

    public function hitperform($id)
    {
    	$post = News::findOrFail($id);
    	$post->hit();

    	return response()->json(['status'=>'success'], 200);
    }
}
