<?php

namespace App\Http\Controllers;

use App\Models\category;
use \Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class CategoryController extends Controller
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
        $data = Category::all();
        return view('category.index',['info'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if($this->AdminAccess()){
            return view('category.create');
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
//        dd($request->all());
        $request->validate([
            'name' => 'required',
            'image_path' => 'required|mimes:jpg,png,jpeg|max:5048'
        ]);

        $newImageName = time() . '-' . $request->name . '.' . $request->image_path->extension();

        $request->image_path->move(public_path('images'), $newImageName); //public folder

        $C = new Category ;
        $C->name = $request->name;
        $C->image_path = $newImageName;
        $C->save();

        return redirect('/category/create')->with('success', 'category has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Category::find($id);
        $menudata = Category::find($id)->menu;
        return view('category.show',['info'=>$data,'menu'=>$menudata]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if($this->AdminAccess()){
            $data = Category::find($id);
            return view('category.edit',['info'=>$data]);
        }
        return back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'image_path' => 'required|mimes:jpg,png,jpeg|max:5048'
        ]);

        $newImageName = time() . '-' . $request->name . '.' . $request->image_path->extension();

        $request->image_path->move(public_path('images'), $newImageName); //public folder

        $C = Category::find($id) ;

        $oldPath = $C->image_path;

        $C->name = $request->name;
        $C->image_path = $newImageName;
        $save = $C->save();

        if($save){
            //should delete the old image from images folder
            if (File::exists(public_path('images/'.$oldPath))){
                File::delete(public_path('images/'.$oldPath));
            }
            return redirect('category/'.$id.'/edit')->with('success', 'category has been Edited!');
        }
        return redirect('category/'.$id.'/edit')->with('fail', 'Something went wrong, try later');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $E = Category::find($id);
        $destination = public_path('images/'.$E->image_path);
        if (File::exists($destination)){
            File::delete($destination);
        }
        $E->delete();
        return Redirect("/category")->with('success', 'category has been Deleted!');
    }
}
