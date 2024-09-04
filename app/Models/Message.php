<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'coach_id',
        'username',
        'title',
        'content',
        'email'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
