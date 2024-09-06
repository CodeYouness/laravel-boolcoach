<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    use HasFactory;

    protected $fillable = ['lable', 'value'];

    public function users(){
        return $this->belongsToMany(User::class, 'user_vote', 'vote_id', 'user_id')->withPivot('user_id', 'vote_id');
    }
}
