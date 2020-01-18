<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailEventTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_event', function (Blueprint $table) {
            $table->bigIncrements('id_detail_event');
            $table->bigInteger('id_kategori')->unsigned();
            $table->string('deskripsi_event');
            $table->string('audien');
            $table->date('open_regristation');
            $table->date('end_registration');
            $table->time('time_start');
            $table->time('time_end');
            $table->string('limit_participant');
            $table->string('lokasi');
            $table->string('venue');
            $table->string('picture');
            $table->string('video');
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
        Schema::dropIfExists('detail_event');
    }
}
