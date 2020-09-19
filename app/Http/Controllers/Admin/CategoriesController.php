<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
        return view('admin.categories.index', ['categories' => Category::all()]);
    }

    public function create()
    {
         return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required'
        ]);
        Category::create($request->all());

        return redirect()->route('categories.index');
    }

    public function edit($id)
    {
        return view('admin.categories.edit', ['category' => Category::find($id)]);
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
            'title' => 'required'
        ]);
        $category = Category::find($id);
        $category->update($request->all());

        return redirect()->route('categories.index');
    }

    public function destroy($id)
    {
        Category::destroy($id);

        return redirect()->route('categories.index');
    }
}