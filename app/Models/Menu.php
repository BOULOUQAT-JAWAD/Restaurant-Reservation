<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    /* *
     * Get the reservations with this menu
     * */
    public function reservation(){
        return $this->hasMany(Reservation::class);
    }

    /*
         * Get the Category
     */
    public function category(){
        return $this->belongsTo(Category::class,'category_id');
    }
}
