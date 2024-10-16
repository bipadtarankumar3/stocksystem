<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserManagementController extends Controller
{
    public function __construct()
    {
         $this->middleware('auth'); 
        
    }
    public function userList(){
        $data['title']='User Lists';
        $data['users']=User::where('user_type','customer')->get();
        return view('admin.pages.user.list',$data);
    }

    public function userAdd(){
        $data['title']='User Add';
        $data['users']=User::where('user_type','user')->get();
        return view('admin.pages.user.add',$data);
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.pages.user.add', compact('user'));
    }

    public function save_user(Request $request, $id = null)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $id,
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
        ]);

        // Check if the user exists, update if so, otherwise create a new user
        if ($id) {
            $user = User::findOrFail($id);
            $message = 'User updated successfully.';
        } else {
            $user = new User();
            $user->password = Hash::make('12345678');
            $user->user_type = 'customer';
            $message = 'User created successfully.';
        }

        // Assign the request data to the user model
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;

        // Save the user
        $user->save();

        // Redirect back to the user list with a success message
        return back()->with('success', $message);
    }
}
