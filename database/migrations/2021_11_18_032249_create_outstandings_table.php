<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOutstandingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('outstandings', function (Blueprint $table) {
            $table->id();
            $table->string('principal_outstanding');
            $table->string('interest_outstanding');
            $table->string('fd_outstanding');
            $table->string('total_outstanding');
            $table->string('principal_risk_outstanding');
            $table->string('interest_risk_outstanding');
            $table->string('total_risk_outstanding');
            $table->bigInteger('center_id')->unsigned()->nullable();
            $table->foreign('center_id')->references('id')->on('centers')->onDelete('cascade');
            $table->bigInteger('branch_id')->unsigned()->nullable();
            $table->foreign('branch_id')->references('id')->on('branches')->onDelete('cascade');
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
        Schema::dropIfExists('outstandings');
    }
}
