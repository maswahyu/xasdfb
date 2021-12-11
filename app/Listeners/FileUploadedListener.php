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
                // replace space in file name
                $file_path = $file['path'];
                $file_path = explode('/', $file_path);
                $filename = \array_pop($file_path);
                $has_space_name = strpos($filename, ' ');
                $filename = str_replace(' ', '-', $filename);
                $file_path = implode('/', $file_path) . "/$filename";
                $file_path = Storage::disk($event->disk())->path('') . $file_path;
                // save image with quality to optimize the size
                if(Image::make(Storage::disk($event->disk())->path($file['path']))
                    ->save($file_path, 80) && $has_space_name) {
                        // deleting old file
                        Storage::disk($event->disk())->delete($file['path']);
                    }
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
