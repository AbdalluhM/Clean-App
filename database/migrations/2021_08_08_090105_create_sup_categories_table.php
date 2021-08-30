<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSupCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sup_categories', function (Blueprint $table) {
            $table->id();
            $table->integer('category_id');
            $table->string('name_ar')->unique();
            $table->string('name_en')->unique();
            $table->string('image');
            $table->string('desc');
            // $table->stri
            $table->enum('adv',['1','0']);
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
        Schema::dropIfExists('sup_categories');
    }
}
