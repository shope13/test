<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workers', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->string('name');
            $table->string('post');
            $table->date('d_of_emp');
            $table->integer('salary');
            $table->bigInteger('id_boss')->unsigned()-> nullable();
            $table->timestamps();
        });

        Schema::table('workers', function (Blueprint $table){
            $table->foreign('id_boss')->references('id')->on('workers')->onDelete('set null');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('workers');
    }
}
