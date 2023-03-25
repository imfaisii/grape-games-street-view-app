<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::withCount('locations')->paginate();

        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $category->update($request->validated());

        toastr()->success('Category was updated successfully.');
        return $this->index();
    }

    public function store(StoreCategoryRequest $request)
    {
        $data = $request->validated();

        auth()->user()->categories()->create($data);

        toastr()->success('Category was saved successfully.');
        return $this->index();
    }

    public function destroy(Category $category)
    {
        $category->delete();

        toastr()->success('Category was deleted successfully.');
        return back();
    }
}
