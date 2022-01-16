<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;


    use AuthTrait;
    /**
     * @var mixed
     */
    private $username;
    /**
     * @var mixed
     */
    public $password = 'password';
    /**
     * @var string
     */
    protected $rememberTokenName = 'remember_token';
    /**
     * @var mixed
     */
    public $email = 'bjourquin@littoral.fr';
    /**
     * @var mixed
     */
    protected $authenticated = false;
    /**
     * @var mixed
     */
    protected $role = null;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function fetchUserByCredentials(array $credentials)
    {
        if ($this->email === $credentials['email']) {
            $arr_user = $this->email;
            return $this;
        }

        return null;
    }
}
