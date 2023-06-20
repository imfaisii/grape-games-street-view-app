<?php

namespace App\Http\Controllers;

use App\Models\Media;
use App\Http\Requests\StoreMediaRequest;
use App\Http\Requests\UpdateMediaRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class MediaController extends Controller
{
    public function index()
    {
        $medias = Media::latest()->with('user')->paginate();

        return view('medias.index', compact('medias'));
    }

    public function create()
    {
        return view('medias.create');
    }

    public function edit(Media $media)
    {
        $media->load('user');

        return view('medias.edit', compact('media'));
    }

    public function store(StoreMediaRequest $request)
    {
        $fileName = $request->file->store('public');

        auth()->user()->medias()->create([
            'file' => Str::replace("public/", "", $fileName)
        ]);

        toastr()->success('Media was saved successfully.');
        return back();
    }

    public function destroy(Media $media)
    {
        Storage::disk('public')->delete($media->file);

        $media->delete();

        toastr()->success('Media was deleted successfully.');
        return back();
    }
}
