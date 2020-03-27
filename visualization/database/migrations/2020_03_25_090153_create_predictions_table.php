<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePredictionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('predictions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->integer('predicted_count');
            $table->unsignedBigInteger('cluster_q_c_id');
            $table->foreign('cluster_q_c_id')->references('id')->on('cluster_q_c_s');
            $table->dateTime('predicted_for_date');
            $table->dateTime('prediction_date');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('predictions');
    }
}
