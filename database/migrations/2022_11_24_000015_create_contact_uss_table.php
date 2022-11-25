<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactUssTable extends Migration
{
    public function up()
    {
        Schema::create('contact_uss', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('email');
            $table->string('name');
            $table->string('subject');
            $table->longText('message');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
