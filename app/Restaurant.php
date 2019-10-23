<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    protected $table = 'restaurants';

    protected $casts = [
        'periods' => 'array',
    ];

    public function categories()
    {
        return $this->belongsToMany('App\Category', 'restaurant_category', 'id_restaurant', 'id_category');
    }

    public function menuItems()
    {
        return $this->hasMany('App\RestaurantMenu');
    }

}
