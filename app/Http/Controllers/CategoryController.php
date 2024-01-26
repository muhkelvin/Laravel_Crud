<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return view('Category.Category',[
            'categories' => Category::all()
        ]);
    }


    public function create()
    {
        return view('Category.AddCategory');
    }

    public function show(Category $category){
        $category->load('posts'); // Menggunakan eager loading untuk memuat data kategori dan posting terkait
        return view('Category.ShowCategory',[
//           'categories' => Category::with('posts')->find($category)
            'categories' => $category
        ]);
    }


    public function store(Request $request)
    {
        $request->validate([
           'name' => ['required','unique:categories']
        ]);

        Category::create([
            'name' => $request->name
        ]);

        return redirect()->route('admin.categories.create')->with(['succes' => 'Category created successfully']);
    }


    public function edit(Category $category)
    {
        $category = $category;
        return view('Category.UpdateCategory',compact('category'),[
            'categories' => $category
        ]);
    }


//    public function update(Request $request, $id)
//    {
//        $request->validate([
//            'name' => ['required','unique:categories,name,'.$id]
//        ]);
//
//        Category::find($id)->update([
//            'name' => $request->name
//        ]);
//
//        return redirect()->route('admin.categories.index')->with(['succesUpdate' => 'Category updated successfully']);
//    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => ['required', 'unique:categories,name,']
        ]);

        $category->update([
            'name' => $request->name
        ]);

        return redirect()->route('admin.categories.index')->with(['successUpdate' => 'Category updated successfully']);
    }

    public function destroy($id)
    {
       Category::find($id)->delete();
       return redirect()->back()->with(['succes' => 'Category deleted successfully']);
    }
}
