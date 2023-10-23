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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nuallable();
            $table->string('email')->nuallable();
            $table->string('phone')->nuallable();
            $table->string('guests')->nuallable();
            $table->string('date')->nuallable();
            $table->string('time')->nuallable();
            $table->string('message')->nuallable();
            $table->string('userid')->default();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
