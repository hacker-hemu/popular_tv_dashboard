<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\CategoryFormRequest;

class CategoryController extends Controller
{
    //index function
    public function index(){
//        view admin/category/index.blade.php file
        $category = Category::all();
        return view('admin.category.index', compact('category'));
    }

    //create function
    public function create(){
//        view admin/category/index.blade.php file
        return view('admin.category.create');
    }

    //store function
    public function store(CategoryFormRequest $request){
//        store value in category table in database
//        $data = $request->validate();
        $data = $request;

        $category = new Category;
        $category->name = $data['name'];
        $category->description = $data['description'];
        $category->status = $request->status == true ? '1' : '0';

        if($request->hasfile('image')){
            $file = $request->file('image');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move('uploads/category/', $fileName);
            $category->image = $fileName;
        }

        $category->save();
        return redirect('admin/category')->with('message', 'Category Added Successfully');

    }
}
