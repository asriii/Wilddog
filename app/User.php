<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
// use Spatie\ActivityLog\Traits\LogsActivity;
// use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = "users";

    //log the changed attridutes for all even
    protected static $logAttributes = ['name', 'email'];
    
    //changing password and update_at will not trigger an activity being logged
    protected static $ignoreChangeAttributes = ['password', 'update_at'];

    //logging only the chacnged attridures 
    protected static $logOnlyDirty = true;

    //the 'created' and 'updated' event will get logging automatically,
    //the deleted event wouldn't get loged
    protected static $recordEvents = ['created', 'updated'];

    public function getDescriptionForEvent(string $eventName): string
    {
        return "You have {$eventName} user";
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

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    const ADMIN_TYPE = 1;
    const DEFAULT_TYPE = 0;

    public function isAdmin(){
    return $this->type === self::ADMIN_TYPE;
    }
}
