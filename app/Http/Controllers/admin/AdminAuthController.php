<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\product;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Hash;
use Session;

class AdminAuthController extends Controller
{
    public function login(){
        return view('admin.Auth.login');
    }
    public function backToAdmin(){
       $user=User::where('email',Session::get('email'))->first();
       Auth::login($user);
       return redirect('admin/dashboard'); 
    }
    public function adminLoginAction(Request $request){
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {

            if(Auth::user()->user_type=="admin"){
                return redirect('admin/dashboard'); 
            }else{
                 $request->session()->flash('success', 'Login Success');
                return redirect('vendor/dashboard');  
            }
        } else {
            $request->session()->flash('error', 'You have entered wrong Email or Password.');
            return redirect()->back();
        }
    }
    public function dashboard(){

        $data['user'] =User::where('user_type','customer')->count();
        $data['product'] =product::count();


        return view('admin.pages.dashboard.dashboard',$data);
    }
    public function profile(){
        return view('admin.auth.profile');
    }
    public function logout(Request $request){
        Auth::logout();


     $request->session()->flash('error','loged out');
     return redirect('login');
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . Auth::id(),
        ]);

        $user = Auth::user();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        return back()->with('success', 'Profile updated successfully.');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|string|min:8|confirmed',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Current password is incorrect']);
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        return back()->with('success', 'Password changed successfully.');
    }

 

}
