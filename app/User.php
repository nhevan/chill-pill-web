<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * the booting method of the model
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function($user){
            if ($user->user_type_id == 1) {
                $metadata = New PatientMetadata(['user_id' => 1]);
                // dd(request()->);
                $metadata->save();

                // dd("Patient Type");
            }
        });
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
}
