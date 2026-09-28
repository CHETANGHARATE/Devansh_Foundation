<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CsrRequest extends Model
{
    protected $fillable = [
        'company_name',
        'contact_person',
        'email',
        'phone',
        'csr_area',
        'budget_range',
        'message',
        'status',
        'admin_notes',
    ];
}
