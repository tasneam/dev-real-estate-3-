<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagesTable extends Migration
{
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('keywords_en');
            $table->longText('keywords_ar');
            $table->longText('keywords_tr');
            $table->string('title_en');
            $table->string('title_ar');
            $table->string('title_tr');
            $table->longText('description_en');
            $table->longText('description_ar');
            $table->longText('description_tr');
            $table->longText('short_description_en');
            $table->longText('short_description_ar');
            $table->longText('short_description_tr');
            $table->string('page_title')->nullable();
            $table->string('layout');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
