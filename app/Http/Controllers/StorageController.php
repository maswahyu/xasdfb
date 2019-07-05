<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class StorageController extends Controller
{
    /**
     * Get image from the old storage on the pimcore storage server.
     */
    public function oldImage(Request $request)
    {
        $file = $request->path();
        $file = urldecode(str_replace('website/var/', '/var/', $file));
        $file = Storage::disk('old')->get($file);
        return Image::make($file)->response('png');
    }
}
