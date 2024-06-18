<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    public function up()
    {
        Schema::create('status_pekerjaan', function (Blueprint $table) {
            $table->id('id_status');
            $table->string('nama_status', 50);
            $table->timestamps();
        });

        // Insert initial data
        DB::table('status_pekerjaan')->insert([
            ['nama_status' => 'Menunggu'],
            ['nama_status' => 'Sedang Diproses'],
            ['nama_status' => 'Selesai'],
            ['nama_status' => 'Dibatalkan'],
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('status_pekerjaan');
    }
};
