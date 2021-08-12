<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEbooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ebooks', function (Blueprint $table) {
            $table->id();
            $table->integer('category_id')->unsigned();
            $table->string('title_ebook');
            $table->string('image');
            $table->string('description');
            $table->string('link_download');
            $table->string('hashtag');
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('ebook_categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ebooks');
    }
}
