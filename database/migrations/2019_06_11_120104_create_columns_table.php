<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateColumnsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('columns', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('table_id')->unsigned();

            $table->string('name');
            $table->string('type');
            $table->string('collection');
            $table->string('default');
            $table->string('attributes');
            $table->tinyInteger('is_auto_increment')->default(0);

            $table->text('description');
            $table->timestamps();



            $table->foreign('table_id')
                ->references('id')
                ->on('tables')
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
        Schema::dropIfExists('columns');
    }
}
