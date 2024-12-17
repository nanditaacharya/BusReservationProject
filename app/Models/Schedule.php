<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;


    protected $table = 'schedules';


    protected $fillable = [
        'bus_id',
        'available_date',
        'departure_time',
        'status',
    ];


    public function bus()
    {
        return $this->belongsTo(AddBus::class);
    }
}
