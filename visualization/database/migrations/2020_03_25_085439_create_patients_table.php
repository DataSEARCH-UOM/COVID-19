<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('alias');
            $table->integer('age');
            $table->string('gender');
            $table->dateTime('identified_date');
            $table->string('home_location');
            $table->string('exposure_location');
            $table->unsignedBigInteger('exposed_from')->nullable();
            $table->foreign('exposed_from')->references('id')->on('patients')->nullable();
            $table->enum('exposure_state',["IMPORTED_CASE","FROM_LOCAL_PATIENT","FROM_FOREIGNER","IN_QUARANTINE"]);
            $table->unsignedBigInteger('cluster_q_c_id')->nullable();
            $table->foreign('cluster_q_c_id')->references('id')->on('cluster_q_c_s');
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
        Schema::dropIfExists('patients');
    }
}
