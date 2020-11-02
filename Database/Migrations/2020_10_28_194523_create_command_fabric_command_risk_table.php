<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommandFabricCommandRiskTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('command_fabric_command_risk', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('command_fabric_id');
            $table->foreign('command_fabric_id')->references('id')->on('command_fabrics')->onDelete('cascade')->onUpdate('cascade');

            $table->unsignedBigInteger('command_risk_id');
            $table->foreign('command_risk_id')->references('id')->on('command_risks')->onDelete('cascade')->onUpdate('cascade');

            $table->unique(['command_fabric_id', 'command_risk_id'], 'command_risk_fabric_unique');

            $table->decimal('weight', 10, 2);
            $table->decimal('price', 10, 2);

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
        Schema::dropIfExists('command_fabric_command_risk');
    }
}
