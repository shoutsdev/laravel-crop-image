<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('image_crop');
    }

    public function cropImage(Request $request): \Illuminate\Http\JsonResponse
    {
        $data = $request->image;

        list($type, $data) = explode(';', $data);
        list(, $data)      = explode(',', $data);

        $folder     = public_path() . "/upload/";
        if (!is_dir($folder)) {
            mkdir($folder, 0777, true);
        }
        $data       = base64_decode($data);
        $image_name = time().'.png';
        $path       = $folder . $image_name;

        file_put_contents($path, $data);

        return response()->json(['success'=>'done']);
    }
}
