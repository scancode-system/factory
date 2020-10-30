<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProducesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produces', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('reference_id');
            $table->foreign('reference_id')->references('id')->on('references')->onDelete('cascade')->onUpdate('cascade');

            $table->unsignedBigInteger('fabric_id');
            $table->foreign('fabric_id')->references('id')->on('fabrics')->onDelete('restrict')->onUpdate('restrict');

            $table->unsignedBigInteger('shape_id');
            $table->foreign('shape_id')->references('id')->on('shapes')->onDelete('restrict')->onUpdate('restrict');

            $table->unique(['reference_id','fabric_id', 'shape_id']);

            $table->decimal('length', 10, 2);
            $table->integer('units');

            $table->decimal('weight', 10, 2)->nullable();

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
        Schema::dropIfExists('produces');
    }
}
