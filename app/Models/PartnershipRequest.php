<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PartnershipRequest extends Model
{
    protected $fillable = [
        'organization_name',
        'contact_person',
        'email',
        'phone',
        'website',
        'partnership_interest',
        'message',
        'status',
        'admin_notes',
    ];
}
