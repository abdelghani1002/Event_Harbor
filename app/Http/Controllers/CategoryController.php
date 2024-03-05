<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Exception;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::latest()->paginate(4);
        return view("admin.categories.index", compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.categories.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        $data = $request->validated();
        if ($request->hasFile('photo')) {
            $photoName = uniqid("category_") . '.' . $request->photo->extension();
            if (!$request->photo->move(public_path('storage/photos'), $photoName))
                return redirect()->route("categories.create")->with('error', "Error wihing storing category photo");
            $data['photo_src'] = $photoName;
        }
        Category::create($data);
        return redirect()->route("categories.index", [], 201)->with('success', "Category created successfully.");
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view("admin.categories.edit", compact("category"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $data = $request->validated();
        if ($request->hasFile('photo')) {
            if (file_exists(public_path('storage/photos/') . $category->photo_src))
                unlink(public_path('storage/photos/') . $category->photo_src);
            $photoName = uniqid("category_") . '.' . $request->photo->extension();
            $data['photo_src'] = $photoName;
            if (!$request->photo->move(public_path('storage/photos'), $photoName))
                return redirect()->route("categories.create")->with('error', "Error wihing storing category photo");
        }
        $category->update($data);
        return redirect()->route("categories.index")->with('success', "category updated successfully.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        if (file_exists(public_path('storage/photos/') . $category->photo_src))
            unlink(public_path('storage/photos/') . $category->photo_src);
        $category->delete();
        return redirect()->back()->with("success", "Category has been deleted successfully");
    }
}
