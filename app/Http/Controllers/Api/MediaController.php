<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\MediaResource;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MediaController extends Controller
{
    public function index()
    {
        $medias = Media::paginate();

        return MediaResource::collection($medias);
    }


    public function show(Media $media)
    {
        return new MediaResource($media);
    }

    public function destroy(Media $media)
    {
        Storage::disk('public')->delete($media->file);

        $media->delete();

        return response()->noContent();
    }
}
