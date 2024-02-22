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
        Schema::create('user_informations', function (Blueprint $table) {
        $table->id();
        $table->string('first name');
        $table->string('middle name');
        $table->string('last name');
        $table->string('age');
        $table->string('gender');
        $table->string('date of birth');
        $table->string('phone number');
        $table->string('address');
        $table->string('city');
        $table->string('zip code');
        $table->string('province');
        $table->string('email')->unique();
        $table->string('password');
        $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_informations');
    }
};