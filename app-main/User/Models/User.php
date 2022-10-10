<?php

namespace AppMain\User\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class User extends Model
{
    use HasFactory;
    protected $fillable = [
        'username',
        'password',
        'first_name',
        'last_name',
        'email',
        'phone',
        'avatar',
        'gender',
        'birthday',
        'country',
        'region',
        'city',
        'bio',
    ];
    public function UserNotification()
    {
        return $this->belongsTo(UserNotification::class);
    }
    public function UserSetting()
    {
        return $this->belongsTo(UserSetting::class);
    }


}
