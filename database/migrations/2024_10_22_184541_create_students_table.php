<?php

use App\Models\Catechism;
use App\Models\groups;
use App\Models\Parents;
use App\Models\Student;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('student_id')->index();
            $table->string('first_name');
            $table->string('father_surname');
            $table->string('mother_name');
            $table->date('birthday');
            $table->smallInteger('age');
            $table->smallInteger('scholar_grade');
            $table->string('grade');
            $table->boolean('disability');
            $table->foreignIdFor(Catechism::class);
            $table->boolean('religion_prep');
            $table->string('prev_catechisms_grade');
            $table->string('observations');
            $table->foreignIdFor(Parents::class, 'parents_id');
            // Documents
            $table->boolean('birth_cert');
            $table->boolean('bautizm_cert');
            $table->boolean('simple_bautizm_cert');
            $table->boolean('prev_course_cert');
            $table->boolean('confirmation_cert');
            $table->boolean('communion_cert');
            $table->timestamps();
        });

        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
