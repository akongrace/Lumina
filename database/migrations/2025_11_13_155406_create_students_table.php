<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('student_id') ->unique();
            $table->string('name');
            $table->string('class');
            $table->string('section')->nullable();
            $table->string('parent_name');
            $table->string('parent_contact');
            $table->string('parent_email')->nullable();
            $table->string('pickup_code')->unique();
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
