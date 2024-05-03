<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePasswordResetTokensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email', 191)->index();
            $table->string('token', 191);
            $table->timestamp('created_at')->nullable();
            $table->foreign('email')->references('email')->on('users')->onDelete('cascade');
            $table->unique('email','uniqueEmail');
            $table->unique('token','uniqueToken');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('password_reset_tokens');
    }
}
