<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExerciseEntrySetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exercise_entry_sets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('exercise-entry-id');
            $table->foreign('exercise-entry-id')->references('id')->on('exercise_entries');
            $table->double('weight', 4, 1);
            $table->integer('repetitions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exercise_entry_sets');
    }
}
