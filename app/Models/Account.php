<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;
    /* *
     * Get the reservations for the clients
     * */
    public function reservation(){
        return $this->hasMany(Reservation::class);
    }
}
