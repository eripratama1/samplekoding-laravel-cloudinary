<?php

namespace App\Http\Controllers;

use App\Models\Image;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Http\Request;

class CloudinaryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $uploadedFile = $request->file('file');
        /**
         * Proses upload file image ke cloudinary storage
         * dimana gambar tersebut akan disimpan ke dlaman folder "UploadImages"
         */
        $uploadResult = Cloudinary::upload($uploadedFile->getRealPath(),[
            'folder' => 'UploadImages'
        ]);

        /**
         * Store data link dari file gambar dan public_id ke db, yang mana link tersebut kita dapatkan dari proses
         * upload file image ke cloudinary
         */
        Image::create([
            'image_url' => $uploadResult->getSecurePath(),
            'public_id' => $uploadResult->getPublicId(),
        ]);

        return to_route('cloudinary.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
