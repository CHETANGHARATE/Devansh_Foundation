<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VolunteerApplication extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'city',
        'age',
        'area_of_interest',
        'skills',
        'availability',
        'message',
        'status',
        'admin_notes',
    ];
}
