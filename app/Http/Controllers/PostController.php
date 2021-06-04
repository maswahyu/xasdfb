<?php

namespace App\Http\Controllers;

use App\Tag;
use App\News;
use App\Setting;
use App\Category;
use Carbon\Carbon;

use App\StickyBanner;
use App\NewsBanner;
use Illuminate\Http\Request;
use App\ShareNewsChannel;
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
	    $recommended = News::getRecommended(4);
	    $type 	 	 = 1;

        $ads = [
            'url' => Setting::getConfig('banner_ads_post_url'),
            'image' => Setting::getConfig('banner_ads_post_desktop'),
            'image_mobile' => Setting::getConfig('banner_ads_post_mobile'),
            'banner_mypoint_dekstop' => Setting::getConfig('banner_mypoint_dekstop'),
            'banner_mypoint_mobile' => Setting::getConfig('banner_mypoint_mobile'),
            'banner_mypoint_title' => Setting::getConfig('banner_mypoint_title'),
            'banner_mypoint_summary' => Setting::getConfig('banner_mypoint_summary'),
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
                dd('sneaker or lensa');
                return redirect($subcategory->slug);
            }
        }

    	$sticky 	 = News::getSticky(2, $subcategory);
	    $latest 	 = News::getLatest(3, $subcategory);
	    $recommended = News::getRecommended();
	    $type 	 	 = 0;

        $ads = [
            'url' => Setting::getConfig('banner_ads_post_url'),
            'image' => Setting::getConfig('banner_ads_post_desktop'),
            'image_mobile' => Setting::getConfig('banner_ads_post_mobile'),
            'banner_mypoint_dekstop' => Setting::getConfig('banner_mypoint_dekstop'),
            'banner_mypoint_mobile' => Setting::getConfig('banner_mypoint_mobile'),
            'banner_mypoint_title' => Setting::getConfig('banner_mypoint_title'),
            'banner_mypoint_summary' => Setting::getConfig('banner_mypoint_summary'),
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

        if($post->category_id != $subcategory->id){
            return redirect($post->url, 301);
        }

        if ($subcategory->slug == Category::SNEAKERLAND) {
            return redirect(Category::SNEAKERLAND.'/'.$slug);
        }

        if ($subcategory->slug == Category::LENSA) {
            return redirect(Category::LENSA.'/'.$slug);
        }

	    $related = News::related($post->slug, $post->tags, $post->category_id);

        // inject read more artikel
        if (isset($post->readMore) && count($post->readMore) > 0) {
            $limit = count($post->readMore);

            $needle = "<br />\r\n<br />";
            $token = explode($needle, $post->content);
            if(count($token) < 3) {
                $needle = "<p>";
                $token = explode($needle, $post->content);
            }
            if($token[0] == '') {
                \array_shift($token);
            }
            foreach ($post->readMore as $key => $row) {

                $inlineRecomended = News::find($row->news_more_id);

                $inlineHtml = '<p class="post-content__recommend" style="text-align:left;">Baca Juga: <span class="post-content__recommend--title"><a style="color: #ec2427;" href="'.$inlineRecomended->url.'?utm_source=DetailArticle&utm_medium=BacaJuga&utm_campaign=BacaJuga">' . $inlineRecomended->title . "</a></span></p>";

                if ($key == 0) {
                    $stars = $key + 2;
                } else {
                    $stars = $key * 5 + 2;
                }

                if(count($token) > 2) {
                    if(\array_key_exists($stars, $token)) {
                        $token[$stars] .= $inlineHtml;
                        $post->content = implode($needle, $token);
                    }
                } else {
                    $post->content .= $inlineHtml;
                    break;
                }
            }

        } else {
            /* DICOMMENT DULU, DISURUH ILHAM, SAKSINA MALIKI & ABHI */
            // $inlineRecomended = News::getRecommended(News::TAKE_RECOMENDED, true, $post);
            // if($inlineRecomended) {
            //     $needle = "<br />\n<br />";
            //     $token = explode($needle, $post->content);
            //     $inlineHtml = '<p class="post-content__recommend" style="text-align:left;">Baca Juga: <span class="post-content__recommend--title"><a style="color: #ec2427;" href="'.$inlineRecomended->url.'?utm_source=DetailArticle&utm_medium=BacaJuga&utm_campaign=BacaJuga">' . $inlineRecomended->title . "</a></span></p>";

            //     if(\array_key_exists(count($token) - 4, $token)) {
            //         $token[count($token) - 4] .= $inlineHtml;
            //         $post->content = implode($needle, $token);
            //     } else {
            //         $needle = "<p>";
            //         $token = explode($needle, $post->content);
            //         $inlineHtml = '<p class="post-content__recommend" style="text-align:left;">Baca Juga: <span class="post-content__recommend--title"><a style="color: #ec2427;" href="'.$inlineRecomended->url.'?utm_source=DetailArticle&utm_medium=BacaJuga&utm_campaign=BacaJuga">' . $inlineRecomended->title . "</a></span></p>";

            //         if(\array_key_exists(count($token) - 4, $token)) {
            //             $token[count($token) - 4] .= $inlineHtml;
            //             $post->content = implode($needle, $token);
            //         } else {
            //             $post->content .= $inlineHtml;
            //         }
            //     }
            // }
        }

        $ads = [
            'url' => Setting::getConfig('banner_ads_post_url'),
            'image' => Setting::getConfig('banner_ads_post_desktop'),
            'image_mobile' => Setting::getConfig('banner_ads_post_mobile'),
            'banner_type' => Setting::getConfig('banner_type'),
            'banner_post_mobile' => Setting::getConfig('banner_post_mobile'),
            'banner_post_dekstop' => Setting::getConfig('banner_post_dekstop'),
            'banner_post_title' => Setting::getConfig('banner_post_title'),
            'banner_post_summary' => Setting::getConfig('banner_post_summary'),
            'banner_post_url' => Setting::getConfig('banner_post_url'),
        ];

        $banner = NewsBanner::detail($post->id);

	    return view('frontend.pages.post', [
            'post' => $post,
	        'relatedPosts' => $related,
            'ads' => $ads,
            'banner' => $banner
	    ]);
    }

    public function topPost($slug)
    {
        $slug = preg_replace('/~.+/', '', $slug);
        $post = News::detail($slug);

        if (!$post) {
            abort(404);
        }

        if(!in_array($post->category_slug, [News::LENSAPHOTO, News::SNEAKERLAND])){
             return redirect($post->url, 301);
        }

        $related = News::related($post->slug, $post->tags, $post->category_id);

        $ads = [
            'url' => Setting::getConfig('banner_ads_post_url'),
            'image' => Setting::getConfig('banner_ads_post_desktop'),
            'image_mobile' => Setting::getConfig('banner_ads_post_mobile'),
            'banner_type' => Setting::getConfig('banner_type'),
            'banner_post_mobile' => Setting::getConfig('banner_post_mobile'),
            'banner_post_dekstop' => Setting::getConfig('banner_post_dekstop'),
            'banner_post_title' => Setting::getConfig('banner_post_title'),
            'banner_post_summary' => Setting::getConfig('banner_post_summary'),
            'banner_post_url' => Setting::getConfig('banner_post_url'),
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

    public function hitShareButton(Request $request) {
        ShareNewsChannel::newRecord($request);
        return response()->json()->setStatusCode(200);
    }

}
