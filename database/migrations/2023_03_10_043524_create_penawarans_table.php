<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenawaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penawarans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_masyarakat')->constrained('masyarakats')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('id_lelang')->constrained('lelangs')->onUpdate('cascade')->onDelete('cascade');
            $table->dateTime('tgl_penawaran');
            $table->double('harga_penawaran', 15,2);
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
        Schema::dropIfExists('penawarans');
    }
}
