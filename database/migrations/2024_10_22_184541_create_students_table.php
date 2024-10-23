<?php

use App\Models\Catechism;
use App\Models\Parents;
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
            $table->string('first_name');
            $table->string('father_surname');
            $table->string('mother_surname');
            $table->foreignIdFor(Parents::class);
            $table->date('birthday');
            $table->smallInteger('scholar_grade')->nullable();
            $table->string('grade')->nullable();
            $table->boolean('disability')->nullable();
            $table->foreignIdFor(Catechism::class)->nullable();
            $table->boolean('religion_prep')->nullable();
            $table->string('prev_catechisms_grade')->nullable();
            $table->string('observations')->nullable();
            // Documents
            $table->boolean('birth_cert')->nullable();
            $table->boolean('bautizm_cert')->nullable();
            $table->boolean('simple_bautizm_cert')->nullable();
            $table->boolean('prev_course_cert')->nullable();
            $table->boolean('confirmation_cert')->nullable();
            $table->boolean('communion_cert')->nullable();
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
