<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;

class StorageController extends Controller
{
    /**
     * Set cache-control to cache images for 1 year. No need to re-download images from server.
     * @return void
     */
    private function cacheControl()
    {
        header_remove('Pragma');
        header_remove('Cache');
        header_remove('Expires');
        header_remove('Content-Type');

        /* cache for 1 year */
        header('Pragma: public');
        header('Cache-Control: max-age=31536000');
        header('Expires: '. gmdate('D, d M Y H:i:s \G\M\T', time() + 31536000));
        header('Content-Type: image/png');
    }

    /**
     * Handle semua image selain old image dari pimcore.
     */
    public function imageHandler(Request $request)
    {
        try {
            $file = $request->path();
            $file = urldecode(str_replace('storage/', '/', $file));

            if (strpos($file, '.gif') !== true) {
                $path = storage_path('app/public' . $file);
                $file = File::get($path);
                $type = File::mimeType($path);

                $response = Response::make($file, 200);
                $response->header("Content-Type", $type);
                return $response;
            }

            $file = Storage::disk('local')->get($file);

            $this->cacheControl();
            echo Image::make($file)->encode('png');
        } catch (\Exception $e) {
            abort(404);
        }
    }

    /**
     * Get image from the old storage on the pimcore storage server.
     * Biasanya dari news content.
     */
    public function oldImage(Request $request)
    {
        try {
            $file = $request->path();
            $file = urldecode(str_replace('website/var/', '/var/', $file));
            $file = Storage::disk('local')->get($file);

            $this->cacheControl();
            echo Image::make($file)->encode('png');
        } catch (\Exception $e) {
            abort(404);
        }
    }

    /**
     * Handle news cover image yang ada url path nya.
     * Contoh:
     *     > lazone.id/news/2019/blablabla/blebleble/blobloblo.jpg
     *     > lazone.id/news/blablabla/blebleble/blobloblo.jpg
     */
    public function oldImageNewsCover(Request $request, $year)
    {
        try {
            $file = $request->path();
            $file = urldecode(str_replace('news/', '/var/assets/news/', $file));
            $file = Storage::disk('local')->get($file);

            $this->cacheControl();
            echo Image::make($file)->encode('png');
        } catch (\Exception $e) {
            abort(404);
        }
    }

    /**
     * Handle news cover image yang direct ke file url dari root.
     * Contoh: lazone.id/filename.jpg
     */
    public function oldImageNewsCoverDirectFile(Request $request, $filename, $extension)
    {
        $file = $request->path();
        $file = urldecode('/var/assets/' . $file);
        $file = Storage::disk('local')->get($file);

        $this->cacheControl();
        echo Image::make($file)->encode('png');
    }

    /**
     * Handle event Community images.
     * Contoh: lazone.id/Community/blablabl/filename.jpg
     */
    public function eventOldImage(Request $request)
    {
        $file = $request->path();
        $file = urldecode(str_replace('Community/', '/var/assets/Community/', $file));
        $file = Storage::disk('local')->get($file);

        $this->cacheControl();
        echo Image::make($file)->encode('png');
    }

    /**
     * Handle gallery photo images.
     * Contoh: lazone.id/gallery-photos/blablabl/filename.jpg
     */
    public function galleryPhotoOldImage(Request $request)
    {
        $file = $request->path();
        $file = urldecode(str_replace('gallery-photos/', '/var/assets/gallery-photos/', $file));
        $file = Storage::disk('local')->get($file);

        $this->cacheControl();
        echo Image::make($file)->encode('png');
    }
}
