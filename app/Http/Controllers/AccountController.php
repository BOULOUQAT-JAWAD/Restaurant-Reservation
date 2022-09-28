<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    public function AdminAccess(){
        if(session()->has('loggedAdmin')){
            return true;
        }
        return false;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if($this->AdminAccess()){
            $data = Account::all();
            return view('account.index',['info'=>$data]);
        }
        return back();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('account.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'FirstName'=>'required',
            'LastName'=>'required',
            'Email'=>'required|email|unique:accounts',
            'PhoneNumbre'=>'required|unique:accounts',
            'password'=>'required|min:5|max:12'
        ]);

        //insert data
        $account = new Account;
        $account->FirstName = $request->FirstName;
        $account->LastName = $request->LastName;
        $account->Email = $request->Email;
        $account->PhoneNumbre = $request->PhoneNumbre;
        $account->password = hash::make($request->password);
        $save = $account->save();

        if($save){
            return redirect('account/create')->with('success','Account added successfully');
        }else{
            return redirect('account/create')->with('fail','Something went wrong, try later');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if($this->AdminAccess()){
            $E = Account::find($id);
            return view('account.show',['info'=>$E]);
        }
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if($this->AdminAccess()){
            $E = Account::find($id);
            return view('account.edit',['info'=>$E]);
        }
        return back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'FirstName'=>'required',
            'LastName'=>'required',
            'Email'=>'required|email',
            'PhoneNumbre'=>'required',
            'password'=>'required|min:5|max:12'
        ]);

        $account = Account::find($id);

        //insert data
        $account->FirstName = $request->FirstName;
        $account->LastName = $request->LastName;
        $account->Email = $request->Email;
        $account->PhoneNumbre = $request->PhoneNumbre;
        $account->password = hash::make($request->password);
        $save = $account->save();

        if($save){
            return redirect('account/'.$account->id.'/edit')->with('success','Account edited successfully');
        }else{
            return redirect('account/'+$account->id+'/edit')->with('fail','Something went wrong, try later');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $E = Account::find($id);
        $E->delete();
        return Redirect("/account");
    }
    public function login(){
        return view('account.login');
    }

    public function check(Request $request){
        $request->validate([
            'Email'=>'required|email',
            'password'=>'required|min:4|max:12'
        ]);

        //get info from database
        $userInfo = Account::where('Email','=',$request->Email)->first();

        if(!$userInfo){
            return back()->with('fail','user not found');
        }else{
            if(Hash::check($request->password,$userInfo->password)){
                $request->session()->put('loggedUser',$userInfo->id);
                return redirect('reservation/create');
            }else{
                return back()->with('fail','wrong password');
            }
        }
    }
//    public function dashboard(){
//        return view('account.dashboard');
//    }
    public function logout(){
        if (session()->has('loggedUser')){
            session()->pull('loggedUser');
            return Redirect('account/login');
        }
    }
}
