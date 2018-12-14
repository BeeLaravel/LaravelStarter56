<?php
namespace App\Http\Controllers\Resource;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;

use App\Models\Resource\Image;
use App\Logics\Resource\ImageRepository;

class ImageController extends Controller {
    protected $image;

    public function __construct(ImageRepository $imageRepository) {
        $this->image = $imageRepository;
    }

    public function getUpload() {
        return view('resource.image.upload');
    }
    public function getServerImagesPage() {
        return view('resource.image.upload2');
    }
    public function getUpload3() {
        return view('resource.image.upload3');
    }

    public function postUpload() {
        $photo = Input::all();
        return $this->image->upload($photo);
    }
    public function deleteUpload() {
        $filename = Input::get('id');

        if ( !$filename ) return 0;

        return $this->image->delete($filename);
    }
    public function getServerImages() {
        $images = Image::get(['original_name', 'filename']);

        $imageAnswer = [];

        foreach ( $images as $image ) {
            $imageAnswer[] = [
                'original' => $image->original_name,
                'server' => $image->filename,
                'size' => File::size(public_path('images/full_size/' . $image->filename))
            ];
        }

        return response()->json([
            'images' => $imageAnswer
        ]);
    }
}
