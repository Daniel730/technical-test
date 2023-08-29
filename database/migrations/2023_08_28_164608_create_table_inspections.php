<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inspections', function (Blueprint $table) {
            $table->id();
            $table->enum('grades', [1, 2, 3, 4, 5])->comment('1 being perfect and 5 being completely broken/missing');
            $table->unsignedBigInteger('turbine_id');
            $table->unsignedBigInteger('component_id');
            $table->timestamps();

            $table->foreign('turbine_id')->references('id')->on('turbines');
            $table->foreign('component_id')->references('id')->on('components');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_inspections');
    }
};
