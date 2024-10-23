<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Auth;

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
        'email',
        'password',
        'photo',
        'administrator'
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
        'password' => 'hashed',
    ];

    /**
    * The spaces that are assigned to the user
    */
    public function spaces(): BelongsToMany
    {
        return $this->belongsToMany(Space::class);
    }

    /**
     * Get all members except the authenticated user.
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function otherMembers()
    {
        return $this->whereNot('id', Auth::id())->get();
    }

    /**
    * The tasks that are assigned to the user
    */
    public function tasks() {
        return $this->belongsToMany(Task::class);
    }
}