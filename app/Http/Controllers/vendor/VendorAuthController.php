<?php

namespace App\Http\Controllers\vendor;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class VendorAuthController extends Controller
{
    public function login(){
        return view('vendor.Auth.login');
    }
    public function vendorLoginAction(Request $request){
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {

            // dd('hi');
           
                $request->session()->flash('success', 'Login Success');
                return redirect('vendor/dashboard');
           
        } else {
            $request->session()->flash('error', 'You have entered wrong Email or Password.');
            return redirect()->back();
        }
    }
    public function dashboard(){
        return view('vendor.pages.dashboard.dashboard');
    }
    public function dashboardLogin(Request $request ,$id){
        $request->session()->put('email', Auth::user()->email);
        $user=User::Where('id',$id)->first();
        Auth::login($user);
        return view('vendor.pages.dashboard.dashboard');
    }
    public function logout(Request $request){
        Auth::logout();


     $request->session()->flash('error','loged out');
     return redirect('vendor/login');
    }

    public function userList(){
        $data['title']='User Lists';
        return view('vendor.pages.user.list',$data);
    }
    public function changePassword(){
        $data['title']='Change Password';
        return view('vendor.Auth.change_password',$data);
    }
    public function myProfile(){
        $data['title']='My Profile';
        return view('vendor.Auth.my_profile',$data);
    }

    public function updateVendorProfile(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . Auth::id(),
            'phone' => 'required|string|max:15',
        ]);

        $user = Auth::user();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->save();

        return back()->with('success', 'Profile updated successfully.');
    }

    public function updateVendorPassword(Request $request)
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
