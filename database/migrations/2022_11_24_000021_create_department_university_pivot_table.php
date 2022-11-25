<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepartmentUniversityPivotTable extends Migration
{
    public function up()
    {
        Schema::create('department_university', function (Blueprint $table) {
            $table->unsignedBigInteger('university_id');
            $table->foreign('university_id', 'university_id_fk_7584623')->references('id')->on('universities')->onDelete('cascade');
            $table->unsignedBigInteger('department_id');
            $table->foreign('department_id', 'department_id_fk_7584623')->references('id')->on('departments')->onDelete('cascade');
        });
    }
}
