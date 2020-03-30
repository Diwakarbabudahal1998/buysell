<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('category_name');
            $table->enum('status',['active','inactive'])->default('active');
            $table->timestamps();
        });
        Schema::create('jobs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('company_name');
            $table->string('available_position');
            $table->string('vacancy_number');
            $table->string('description');
            $table->string('job_requirements');
            $table->string('experience_years');
            $table->string('tole');
            $table->string('address');
            $table->string('city');
            $table->string('country');
            $table->string('district');
            $table->string('province');
            $table->string('ward_number');
            $table->string('job_salary');
            $table->string('working_hours');
            $table->string('category');
            $table->enum('salary_status',['fixed','negotiable']);
            $table->enum('gym',['yes','no'])->default('no');
            $table->enum('health',['yes','no'])->default('no');
            $table->enum('lunch',['yes','no'])->default('no');
            $table->enum('device',['yes','no'])->default('no');
            $table->enum('vehicle_status',['personal','office','none']);
            $table->enum('status',['active','inactive'])->default('active');
            $table->enum('featured',['yes','no'])->default('no');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('jobs');
    }
}
