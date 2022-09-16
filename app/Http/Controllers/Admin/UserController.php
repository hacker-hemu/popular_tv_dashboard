<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryFormRequest;
use App\Http\Requests\Admin\UserFormRequest;
use App\Models\Category;
use App\Models\Channel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\Console\Input\Input;

class UserController extends Controller
{
    //index function
    public function index()
    {
        $index = 1;
        $users = User::all();
        return view('admin.user.index', compact('users', 'index'));
    }

    //create function for add users in database
    public function create()
    {
        return view('admin.user.create');
    }

    //store function for save data to database
    public function store(UserFormRequest $request)
    {
//        store value in users_table in database
        $data = $request;

        $user = new User();
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = Hash::make($data['password']);
        $user->role_as = $data['role_as'];

        $user->save();
        return redirect('admin/users')->with('message', 'User Added Successfully');

    }

    //edit function  get data for update
    public function edit($user_id)
    {
        $user = User::find($user_id);
        return view('admin.user.edit', compact('user'));
    }

    //store function for save data to database
    public function update(UserFormRequest $request, $user_id)
    {
        //store value in users_table in database
        $data = $request;

        $user = User::find($user_id);
        $user->name = $data['name'];
        $user->email = $data['email'];

        //if password not change so not update password field
        if ($data['password'] == null || $data['password'] == '') {

            //nothing do

        } else {
            //change password field when user want to change
            $user->password = Hash::make($data['password']);
        }

        //$user->password = Hash::make($data['password']);
        $user->role_as = $data['role_as'];

        $user->update();
        return redirect('admin/users')->with('message', 'User Updated Successfully');

    }

    //delete data from database
    public function destroy($user_id)
    {
        $user = User::find($user_id);
        if ($user) {
            $user->delete();
            return redirect('admin/users')->with('message', 'User Deleted Successfully');
        } else {
            return redirect('admin/users')->with('message', 'No User Found');
        }
    }

}
