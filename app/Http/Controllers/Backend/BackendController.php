<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\File;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class BackendController extends Controller
{
    public function index(): View
    {
        $file = File::first();
        return view('backend.index', [
            'file' => $file
        ]);
    }

    public function upload(Request $request)
    {
        $image = $request->file('image');

        if ($image) {
            $name = time().'_'.$image->getClientOriginalName();

            //$path = $image->storeAs('images', $name, 'public');
            $path = \Storage::disk('public')->put('images/'.$name, $image->getContent());

            $file = new File();
            $file->name = $name;
            $file->path = $path;
            $file->user()->associate(auth()->user());
            $file->save();
        }
    }

    public function image(File $file)
    {
        $image = \Storage::disk('public')->get($file->path);

        return \Storage::disk('public')->writeStream($file->path);
    }
}
