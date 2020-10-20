<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReferencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('references', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('reference_category_id');
            $table->foreign('reference_category_id')->references('id')->on('reference_categories')->onDelete('restrict')->onUpdate('restrict');
            $table->string('model');
            
            $table->unique(['reference_category_id', 'model']);

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
        Schema::dropIfExists('references');
    }
}
