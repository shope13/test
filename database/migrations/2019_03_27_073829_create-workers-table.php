<?php

use Illuminate\Support\Facades\DB;
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
            $table->date('DateEmp');
            $table->integer('salary');
            $table->bigInteger('parent_id')->unsigned()-> nullable()->default(NULL);
            $table->string('image')-> nullable()->default(NULL);
            $table->timestamps();

            $table->foreign('parent_id')->references('id')->on('workers')->onDelete('set null');

            DB::statement('SET FOREIGN_KEY_CHECKS=0;');

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
