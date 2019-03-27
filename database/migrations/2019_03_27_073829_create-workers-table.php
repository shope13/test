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
            $table->bigIncrements('id')->autoIncrement()->unique();
            $table->string('fio');
            $table->string('post');
            $table->date('d_of_emp');
            $table->integer('salary');
            $table->integer('id_boss');
            $table->timestamps();

            $table->foreign('id_boss')->references('id')->on('workers')->onDelete('cascade');
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
