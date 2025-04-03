<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class career extends Model
{
   
    protected $fillable = [
        'e_name',
        'e_ic',
        'e_address',
        'e_quanlification',
        'e_mstatus',
        'e_email',
        'e_contact',
        'e_position',
        'e_course',
        'e_status',
        'e_attachment',
    ];
}
