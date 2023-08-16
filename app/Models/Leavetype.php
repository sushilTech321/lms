<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leavetype extends Model
{
    use HasFactory;

    protected $table = 'leavetypes'; 
    protected $primaryKey = 'leave_id'; //primary key


    public function user(){

        return $this->belongsTo(User::class,'leave_id');        //relationship between User and Leavetype
    }
    

    protected $fillable = [
        'leave_type',
        'leave_category',
        'leave_tenure',
        'leave_duration',
        'description',
    ];

}
