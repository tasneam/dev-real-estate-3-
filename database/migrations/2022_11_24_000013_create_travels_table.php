<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTravelsTable extends Migration
{
    public function up()
    {
        Schema::create('travels', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title_en');
            $table->string('title_ar');
            $table->string('title_tr');
            $table->decimal('price', 15, 2);
            $table->longText('description_en');
            $table->longText('description_ar');
            $table->longText('description_tr');
            $table->string('hotel_name');
            $table->string('visa');
            $table->string('airline_tickets');
            $table->string('translator');
            $table->string('days_num');
            $table->string('active');
            $table->longText('notes')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
