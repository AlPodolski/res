<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function index($size, $path)
    {
        $size = explode('-', $size);

        $path = (storage_path('app/public/'.$path));

        $format = 'jpg';

        if (strpos($path, '.webp')) {

            $format = 'webp';

            header('Content-type: ' . 'image/webp');
            $path = str_replace('.webp', '.jpg', $path);

        }
        else header('Content-type: ' . 'image/jpeg');

        if (!is_file($path)) abort(404);
        if (!is_array($size)) abort(404);

        $img = \Intervention\Image\Facades\Image::cache(function($image) use ($path, $size) {
            return $image->make($path)->resize($size[0], $size[1], function ($constraint) {
                $constraint->aspectRatio();
            });
        }, 3600 * 365, true);

        echo ($img->response($format)->content());

        exit();
    }
}
