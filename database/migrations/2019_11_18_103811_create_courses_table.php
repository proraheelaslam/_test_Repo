<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('id');
			$table->string('name')->nullable();
			$table->string('course_key')->nullable();
			$table->bigInteger('category_id')->unsigned();
			$table->bigInteger('school_id')->unsigned();
		    $table->bigInteger('grade_id')->unsigned();
			$table->bigInteger('class_id')->unsigned();
			$table->string('image')->nullable();
			$table->string('course_code')->nullable();
			$table->text('description')->nullable();
            $table->timestamps();
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
