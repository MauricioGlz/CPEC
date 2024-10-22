<?php

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
        Schema::create('parents', function (Blueprint $table) {
            $table->id();
            $table->string('parents_id')->index();
            $table->foreignIdFor(Student::class, 'student_id');
            $table->string('father_name');
            $table->string('f_phone_number');
            $table->string('f_ocupation');
            $table->string('mother_name');
            $table->string('m_phone_number');
            $table->string('relationship_status');
            $table->string('m_ocupation');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parents');
    }
};
