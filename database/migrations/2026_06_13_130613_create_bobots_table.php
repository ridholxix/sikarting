<?php

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
        Schema::create('bobots', function (Blueprint $table) {
            $table->id();
            $table->char('kode', 5)->unique();
            $table->foreignId('gejala_id')->constrained()->cascadeOnDelete();
            $table->foreignId('stunting_id')->constrained()->cascadeOnDelete();
            $table->decimal('probabilitas', 2, 1)->default(0);
            $table->timestamps();

            $table->unique(['gejala_id', 'stunting_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bobots');
    }
};
