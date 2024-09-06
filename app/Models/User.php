<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Message;
use App\Models\Review;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'surname',
        'nickname',
        'language',
        'summary',
        'img_url',
        'price',
        'email',
        'password',
        'is_available',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function messages(){
        return $this->hasMany(Message::class);
    }

    public function reviews(){
        return $this->hasMany(Review::class);
    }

    public function games(){
        return $this->belongsToMany(Game::class)->withPivot('rank');
    }

    public function sponsorships(){
        return $this->belongsToMany(Sponsorship::class)->withPivot('start_date', 'end_date');
    }

    public function votes(){
        return $this->belongsToMany(Vote::class);
    }
}