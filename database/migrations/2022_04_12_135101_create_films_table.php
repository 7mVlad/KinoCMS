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
            for($i = 1; $i < 6; $i++) {
                $table->string('image_'.$i)->nullable();
            }
            $table->text('trailer_link');
            $table->boolean('type_3d');
            $table->boolean('type_2d');
            $table->boolean('type_imax');
            $table->string('seo_url');
            $table->string('seo_title');
            $table->string('seo_keywords');
            $table->string('seo_description');
            $table->timestamps();

            $table->softDeletes();
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
