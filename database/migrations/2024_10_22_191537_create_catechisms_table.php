<?php

use App\Models\Students;
use App\Models\User;
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
        Schema::create('catechisms', function (Blueprint $table) {
            $table->id();
            $table->string('course_name');
            $table->foreignIdFor(User::class);
            $table->string('turn');
            $table->string('is_admin');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('catechisms');
    }
};
