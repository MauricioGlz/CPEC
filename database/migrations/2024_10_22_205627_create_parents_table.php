<?php

use App\Models\Students;
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
            $table->string('father_name');
            $table->string('f_phone_number')->nullable();
            $table->string('f_ocupation')->nullable();
            $table->string('mother_name');
            $table->string('m_phone_number')->nullable();
            $table->string('m_ocupation')->nullable();
            $table->string('relationship_status')->nullable();
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
