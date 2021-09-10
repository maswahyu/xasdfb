<?php

namespace App\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use Image;
use Storage;

class FileUploadedListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        foreach ($event->files() as $file) {
            if($this->isImage($file['extension'])) {
                // save image with quality to optimize the size
                Image::make(Storage::disk($event->disk())->path($file['path']))
                    ->save(null, 85);
            }
        }
    }

    /**
     * check if file format is image
     */
    private function isImage($extension)
    {
        $supported_image = [
            'gif',
            'jpg',
            'jpeg',
            'png'
        ];

        if (in_array($extension, $supported_image)) {
            return true;
        } else {
            return false;
        }
    }
}
