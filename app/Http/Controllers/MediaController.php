<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;

class MediaController extends Controller
{

    public function photo($folder , $path , $size = null)
    {

        $path = storage_path("app/$folder/".$path);

        if(!File::exists($path)) abort(404);

        $file = File::get($path);
        $type = File::mimeType($path);


        if ($size != null){
            $size = explode('x' , $size);
            if(is_numeric($size[0]) && is_numeric($size[1])){
                $width = $size[0];
                $height = $size[1];
                $manager = new \Intervention\Image\ImageManager();
                $image = $manager->make($file)->fit($width, $height, function ($constraint) {
                    $constraint->upsize();
                });

                $response = Response::make($image->encode($image->mime), 200);

                $response->header("CF-Cache-Status", 'HIF');
                $response->header("Cache-Control", 'max-age=604800, public');
                $response->header("Content-Type", $type);

                return $response;
            }else{
                abort(404);
            }
        }else{
            $manager = new \Intervention\Image\ImageManager();
            $image = $manager->make($file);

            $response = Response::make($image->encode($image->mime), 200);

            $response->header("CF-Cache-Status", 'HIF');
            $response->header("Cache-Control", 'max-age=604800, public');
            $response->header("Content-Type", $type);

            return $response;
        }
    }

    public function video($folder, $path)
    {
        $path = storage_path("app/$folder/".$path);

        $video = File::get($path);
        $type = File::mimeType($path);

        $response = Response::make($video, 200);

        $response->header("CF-Cache-Status", 'HIF');
        $response->header("Cache-Control", 'max-age=604800, public');
        $response->header('Content-Type', $type);
        return $response;


    }


}
