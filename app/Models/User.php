<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
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
        'phone',
        'address',
        'city',
        'state',
        'country',
        'zip',
        'role',
        'is_active',
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
        'is_active' => 'boolean',
    ];

    /**
     * Kullanıcıya ait siparişleri getir
     */
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    /**
     * Kullanıcının admin olup olmadığını kontrol et
     */
    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    /**
     * Kullanıcı editör mü?
     */
    public function isEditor(): bool
    {
        return $this->role === 'editor';
    }

    /**
     * Kullanıcı müşteri mi?
     */
    public function isCustomer(): bool
    {
        return $this->role === 'customer';
    }
}
