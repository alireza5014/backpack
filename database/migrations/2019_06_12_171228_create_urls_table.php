<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUrlsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('urls', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('database_id')->unsigned();
            $table->integer('table_id')->unsigned();
            $table->string('title');
            $table->string('link');
            $table->string('method');

            $table->timestamps();

            $table->foreign('table_id')
                ->references('id')
                ->on('tables')
                ->onDelete('cascade')
                ->onUpdate('cascade');


            $table->foreign('database_id')
                ->references('id')
                ->on('databases')
                ->onDelete('cascade')
                ->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('urls');
    }
}
