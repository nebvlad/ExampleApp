<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Links extends Model
{
    protected $fillable = [
        'uuid',
        'link',
        'enter_limit',
        'expired_at'
    ];
}
