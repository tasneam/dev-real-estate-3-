<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRealestatesTable extends Migration
{
    public function up()
    {
        Schema::create('realestates', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('video_url')->nullable();
            $table->string('title_en');
            $table->string('title_ar');
            $table->string('title_tr');
            $table->longText('description_en');
            $table->longText('description_ar');
            $table->longText('description_tr');
            $table->decimal('price', 15, 2);
            $table->string('status');
            $table->integer('salon_num');
            $table->integer('room_num');
            $table->float('area', 15, 2);
            $table->string('property_type');
            $table->string('active');
            $table->integer('year_of_creation');
            $table->string('location');
            $table->string('owner_name')->nullable();
            $table->longText('notes')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
