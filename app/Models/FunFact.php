<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FunFact extends Model
{
    protected $fillable = [
        'text',
        'author',
        'moderation_status',
    ];
}
