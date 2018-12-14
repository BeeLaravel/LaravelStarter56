<?php
namespace App\Logics\Resource;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\File;

use Intervention\Image\ImageManager;

use App\Models\Resource\Image;

class ImageRepository {
    public function upload($form_data) {
        $validator = Validator::make($form_data, Image::$rules, Image::$messages);

        if ( $validator->fails() ) {
            return Response::json([
                'error' => true,
                'message' => $validator->messages()->first(),
                'code' => 400
            ], 400);
        }

        $photo = $form_data['file'];
        $original = $photo->getClientOriginalName();
        $extension = $photo->getClientOriginalExtension();
        $originalWithoutExt = substr($original, 0, strlen($original) - strlen($extension) - 1);

        $filename = $this->sanitize($originalWithoutExt);
        $filename = $this->createUniqueFilename($filename, $extension);

        $original_image = $this->original($photo, $filename);
        $thumbnail_image_w200 = $this->thumbnail($photo, $filename);
        $thumbnail_image_h200 = $this->thumbnail($photo, $filename);

        if ( !$original_image || !$thumbnail_image ) {
            return Response::json([
                'error' => true,
                'message' => 'Server error while uploading',
                'code' => 500
            ], 500);
        }

        $image = new Image;
        $image->filename = $filename;
        $image->original = $original;
        $image->extension = $extension;
        $image->mime = $original_image->mime();
        $image->width = $original_image->width();
        $image->height = $original_image->height();
        $image->save();

        return Response::json([
            'error' => false,
            'code'  => 200,
            'filename' => $filename
        ], 200);
    }
    public function delete($filename) {
        $full_size_dir = Config::get('images.original');
        $icon_size_dir = Config::get('images.thumbnail');

        $sessionImage = Image::where('filename', 'like', $filename)->first();

        if ( empty($sessionImage) ) {
            return Response::json([
                'error' => true,
                'code'  => 400
            ], 400);
        }

        $full_path1 = $full_size_dir . $sessionImage->filename;
        $full_path2 = $icon_size_dir . $sessionImage->filename;

        if ( File::exists($full_path1) ) File::delete($full_path1);
        if ( File::exists($full_path2) ) File::delete($full_path2);
        if ( !empty($sessionImage) ) $sessionImage->delete();

        return Response::json([
            'error' => false,
            'code'  => 200
        ], 200);
    }

    public function original($photo, $filename) {
        $manager = new ImageManager();
        $filenameWithPath = Config::get('images.original') . $filename;

        return $manager->make($photo)->save($filenameWithPath);
    }
    public function thumbnail($photo, $filename, $size=200) {
        $manager = new ImageManager();
        $filenameWithPath = Config::get('images.thumbnail') . $filename;

        return $manager->make($photo)->resize($size, null, function($constraint) {
            $constraint->aspectRatio();
        })
        ->save($filenameWithPath);
    }
    public function thumbnailv($photo, $filename, $size=200) {
        $manager = new ImageManager();
        $filenameWithPath = Config::get('images.thumbnail') . $filename;

        return $manager->make($photo)->resize(null, $size, function($constraint) {
            $constraint->aspectRatio();
        })
        ->save($filenameWithPath);
    }

    public function sanitize($string, $force_lowercase=true, $anal=false) {
        $strip = [
            "~", "`", "!", "@", "#", "$", "%", "^", "&", "*", "(", ")", "_", "=", "+", "[", "{", "]",
            "}", "\\", "|", ";", ":", "\"", "'",
            "&#8216;", "&#8217;", "&#8220;", "&#8221;", "&#8211;", "&#8212;",
            "â€”", "â€“", ",", "<", ".", ">", "/", "?"
        ];

        $clean = trim(str_replace($strip, "", strip_tags($string)));
        $clean = preg_replace('/\s+/', "-", $clean);
        $clean = ($anal) ? preg_replace("/[^a-zA-Z0-9]/", "", $clean) : $clean;

        return $force_lowercase ? (
            function_exists('mb_strtolower') ? mb_strtolower($clean, 'UTF-8') : strtolower($clean)
        ) : $clean;
    }
    public function createUniqueFilename($filename, $extension) {
        $original_path = Config::get('images.original');
        $originalWithPath = $original_path . $filename . '.' . $extension;

        if ( File::exists( $originalWithPath ) ) {
            $imageToken = substr(sha1(mt_rand()), 0, 5);
            return $filename . '-' . $imageToken . '.' . $extension;
        } else {
            return $filename . '.' . $extension;
        }
    }
}
