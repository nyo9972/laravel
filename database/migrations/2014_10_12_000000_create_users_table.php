<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('avatar')->default(config('chatify.user_avatar.default'));
            $table->string('background')->default('bg.png');
            $table->string('description')->nullable();
            $table->string('favourite_bands')->nullable();
            $table->string('favourite_movies')->nullable();
            $table->string('hobbies')->nullable();
            $table->string('profession')->nullable();
            $table->decimal('height')->nullable();
            $table->date('birthday')->nullable();
            $table->boolean('active_status')->default(0);
            $table->string('messenger_color')->default('#673AB7');
            $table->boolean('dark_mode')->default(1);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
