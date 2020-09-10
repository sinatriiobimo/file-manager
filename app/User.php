<?php

namespace App;

use App\Models\Document;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

   
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'last_sign_in_at'
    ];

    public function documents()
    {
        return $this->hasMany(Document::class);
    }

    public function isAdmin()
    {
        return $this->email == 'superadmin@gmail.com';
    }


}
