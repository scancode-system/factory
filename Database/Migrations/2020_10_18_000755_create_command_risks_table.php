<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommandRisksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('command_risks', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('command_id');
            $table->foreign('command_id')->references('id')->on('commands')->onDelete('cascade')->onUpdate('cascade');

            $table->unsignedBigInteger('reference_id');
            $table->foreign('reference_id')->references('id')->on('references')->onDelete('restrict')->onUpdate('restrict');

            $table->unsignedBigInteger('shape_id');
            $table->foreign('shape_id')->references('id')->on('shapes')->onDelete('restrict')->onUpdate('restrict');

            $table->unique(['command_id', 'reference_id', 'shape_id', 'size_id']);

            $table->unsignedBigInteger('size_id');
            $table->foreign('size_id')->references('id')->on('sizes')->onDelete('restrict')->onUpdate('restrict');

            $table->integer('units');

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
        Schema::dropIfExists('command_risks');
    }
}
