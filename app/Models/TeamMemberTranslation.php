<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TeamMemberTranslation extends Model
{
    protected $fillable = [
        'team_member_id',
        'language_code',
        'name',
        'role',
        'bio',
    ];

    public function member(): BelongsTo
    {
        return $this->belongsTo(TeamMember::class, 'team_member_id');
    }
}
