<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Location;
use App\Traits\Jsonify;
use Illuminate\Http\JsonResponse;

class LocationController extends Controller
{
    use Jsonify;

    public function getAllLocations(): JsonResponse
    {
        $data = Location::all()->map(fn ($location) => [
            'isVar' => $location->isVar,
            'Title' => $location->Title,
            'imgUrl' => $location->image_url,
            'country' => $location->country,
            'city' => $location->city,
            'details' => $location->details,
            'category' => $location->category->name
        ]);

        return self::success(data: $data);
    }

    public function getAllLocationsByCategoryName(string $name): JsonResponse
    {
        $data = Location::whereHas('category', function ($q) use ($name) {
            $q->select('name')->whereName($name);
        })->get()->map(fn ($location) => [
            'isVar' => $location->isVar,
            'Title' => $location->Title,
            'imgUrl' => $location->image_url,
            'country' => $location->country,
            'city' => $location->city,
            'details' => $location->details,
            'category' => $location->category->name
        ]);

        return self::success(data: $data);
    }
}
