<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function store(Request $request)
        {
            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            // Faz o upload do arquivo para o S3
            $path = Storage::disk('s3')->put('images', $request->file('image'));

            // Obtenha a URL do arquivo no S3
            $url = Storage::disk('s3')->url($path);

            return response()->json(['url' => $url], 200);
        }
}
