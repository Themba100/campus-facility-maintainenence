<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFaultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('faults', function (Blueprint $table) {
            $table->id();
            $table->string('fault_name');
            $table->string('category');
            $table->string('location');
            $table->bigInteger('user_id')->unsigned();
            // $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
            $table->foreign('user_id')->references('user_id')->on('role_user')->onDelete('cascade');
            $table->string('email');
            $table->string('username');
            $table->string('description');
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
        Schema::dropIfExists('faults');
    }
}
