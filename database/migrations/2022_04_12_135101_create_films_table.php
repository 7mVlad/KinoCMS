<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('films', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('content');
            $table->string('main_image')->nullable();
            $table->string('trailer_link');
            $table->boolean('type_3d')->default(0);
            $table->boolean('type_2d')->default(0);
            $table->boolean('type_imax')->default(0);
            $table->string('release')->default(0);
            $table->foreignId('seo_block_id')->constrained('seo_block')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('films');
    }
}
