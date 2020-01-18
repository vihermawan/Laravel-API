<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TableStatus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('status', function (Blueprint $table) {
            $table->bigIncrements('id_status');
            $table->string('nama_status');
            $table->timestamps();
        });
        DB::table('status')->insert([
            [
                'id_status'       => '1',
                'nama_status'      => 'Success',
            ],
            [
                'id_status'       => '2',
                'nama_status'      => 'Done',
            ],
            [
                'id_status'       => '3',
                'nama_status'      => 'Waiting',
            ],
            [
                'id_status'       => '4',
                'nama_status'      => 'Reject',
            ],
            [
                'id_status'       => '5',
                'nama_status'      => 'Soon',
            ],
            [
                'id_status'       => '6',
                'nama_status'      => 'Pass',
            ],
            [
                'id_status'       => '7',
                'nama_status'      => 'Live',
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('status');
    }
}
