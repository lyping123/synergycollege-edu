<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class pre_registration extends Model
{
    protected $table = 'pre_registration';
    protected $connection="student_db";

    protected $fillable = [
        's_name', 
        's_email', 
        'ic', 
        'nationality', 
        'race', 
        'r_address', 
        'r_postcode', 
        'r_state', 
        'chinese_name', 
        'h_contact', 
        'hp_contact', 
        'guardian', 
        'birthday', 
        'gender', 
        'm_status', 
        'religion', 
        'status', 
        'createdate', 
        'updatedate', 
        'desc', 
        'secondary_school', 
        'course', 
         'comment'
    ];
}
