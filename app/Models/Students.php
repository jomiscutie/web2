<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Students extends Model
{
    use Notifiable;

    protected $fillable = [
        'name',
        'age',
    ];
}