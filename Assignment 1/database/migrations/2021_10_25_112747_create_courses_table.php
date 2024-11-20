<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
         $table->unsignedBigInteger('department_id');
          $table->id();
          $table->timestamps();
          $table->string('name')->unique()->nullable();
            $table->string('code')->unique()->nullable();
           $table->integer('ects');
           $table->text('description');
           /** mangler */
           $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');
//            $table->foreign('department_id')->references('id')->on('departments');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses');
    }
}
