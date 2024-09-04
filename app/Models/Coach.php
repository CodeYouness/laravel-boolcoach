<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Coach extends User
{
    use HasFactory;

    protected $fillable = [
        'name',
        'surname',
        'nickname',
        'email',
        'language',
        'password',
        'summary',
        'img_url',
        'price',
        'is_available',
    ];
}
