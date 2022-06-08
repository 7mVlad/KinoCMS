<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
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
            $table->string('last_name')->nullable();
            $table->string('pseudonym')->nullable();
            $table->string('address')->nullable();
            $table->integer('card_number')->nullable();
            $table->string('language')->default('ru');
            $table->string('gender')->default('man');
            $table->string('phone')->nullable();
            $table->date('birthday')->nullable();
            $table->string('city')->nullable();
            $table->unsignedSmallInteger('role')->default(0);
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
}
