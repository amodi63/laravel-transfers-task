<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'first_name',
        'last_name',
        'phone_number',
        'address',
        'type',
        'balance',
        'profile_picture',
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
         'balance' => 'decimal:2',
    ];

    protected $appends = [
        'full_name',
    ];

    /**
     * Check if the user is an admin.
     *
     * @return bool
     */
    public function is($type): bool
    {
        return $this->type ===  $type;
    }

    /**
     * Get the user's full name.
     *
     * @return string
     */
    public function getFullNameAttribute(): string
    {
        return "{$this->first_name} {$this->last_name}";
    }

    /**
     * Get the user's short name.
     *
     * @return string
     */
    public function getShortNameAttribute() : string
    {
        $firstCharFirstName = $this->first_name ? mb_substr($this->first_name, 0, 1) : '';
        $firstCharLastName = $this->last_name ? mb_substr($this->last_name, 0, 1) : '';

        return $firstCharFirstName . $firstCharLastName;
    }

    /**
     * Get the user's profile picture.
     *
     * @return string
     */
    public function ProfilePicture(): Attribute
    {
        return Attribute::make(
            get: fn ( $value) => ($value !== null) ? asset('storage/' . $value) : asset('assets/media/users/blank.png'),
        );
    }
}
