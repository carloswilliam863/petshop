<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class ImageController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $uploadedFileUrl = Cloudinary::upload($request->file('image')->getRealPath())->getSecurePath();
        

        // Salve a URL no banco de dados ou use conforme necessário
        return redirect()->back()->with('success', 'Imagem enviada com sucesso!');
    }
}
