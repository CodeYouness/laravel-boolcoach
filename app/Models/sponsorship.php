<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sponsorship extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'time',
    ];

    public function users(){
        return $this->belongsToMany(User::class);
    }
}
