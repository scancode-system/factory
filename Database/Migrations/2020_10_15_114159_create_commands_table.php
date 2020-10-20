<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commands', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('collection_id');
            $table->string('code');
            $table->unsignedBigInteger('status_id');
            $table->dateTime('closed_at')->nullable();
            $table->timestamps();

            $table->foreign('collection_id')->references('id')->on('collections')->onDelete('restrict')->onUpdate('restrict');
            $table->foreign('status_id')->references('id')->on('statuses')->onDelete('restrict')->onUpdate('restrict');
            $table->unique(['collection_id', 'code']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('commands');
    }
}
