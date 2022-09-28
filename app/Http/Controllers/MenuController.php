<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Menu;
use Illuminate\Http\Request;
use \Illuminate\Support\Facades\File;

class MenuController extends Controller
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

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if($this->AdminAccess()){
            $C = Category::all();
            return view('menu.create',['categoryData'=>$C]);
        }
        return back();

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
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'image_path' => 'required|mimes:jpg,png,jpeg|max:5048',
            'category_id' => 'required',
        ]);

        $newImageName = time() . '-' . $request->name . '.' . $request->image_path->extension();

        $request->image_path->move(public_path('images'), $newImageName); //public folder

        $C = new Menu ;
        $C->name = $request->name;
        $C->description = $request->description;
        $C->price = $request->price;
        $C->image_path = $newImageName;
        $C->category_id = $request->category_id;
        $C->save();

        return redirect('/menu/create')->with('success', 'menu has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if($this->AdminAccess()){
            $data = Menu::find($id);
            return view('menu.show',['menu'=>$data]);
        }
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if($this->AdminAccess()){
            $data = Menu::find($id);
            $C = Category::all();
            return view('menu.edit',['info'=>$data,'categoryData'=>$C]);
        }
        return back();

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'image_path' => 'required|mimes:jpg,png,jpeg|max:5048',
            'category_id' => 'required',
        ]);

        $newImageName = time() . '-' . $request->name . '.' . $request->image_path->extension();

        $request->image_path->move(public_path('images'), $newImageName); //public folder

        $C = Menu::find($id);

        $oldPath = $C->image_path;

        $C->name = $request->name;
        $C->description = $request->description;
        $C->price = $request->price;
        $C->image_path = $newImageName;
        $C->category_id = $request->category_id;
        $save = $C->save();

        if($save){
            if (File::exists(public_path('images/'.$oldPath))){
                File::delete(public_path('images/'.$oldPath));
            }
            return redirect('menu/'.$id.'/edit')->with('success', 'menu has been added!');
        }
        return redirect('menu/'.$id.'/edit')->with('fail', 'Something went wrong, try later');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $E = Menu::find($id);
        $destination = public_path('images/'.$E->image_path);
        if (File::exists($destination)){
            File::delete($destination);
        }
        $E->delete();
        return back()->with('success', 'menu has been Deleted!');
    }
}
