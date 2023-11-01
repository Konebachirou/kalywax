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
        Schema::create('payements', function (Blueprint $table) {
            $table->id();
            $table->string('titular');
            $table->string('number');
            $table->string('date');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('cryptogramme');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payements');
    }
};
