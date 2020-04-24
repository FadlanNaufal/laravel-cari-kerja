<?php

namespace App;

use Illuminate\Notifications\Notifiable;
    use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Seeker extends Authenticatable
{
    use Notifiable;

    protected $guard = 'seeker';

    protected $fillable = [
        'name', 'email', 'password','gender','phone','address','profile_picture','bio'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getAuthPassword()
    {
     return $this->password;
    }

}
