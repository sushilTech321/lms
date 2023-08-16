<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Leaverequest extends Model
{
    use HasFactory;
    
    public function user(){
        return $this-> belongsTo(User::class);
    }
    
    public $timestamps = true;

    protected $fillable = [
        'name_req',
        'post',
        'email',
        'maristatus',
        'gender',
        'joindate',
        'ltype_req',
        'lcat_req',
        'attachments',
        'startdate',
        'enddate',
        'leave_days',
        'applied_on',
        'status',
        'admin_remarks',
        'user_id',
    ];
}
