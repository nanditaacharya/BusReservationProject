<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AddBus extends Model
{
    protected $fillable = [
        'bus_number',
        'category_id',
        'route_id',
        'capacity',
        'price',
        'driver_name',
        'driver_license',
        'image',
        'status',
    ];

    public function route()
    {
        return $this->belongsTo(BusRoute::class);
      
    }



    public function category() {
        return $this->belongsTo(Category::class, 'category_id');
    }

}
