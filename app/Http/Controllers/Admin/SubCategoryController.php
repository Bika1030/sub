<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    //
    public function index()
    {
       $subcategories = SubCategory::all();
       return view('admin.subcategory.index',compact('subcategories'));
    }
    public function create()
    {
       $categories= Category::all();
       return view('admin.subcategory.create', compact('categories'));
    }
    public function store(Request $request)
    {
       $validatedData = $request->validate([
         'category_id' => 'required|exists:categories,id',
         'name' => 'required|string|max:100|unique:sub_categories'
       ]);

       SubCategory::create([
        'category_id' => $validatedData['category_id'],
        'name' => $validatedData['name'],
        'slug' => $validatedData['name']
       ]);

       return redirect('admin/subcategory')->with('message','SubCategory created succesfully');
    }
    public function edit($id)
    {
       $subcategories = SubCategory::all();
       return view('admin.subcategory.index',compact('subcategories'));
    }

    public function update(Request $request, $id)
    {
        $subcategories = SubCategory::find($id);

        $validatedData = $request->validate([
            "name" => "required|max:50|unique:categories,name," . $subcategories->id,
            "slug" => "required|max:50|unique:categories,slug," . $subcategories->id,
        ]);


        $validatedData['status'] = $request->status == true ? '1':'0';

        $subcategories->update($validatedData);

        return redirect('admin/subcategory')->with('message','SubCategory updated successfully');
    }

}
