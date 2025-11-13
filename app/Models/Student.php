<?php

namespace App\Models;
use Illuminate\Database\Eloquent\factories\hasfactory;
use Illuminate\Database\Eloquent\Model;

class Student extends model
{
    use hasfactory;
    protected $fillable=[
        'student_id',
        'name',
        'class',
        'section',
        'parent_name',
        'parent_contact',
        'parent_email',
        'pickup_code',
    ];
    //
}
