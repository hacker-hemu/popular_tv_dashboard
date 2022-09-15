<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\CategoryFormRequest;

class CategoryController extends Controller
{
    //index function
    public function index()
    {
//        view admin/category/index.blade.php file
        $category = Category::all();
        return view('admin.category.index', compact('category'));
    }

    //create function
    public function create()
    {
//        view admin/category/index.blade.php file
        return view('admin.category.create');
    }

    //store function for save data to database
    public function store(CategoryFormRequest $request)
    {
//        store value in category table in database
        $data = $request;

        $category = new Category();
        $category->name = $data['name'];
        $category->description = $data['description'];
        $category->status = $request->status == true ? '1' : '0';

        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move('uploads/category/', $fileName);
            $category->image = $fileName;
        }

        $category->save();
        return redirect('admin/category')->with('message', 'Category Added Successfully');

    }

    //edit function for get data for edit
    public function edit($category_id)
    {
        $category = Category::find($category_id);
        return view('admin.category.edit', compact('category'));
    }

    //update function for update data to database
    public function update(CategoryFormRequest $request, $category_id)
    {
//        store value in category table in database
        $data = $request;

        $category = Category::find($category_id);
        $category->name = $data['name'];
        $category->description = $data['description'];
        $category->status = $request->status == true ? '1' : '0';

        if ($request->hasfile('image')) {

//            deleting existing image
            $destination = 'uploads/category/'.$category->image;
            if(File::exists($destination)){
                File::delete($destination);
            }

            $file = $request->file('image');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move('uploads/category/', $fileName);
            $category->image = $fileName;
        }

        $category->update();
        return redirect('admin/category')->with('message', 'Category Updated Successfully');

    }

    //delete data from database
    public function destroy($category_id){
        $category = Category::find($category_id);
        if($category){
        //  deleting image also
            $destination = 'uploads/category/'.$category->image;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $category->delete();
            return redirect('admin/category')->with('message', 'Category Deleted Successfully');
        } else{
            return redirect('admin/category')->with('message', 'No Category Found');
        }
    }
}
