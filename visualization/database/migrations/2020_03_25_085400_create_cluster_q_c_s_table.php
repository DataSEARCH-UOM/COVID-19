<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClusterQCSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cluster_q_c_s', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->decimal('lat',10,7);
            $table->decimal('long',10,7);
            $table->string('cluster_name');
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
        Schema::dropIfExists('cluster_q_c_s');
    }
}
