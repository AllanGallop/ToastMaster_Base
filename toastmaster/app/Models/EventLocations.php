<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventLocations extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'Address_1',
        'Address_2',
        'Address_3',
        'City',
        'Postcode',
        'County',
        'Country',
        'Tel'
    ];

    public $timestamps = false;

}
