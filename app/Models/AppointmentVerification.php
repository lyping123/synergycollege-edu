<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppointmentVerification extends Model
{
    use HasFactory;

    protected $table = 'appointment_verifications';
    
    protected $fillable = ['student_id', 'verification_code', 'expires_at', 'is_verified'];

    // Define the relationship to the student
    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
