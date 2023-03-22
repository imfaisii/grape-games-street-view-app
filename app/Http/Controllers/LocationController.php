<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Http\Requests\StoreLocationRequest;
use App\Http\Requests\UpdateLocationRequest;
use App\Models\Category;

class LocationController extends Controller
{
    public function index()
    {
        $locations = Location::paginate();

        return view('locations.index', compact('locations'));
    }

    public function create()
    {
        $categories = Category::all();

        return view('locations.create', compact('categories'));
    }

    public function upload($file): string
    {
        return $file->store('images', 'public');
    }

    public function store(StoreLocationRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('imgUrl')) {
            $data['imgUrl'] = $this->upload($data['imgUrl']);
        }

        auth()->user()->locations()->create($data);
        toastr()->success('Location was saved successfully.');

        return back();
    }

    public function destroy(Location $location)
    {
        $location->delete();

        toastr()->success('Location was deleted successfully.');
        return back();
    }
}
