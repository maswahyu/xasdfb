<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class StorageController extends Controller
{
    /**
     * Get image from the old storage on the pimcore storage server.
     * Biasanya dari news content.
     */
    public function oldImage(Request $request)
    {
        $file = $request->path();
        $file = urldecode(str_replace('website/var/', '/var/', $file));
        $file = Storage::disk('old')->get($file);
        return Image::make($file)->response('png');
    }

    /**
     * Handle news cover image yang ada url path nya.
     * Contoh: lazone.id/news/2019/blablabla/blebleble/blobloblo.jpg
     */
    public function oldImageNewsCover(Request $request, $year)
    {
        $file = $request->path();
        $file = urldecode(str_replace('news/', '/var/assets/news/', $file));
        $file = Storage::disk('old')->get($file);
        return Image::make($file)->response('png');
    }

    /**
     * Handle news cover image yang direct ke file url dari root.
     * Contoh: lazone.id/filename.jpg
     */
    public function oldImageNewsCoverDirectFile(Request $request, $filename, $extension)
    {
        $file = $request->path();
        $file = urldecode('/var/assets/' . $file);
        $file = Storage::disk('old')->get($file);
        return Image::make($file)->response('png');
    }
}
