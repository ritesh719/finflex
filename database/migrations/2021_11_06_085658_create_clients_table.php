<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('photo_scan');
            $table->string('adhaar_scan')->nullable();
            $table->string('pan_scan')->nullable();
            $table->string('adhaar_number')->nullable();
            $table->string('dob');
            $table->string('gender');
            $table->enum('marital_status', ['married', 'single', 'widow', 'divorced']);
            $table->string('fathers_name');
            $table->string('mothers_name');
            $table->string('husband_name')->nullable();
            $table->string('c_address');
            $table->string('c_city');
            $table->string('c_pincode');
            $table->string('c_residence_type');
            $table->string('mobile');
            $table->string('contact')->nullable();
            $table->string('occupation');
            $table->string('husbands_age')->nullable();
            $table->string('husbands_father_name')->nullable();
            $table->string('born_village')->nullable();
            $table->string('category')->nullable();
            $table->string('clients_education')->nullable();
            $table->string('husbands_education')->nullable();
            $table->string('husbands_occupation')->nullable();
            $table->string('born_district')->nullable();
            $table->string('brothers_name')->nullable();
            $table->string('no_of_cows')->nullable();
            $table->string('no_of_buffaloes')->nullable();
            $table->string('no_of_goats')->nullable();
            $table->string('no_of_others')->nullable();
            $table->string('area_of_land')->nullable();
            $table->string('f1_name')->nullable();
            $table->string('f1_marital_status')->nullable();
            $table->string('f1_age')->nullable();
            $table->string('f1_occupation')->nullable();
            $table->string('f1_education')->nullable();
            $table->string('f2_name')->nullable();
            $table->string('f2_marital_status')->nullable();
            $table->string('f2_age')->nullable();
            $table->string('f2_occupation')->nullable();
            $table->string('f2_education')->nullable();
            $table->string('f3_name')->nullable();
            $table->string('f3_marital_status')->nullable();
            $table->string('f3_age')->nullable();
            $table->string('f3_occupation')->nullable();
            $table->string('f3_education')->nullable();
            $table->string('f4_name')->nullable();
            $table->string('f4_marital_status')->nullable();
            $table->string('f4_age')->nullable();
            $table->string('f4_occupation')->nullable();
            $table->string('f4_education')->nullable();
            $table->string('f5_name')->nullable();
            $table->string('f5_marital_status')->nullable();
            $table->string('f5_age')->nullable();
            $table->string('f5_occupation')->nullable();
            $table->string('f5_education')->nullable();
            $table->string('f6_name')->nullable();
            $table->string('f6_marital_status')->nullable();
            $table->string('f6_age')->nullable();
            $table->string('f6_occupation')->nullable();
            $table->string('f6_education')->nullable();
            $table->bigInteger('center_id')->unsigned()->nullable();
            $table->foreign('center_id')->references('id')->on('centers')->onDelete('cascade');
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
        Schema::dropIfExists('clients');
    }
}
