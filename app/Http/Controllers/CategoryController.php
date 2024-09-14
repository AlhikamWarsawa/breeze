<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CategoryController extends Controller
{
//    ------------------------------------------------------------------------------------------------------------------
    public function index(): View
    {
        $categories = category::latest()->paginate(10);
        return view('categories.index', compact('categories'));
    }

    //    ------------------------------------------------------------------------------------------------------------------
    public function create()
    {
        return view('categories.create');
    }

    //    ------------------------------------------------------------------------------------------------------------------
    public function store(Request $request)
    {
        $request->validate([
            'name_cat' => 'required|string|max:255',
            'desc_cat' => 'required|string',
        ]);
        $category = category::create([
            'name_cat' => $request->name_cat,
            'desc_cat' => $request->desc_cat,
        ]);
        return redirect()->route('categories.index');
    }

    //    ------------------------------------------------------------------------------------------------------------------
    public function show(category $category)
    {
        return view('categories.show', compact('category'));
    }

    //    ------------------------------------------------------------------------------------------------------------------
    public function edit(category $category)
    {
        return view('categories.edit', compact('category'));
    }

    //    ------------------------------------------------------------------------------------------------------------------
    public function update(Request $request, category $category)
    {
        $request->validate([
            'name_cat' => 'required|string|max:255',
            'desc_cat' => 'nullable|string',
        ]);

        $category->update([
            'name_cat' => $request->name_cat,
            'desc_cat' => $request->desc_cat,
        ]);

        return redirect()->route('categories.index')->with('success', 'Category updated successfully.');

    }

    //    ------------------------------------------------------------------------------------------------------------------
    public function destroy(category $category)
    {
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
    }
}
