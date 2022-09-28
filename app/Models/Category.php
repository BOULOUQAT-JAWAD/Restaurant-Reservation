<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    /* *
     * Get the menus that belongs to a category
     * */
    public function menu(){
        return $this->hasMany(Menu::class);
    }
}
