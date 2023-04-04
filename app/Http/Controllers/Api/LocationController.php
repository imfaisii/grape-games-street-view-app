<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Location;
use App\Traits\Jsonify;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class LocationController extends Controller
{
    use Jsonify;

    public function getAllLocations(Request $request): JsonResponse
    {
        $query = Location::query();
        $fillables = app(Location::class)->getFillable();
        $filters = $request->all();

        foreach ($filters as $column => $value) {
            if (in_array($column, $fillables)) {
                $query->where($column, 'LIKE', "%$value%");
            }
        }

        $data = $query->get()->map(fn ($location) => [
            'id' => $location->id,
            'isFav' => $location->isFav,
            'Title' => $location->Title,
            'imgUrl' => $location->image_url,
            'country' => $location->country,
            'city' => $location->city,
            'details' => $location->details,
            'category' => $location?->category?->name ?? 'Not found.'
        ]);

        return self::success(data: $data);
    }

    public function getAllLocationsByCategoryName(Request $request, string $name): JsonResponse
    {
        $query = Location::query();
        $fillables = app(Location::class)->getFillable();
        $filters = $request->all();

        foreach ($filters as $column => $value) {
            if (in_array($column, $fillables)) {
                $query->where($column, 'LIKE', "%$value%");
            }
        }

        $data = $query->whereHas('category', function ($q) use ($name) {
            $q->select('name')->whereName($name);
        })->get()->map(fn ($location) => [
            'id' => $location->id,
            'isFav' => $location->isFav,
            'Title' => $location->Title,
            'imgUrl' => $location->image_url,
            'country' => $location->country,
            'city' => $location->city,
            'details' => $location->details,
            'category' => $location?->category?->name ?? 'Not found.'
        ]);

        return self::success(data: $data);
    }
}
