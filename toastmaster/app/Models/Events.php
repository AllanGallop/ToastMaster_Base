<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Te7aHoudini\LaravelTrix\Traits\HasTrixRichText;

class Events extends Model
{
    use HasFactory;
    use HasTrixRichText;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'description',
        'starts',
        'end'
    ];

    public function atLocation(){
        return $this->hasOne(EventLocations::class, 'id', 'location');
    }

    public function volunteerRoles(){
        return $this->hasMany(EventVolunteers::class, 'EventID', 'id');
    }

}
