<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryFormRequest;
use http\Client\Curl\User;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\Channel;
use Illuminate\Http\Request;

use App\Http\Requests\Admin\ChannelFormRequest;


class ChannelController extends Controller
{
    //index function
    public function index()
    {
        $channel = Channel::all();
        return view('admin.channel.index', compact('channel'));
    }

    //create function
    public function create()
    {
//        get Category for select category in channel
        $category = Category::where('status', '1')->get(); /* 1=true && 0=false */
        return view('admin.channel.create', compact('category'));

//        get current login admin name for save value in channel created_by
        $user = User::where('id', Auth::user()->id)->get(); /* current user id */
        return view('admin.channel.create', compact('user'));
    }

    //store function for save data to database
    public function store(ChannelFormRequest $request)
    {
//        store value in category table in database
        $data = $request;

        $channel = new Channel();
        $channel->category_id = $data['category_id'];
        $channel->name = $data['name'];
        $channel->title = $data['title'];
        $channel->video_link_type = $data['video_link_type'];
        $channel->video_link = $data['video_link'];
        $channel->is_favorite = $request->is_favorite == true ? '1' : '0';
        $channel->is_popular = $request->is_popular == true ? '1' : '0';
        $channel->in_slider = $request->in_slider == true ? '1' : '0';
        $channel->status = $request->status == true ? '1' : '0';
        $channel->like = '0';
        $channel->view = '0';

        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move('uploads/channel/', $fileName);
            $channel->image = $fileName;
        }

        $channel->created_by = Auth::user()->id;
        $channel->save();
        return redirect('admin/channels')->with('message', 'Channel Added Successfully');

    }

    //edit function  get data for update
    public function edit($channel_id)
    {


        //get Category where status is true
        $category = Category::where('status', '1')->get(); /* 1=true && 0=false */

        $channel = Channel::find($channel_id);
        return view('admin.channel.edit', compact('channel', 'category'));
    }

    //update function for update data to database
    public function update(ChannelFormRequest $request, $channel_id)
    {
//        store value in category table in database
        $data = $request;

        $channel = Channel::find($channel_id);
        $channel->category_id = $data['category_id'];
        $channel->name = $data['name'];
        $channel->title = $data['title'];
        $channel->video_link_type = $data['video_link_type'];
        $channel->video_link = $data['video_link'];
        $channel->is_favorite = $request->is_favorite == true ? '1' : '0';
        $channel->is_popular = $request->is_popular == true ? '1' : '0';
        $channel->in_slider = $request->in_slider == true ? '1' : '0';
        $channel->status = $request->status == true ? '1' : '0';
        $channel->like = '0';
        $channel->view = '0';

        if ($request->hasfile('image')) {

//            deleting existing image
            $destination = 'uploads/channel/'.$channel->image;
            if(File::exists($destination)){
                File::delete($destination);
            }

            $file = $request->file('image');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move('uploads/channel/', $fileName);
            $channel->image = $fileName;
        }

//        $channel->created_by = Auth::user()->id;

        $channel->update();
        return redirect('admin/channels')->with('message', 'Channel Updated Successfully');

    }

    //delete data from database
    public function destroy($channel_id){
        $channel = Channel::find($channel_id);
        if($channel){
            //  deleting image also
            $destination = 'uploads/channel/'.$channel->image;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $channel->delete();
            return redirect('admin/channels')->with('message', 'Channel Deleted Successfully');
        } else{
            return redirect('admin/category')->with('message', 'No Category Found');
        }
    }

}
