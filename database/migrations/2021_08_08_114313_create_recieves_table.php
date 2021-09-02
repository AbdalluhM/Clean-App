<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecievesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recieves', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('employee_id')->nullable();
            // $table->string('title');
            $table->string('address');
            $table->string('time_start');
            $table->enum('status',[0,1]);
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
        Schema::dropIfExists('recieves');
    }
}
