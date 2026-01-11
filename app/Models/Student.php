<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Student extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'photo',
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
            $student->nim=preg_replace('/\s+/', '', $student->nim);
            // Generate pickup code ONLY if not set
            if (empty($student->pickup_code)) {
                do {
                    $code = strtoupper(Str::random(6)); // e.g. A9F3KQ
                } while (self::where('pickup_code', $code)->exists());

                $student->pickup_code = $code;
            }
        });
    }
}