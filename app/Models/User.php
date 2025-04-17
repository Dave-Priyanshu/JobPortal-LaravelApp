<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'is_super_admin',
        'account_status',

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
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'is_super_admin'    => 'boolean',
            'account_status'    => 'string',
        ];
    }

    //relation with listings
    public function listings(){
        return $this->hasMany(Listing::class,'user_id');
    }

    //job alerts
    public function jobAlerts()
    {
        return $this->hasMany(JobAlert::class);
    }
    public function isSuperAdmin(): bool
    {
        return $this->is_super_admin;
    }
      public function getRoleAttribute(): string
    {
        return $this->is_super_admin ? 'super_admin' : 'user';
    }
}
