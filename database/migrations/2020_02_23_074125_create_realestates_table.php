<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRealestatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('realestate_categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('category_name');
            $table->enum('status',['active','inactive'])->default('active');
            $table->timestamps();
        });
        Schema::create('realestates', function (Blueprint $table) {
      $table->bigIncrements('id');
     $table->string('property_name');
    $table->enum('property_status',['Sell','Rent']);
    $table->string('property_price');
    $table->enum('price_status',['Fixed','Negotiable']);
    $table->string('country');
    $table->string('tole');
    $table->string('address');
    $table->string('province');
    $table->string('district');
    $table->string('city');
    $table->string('ward_number');
    $table->string('house_number')->nullable();
    $table->string('zip_code');
    $table->string('property_area');
    $table->enum('area_type',['Dhur','Aana']);
    $table->string('mohoda_length');
    $table->string('mohoda_direction');
    $table->string('number_of_floors');
    $table->string('number_of_bedrooms');
    $table->string('number_of_bathrooms');
    $table->string('number_of_kitchens');
    $table->string('year_build');
    $table->string('latitude')->nullable();
    $table->string('longitude')->nullable();
    $table->string('description');
    $table->unsignedBigInteger('user_id');
    $table->string('category');

    $table->enum('gym',['yes','no'])->default('no');
    $table->enum('garden',['yes','no'])->default('no');
    $table->enum('swimming_pool',['yes','no'])->default('no');
    $table->enum('internet',['yes','no'])->default('no');
    $table->enum('parking',['yes','no'])->default('no');
    $table->enum('water',['yes','no'])->default('no');
    $table->enum('school_college_nearby',['yes','no'])->default('no');
    $table->enum('shopping_nearby',['yes','no'])->default('no');
    $table->enum('bank_nearby',['yes','no'])->default('no');
    $table->enum('pitched_road',['yes','no'])->default('no');
    $table->enum('airport_nearby',['yes','no'])->default('no');
    $table->enum('sewage',['yes','no'])->default('no');
    $table->enum('alarm',['yes','no'])->default('no');
    $table->enum('cctv',['yes','no'])->default('no');
    $table->enum('ac',['yes','no'])->default('no');
    $table->enum('featured',['yes','no'])->default('no');
    $table->enum('status',['active','inactive'])->default('active');
    $table->timestamps();
        });
        Schema::table('realestates', function (Blueprint $table) {

            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
          
        });
    }
   /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {        Schema::dropIfExists('realestate_categories');

        Schema::dropIfExists('realestates');
    }
}
