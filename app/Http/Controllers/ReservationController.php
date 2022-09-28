<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Category;
use App\Models\Menu;
use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $R = Reservation::all()->where('created_at','>',date('Y-m-d 00:00:00')); //created today

        $clientsData = Account::all();

        $menuData = Menu::all();

        return view('reservation.index',['info'=>$R,'clientInfo'=>$clientsData,'menuInfo'=>$menuData]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //get account's id from session
        $M = Menu::all();
        $C = Category::all();
        $ClientInfo = Account::find(session('loggedUser'));
        return view('reservation.create',['menuInfo'=>$M,'categoryData'=>$C,'clientData'=>$ClientInfo]);
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
            'Email'=>'required|email',
            'PhoneNumbre'=>'required',
        ]);

        //insert data
        $reservation = new Reservation();

        $reservation->account_id = session('loggedUser') ;
        $reservation->menu_id = $request->menu_id;
        $reservation->date = date('Y-m-d H:i:s');
        $save = $reservation->save();

        if($save){
            return redirect('reservation/create')->with('success','Reservation added successfully');
        }else{
            return redirect('reservation/create')->with('fail','Something went wrong, try later');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $R = Reservation::find($id);
        return view('reservation.show',['reservationInfo'=>$R]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function edit(Reservation $reservation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reservation $reservation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $R = Reservation::find($id);
        $R->delete();
        return Redirect("reservation/create")->with('success', 'reservation has been Deleted!');
    }
}
