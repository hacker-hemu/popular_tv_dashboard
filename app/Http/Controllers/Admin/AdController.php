<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdFormRequest;
use App\Models\Ad;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class AdController extends Controller
{

    //index function
    public function index()
    {
        $ad = Ad::all();
        return view('admin.ad.index', compact('ad'));
    }

    //create function
    public function create()
    {
        return view('admin.ad.create');
    }

    //store function for save data to database
    public function store(AdFormRequest $request)
    {
//        store value in category table in database
        $data = $request;

        $ad = new Ad();
        $ad->name = $data['name'];
        $ad->call_number = $data['call_number'];
        $ad->go_link = $data['go_link'];
        $ad->status = $request->status == true ? '1' : '0';
        $ad->created_by = Auth::user()->id;

        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move('uploads/ad/', $fileName);
            $ad->image = $fileName;
        }

        $ad->save();
        return redirect('admin/ad')->with('message', 'Advertisement Added Successfully');

    }

    //edit function for get data for edit
    public function edit($ad_id)
    {
        $ad = Ad::find($ad_id);
        return view('admin.ad.edit', compact('ad'));
    }

    //update function for update data to database
    public function update(AdFormRequest $request, $ad_id)
    {
//        store value in category table in database
        $data = $request;

        $ad = Ad::find($ad_id);
        $ad->name = $data['name'];
        $ad->call_number = $data['call_number'];
        $ad->go_link = $data['go_link'];
        $ad->status = $request->status == true ? '1' : '0';

        if ($request->hasfile('image')) {

//            deleting existing image
            $destination = 'uploads/ad/'.$ad->image;
            if(File::exists($destination)){
                File::delete($destination);
            }

            $file = $request->file('image');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move('uploads/ad/', $fileName);
            $ad->image = $fileName;
        }

        $ad->update();
        return redirect('admin/ad')->with('message', 'Advertisement Updated Successfully');

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
