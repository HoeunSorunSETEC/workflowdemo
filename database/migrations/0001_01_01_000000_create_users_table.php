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
            $table->id(); //id always primary key and auto_increment
            $table->unsignedBigInteger('department_id');
            $table->string('name');
            $table->string('phonenumber',20)->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->enum('role', ['user', 'leave_mission_approver', 'department_admin', 'system_admin'])->default('user');
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('department_id')->references('id')->on('departments');
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
