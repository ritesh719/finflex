<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loans', function (Blueprint $table) {
            $table->id();
            $table->string('total_amount');
            $table->string('paid_amount');
            $table->string('due_amount');
            $table->string('total_pricipal');
            $table->string('paid_pricipal');
            $table->string('due_pricipal');
            $table->string('total_interest');
            $table->string('paid_interest');
            $table->string('due_interest');
            $table->string('status');
            $table->string('total_weeks');
            $table->string('total_emi');
            $table->string('paid_emi');
            $table->string('due_emi');
            $table->string('processing_fees');
            $table->string('insurance');
            $table->string('remarks')->nullable();

            $table->bigInteger('client_id')->unsigned()->nullable();
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
            $table->bigInteger('branch_id')->unsigned()->nullable();
            $table->foreign('branch_id')->references('id')->on('branches')->onDelete('cascade');
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
        Schema::dropIfExists('loans');
    }
}
