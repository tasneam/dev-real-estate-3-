<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerDatasTable extends Migration
{
    public function up()
    {
        Schema::create('customer_datas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email');
            $table->string('first_phone');
            $table->string('sec_phone');
            $table->string('address');
            $table->string('nationality');
            $table->longText('notes')->nullable();
            $table->string('arrived_from')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
