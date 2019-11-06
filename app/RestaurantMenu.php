<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class RestaurantMenu extends Model
{
    //
    protected $fillable = ['title'];
    public function menuItems()
    {
        return $this->hasMany('App\RestaurantMenuItem');
    }
}