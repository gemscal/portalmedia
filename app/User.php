<?php

namespace App;

use App\Notifications\VerifyEmail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends \TCG\Voyager\Models\User
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'verify_token', 'role_id', 'provider', 'provider_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /** 
    * Returns true if the user is verified
    *
    * @return bool
    */

    public function verified()
    {
        return $this->verify_token === null;
    }

    /**
    * Send the user a verification email.
    *
    * @return void
    */

    public function sendVerificationEmail()
    {
        $this->notify(new VerifyEmail($this));
    }

}

