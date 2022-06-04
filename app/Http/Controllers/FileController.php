<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function listFiles(){

        $files = File::all(); // Model
        return view('files', compact('files'));

    }
    public function uploadFile(Request $request){

        $file = $request->file('file');
        $real_name = $file->getClientOriginalName();
        $name = rand(1, 1000000);

        // upload to s3
        Storage::disk('s3')->put($name, file_get_contents($file), 'public');

        File::create([
            'real_name' => $real_name,
            'name' => $name
        ]);

        return redirect("/");
    }
}
