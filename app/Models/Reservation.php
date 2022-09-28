<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    /*
     * Get the Account that makes the reservation
     */
    public function account(){
        return $this->belongsTo(Account::class,'account_id');
    }
    /*
     * Get the menu
     */
    public function menu(){
        return $this->belongsTo(Menu::class,'menu_id');
    }
}
