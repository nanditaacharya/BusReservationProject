<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusRoute extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'bus_routes';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'priority',
        'start_point',
        'end_point',
        'distance',
        'duration',
    ];

    /**
     * Optional: Define any casts for attributes.
     *
     * This ensures proper data types are returned.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'distance' => 'float',
    ];
}
