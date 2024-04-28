<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFDWithdrawalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('f_d_withdrawals', function (Blueprint $table) {
            $table->id();
            $table->string('amount');
            $table->string('principal');
            $table->string('interest');
            $table->bigInteger('fd_id')->unsigned()->nullable();
            $table->foreign('fd_id')->references('id')->on('f_d_s')->onDelete('cascade');
            $table->bigInteger('client_id')->unsigned()->nullable();
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
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
        Schema::dropIfExists('f_d_withdrawals');
    }
}
