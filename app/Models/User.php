<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

    use HasFactory;

    public function leaves(): HasMany{
        return $this->hasMany(Leavetype::class);        //relationship between User and Leavetype
    }

    public function Leaverequests(){
        return $this-> hasMany(Leaverequest::class);
    }

    protected $fillable = [
        'name',
        'post',
        'maristatus',
        'emp_gender',
        'usertype',
        'emp_joinDate',
        'email',
        'password',
    ];

    protected $hidden =[
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}
