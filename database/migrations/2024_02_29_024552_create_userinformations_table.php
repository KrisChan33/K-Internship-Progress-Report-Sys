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
        
        Schema::create('userinformation', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignIdFor('user_id')->constrained('users');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('username');
            $table->string('email');
            $table->string('password');
            $table->string('role');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('userinformation');
    }
};
