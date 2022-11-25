<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLanguageUniversityPivotTable extends Migration
{
    public function up()
    {
        Schema::create('language_university', function (Blueprint $table) {
            $table->unsignedBigInteger('university_id');
            $table->foreign('university_id', 'university_id_fk_7584625')->references('id')->on('universities')->onDelete('cascade');
            $table->unsignedBigInteger('language_id');
            $table->foreign('language_id', 'language_id_fk_7584625')->references('id')->on('languages')->onDelete('cascade');
        });
    }
}
