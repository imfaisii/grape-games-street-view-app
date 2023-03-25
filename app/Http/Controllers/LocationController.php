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
        $locations = Location::with('category')->paginate();

        return view('locations.index', compact('locations'));
    }

    public function create()
    {
        $categories = Category::all();

        return view('locations.create', compact('categories'));
    }

    public function edit(Location $location)
    {
        $categories = Category::all();

        return view('locations.edit', compact('location', 'categories'));
    }

    public function update(UpdateLocationRequest $request, Location $location)
    {
        $data = $request->validated();

        if ($request->hasFile('imgUrl')) {
            $data['imgUrl'] = parent::upload($data['imgUrl']);
        }

        $location->update($data);

        toastr()->success('Location was updated successfully.');
        return $this->index();
    }

    public function store(StoreLocationRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('imgUrl')) {
            $data['imgUrl'] = parent::upload($data['imgUrl']);
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
