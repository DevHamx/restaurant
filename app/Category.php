<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    public function restaurants()
    {
        return $this->belongsToMany('App\Restaurant', 'restaurant_category', 'id_category', 'id_restaurant');
    }

}
