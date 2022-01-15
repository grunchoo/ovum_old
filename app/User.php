<?php
namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Caffeinated\Shinobi\Concerns\HasRolesAndPermissions;

class User extends Authenticatable
{
use Notifiable;
use HasRolesAndPermissions;


/**
* The attributes that are mass assignable.
*
* @var array
*/
protected $fillable = [
'name', 'email', 'password', 'username', 'avatar', 'titulo' ,'empresa', 'tratamiento', 'firma', 'category_id', 'division', 'profile_image', 'printer_id', 'phone'
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

public function getImageAttribute()
{
    return $this->profile_image;
}
public function category()    
{
    return $this->belongsTo(Category::class);
}
public function printer()    
{
    return $this->belongsTo(Printer::class);
}
}
