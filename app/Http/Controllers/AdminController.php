<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function login(){
        /*
         * Insert Admin Account
         */
//            $e = new Admin();
//        $e->username = 'Admin';
//        $e->password = hash::make('Admin');
//        $e->save();
        return view('admin.login');
    }
    public function index(){
        return view('admin.dashboard');
    }
    public function check(Request $request){
        $request->validate([
            'username'=>'required',
            'password'=>'required|min:4|max:12'
        ]);

        //get info from database
        $userInfo = Admin::where('username','=',$request->username)->first();

        if(!$userInfo){
            return back()->with('fail','user not found');
        }else{
            if(Hash::check($request->password,$userInfo->password)){
                $request->session()->put('loggedAdmin',$userInfo->id);
                return redirect('admin/dashboard');
            }else{
                return back()->with('fail','wrong password');
            }
        }
    }
    public function logout(){
        if (session()->has('loggedAdmin')){
            session()->pull('loggedAdmin');
            return Redirect('admin/login');
        }
    }
}
