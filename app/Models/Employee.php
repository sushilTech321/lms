<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Employee extends Model
{
    use HasFactory;
    
    use HasRoles;

    public function user(){
        return $this->belongsTo(User::class);
    }

    protected $fillable = [
        'emp_name',
        'emp_post',
        'emp_maristatus',
        'emp_gender',
        'emp_joinDate',
        'usertype',
    ];

    protected $hidden = [
        'emp_passwd',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

}
