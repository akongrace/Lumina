<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'student_name',
        'gender',
        'date_of_birth',
        'class',
        'class_section',
        'nim',
        'parent_name',
        'parent_contact',
        'parent_email',
        'pickup_code',
        'address',
    ];

    protected static function booted()
    {
        static::creating(function ($student) {
            if (empty($student->pickup_code)) {
                $student->pickup_code = static::generateUniquePickupCode();
            }

            $student->student_id = 'STU' . strtoupper(Str::random(8));
        });
    }

    public static function generateUniquePickupCode($length = 6)
    {
        do {
            $code = Str::upper(Str::random($length));
        } while (static::where('pickup_code', $code)->exists());

        return $code;
    }
}