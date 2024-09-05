<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'coach_id',
        'username',
        'email',
        'description',
    ];

    public function user(){
        return $this->hasMany(User::class);
    }
}
