<?php

namespace App;

use App\Services\Contracts\UserServiceInterface;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Collection;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    protected $userService;

    public function __construct (array $attributes = [])
    {
        parent::__construct($attributes);

        $this->userService = \App::make('App\Services\Contracts\UserServiceInterface');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function messages()
    {
        return $this->hasMany('App\Message');
    }

    public function responses()
    {
        return $this->hasMany('App\Response');
    }

    public function team()
    {
        return $this->belongsTo('App\Team');
    }

    public function getTeammates () : Collection
    {
        return $this->userService->teammates($this->id);
    }
}
