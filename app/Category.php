<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;

class Category extends Model
{
    use NodeTrait;
    protected $table = 'categories';

    public function restaurants()
    {
        return $this->belongsToMany('App\Restaurant', 'restaurant_category', 'id_category', 'id_restaurant');
    }

}
