<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMainPagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('main_page', function (Blueprint $table) {
            $table->id();
            $table->boolean('status')->default(0);
            $table->string('phone_one')->nullable();
            $table->string('phone_two')->nullable();
            $table->text('seo_text')->nullable();
            $table->foreignId('seo_block_id')->constrained('seo_block')->onDelete('cascade')->onUpdate('cascade');
            $table->string('bg_banner')->nullable();
            $table->integer('top_speed_banner')->nullable();
            $table->integer('news_speed_banner')->nullable();
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
        Schema::dropIfExists('main_pages');
    }
}
