<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLelangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lelangs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_barang')->constrained('barangs')->onUpdate('cascade')->onDelete('cascade');
            $table->date('tgl_mulai');
            $table->date('tgl_akhir');
            $table->double('harga_awal', 15, 2);
            $table->enum('status', ['open','closed', 'cancel', 'confirmed']);
            $table->foreignId('created_by')->nullable()->constrained('users')->onUpdate('cascade')->onDelete('cascade');;
            $table->dateTime('created_date')->nullable();
            $table->foreignId('id_masyarakat')->nullable();
            $table->double('harga_akhir', 15, 2)->nullable();
            $table->dateTime('confirm_date')->nullable();
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
        Schema::dropIfExists('lelangs');
    }
}
