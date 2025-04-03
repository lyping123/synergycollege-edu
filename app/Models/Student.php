<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    // Define the table associated with the model (optional if it follows Laravel conventions)
    protected $table = 'students';

    // Define fillable attributes for mass assignment
    protected $fillable = [
        'full_name',
        'ic_no',
        'nationality',
        'gender',
        'race',
        'marital_status',
        'address',
        'postcode',
        'state',
        'contact_no',
        'guardian_contact_no',
        'email',
        'course',
        'status',
        'secondary_school',
    ];
}
