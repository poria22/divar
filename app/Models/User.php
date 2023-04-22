<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Hekmatinasser\Verta\Verta;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'role',
        'avatar',
        'password',
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
    ];

    public function getrolefarsi()
    {
        if ($this->role == 'admin'){
            return 'مدیر';

        }elseif ($this->role == 'author'){
            return 'نویسنده';
        }else{
            return 'کاربر عادی';
        }
    }

    public function jalali()
    {
        return \verta($this->created_at)->format('Y/m/d');
    }

    public function getavatar()
    {
        return asset('images/avatar/'.$this->avatar);
    }
}
