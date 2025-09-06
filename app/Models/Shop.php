<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class Shop extends Authenticatable
{
    use Notifiable, HasRoles;

    protected $guard_name = 'shop';

    protected $fillable = ['name', 'email', 'password','phone','image','address','status'];

    protected $hidden = ['password', 'remember_token'];
}