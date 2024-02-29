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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('role')->default('member');
            $table->string('name')->nullable(true);
            $table->string('email')->unique();
            $table->string('password');
            // $table->string('first_name')->nullable(true);
            // $table->string('middle_name')->nullable(true);
            // $table->string('last_name')->nullable(true);
            // $table->string('age')->nullable(true);
            // $table->string('gender')->nullable(true);
            // $table->string('date_of_birth')->nullable(true);
            // $table->string('phone_number')->nullable(true);
            // $table->string('address')->nullable(true);
            // $table->string('city')->nullable(true);
            // $table->string('zip_code')->nullable(true);
            // $table->string('province')->nullable(true);
            $table->rememberToken()->nullable(true);
            $table->timestamps();
            $table->timestamp('email_verified_at')->nullable();
            

        // $table->id();
        // $table->string('first_name');
        // $table->string('middle_name');
        // $table->string('last_name');
        // $table->string('age');
        // $table->string('gender');
        // $table->string('date_of_birth');
        // $table->string('phone_number');
        // $table->string('address');
        // $table->string('city');
        // $table->string('zip_code');
        // $table->string('country');
        // $table->string('email')->unique();
        // $table->string('password');
        // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
