<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasyarakatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('masyarakats', function (Blueprint $table) {
            $table->id();
            $table->string('email', 100)->unique();
            $table->string('password', 100);
            $table->char('nik', 16);
            $table->string('name', 100);
            $table->string('username', 100);
            $table->enum('jk', ['Perempuan', 'Laki-laki'])->default('Perempuan');
            $table->string('no_hp', 15);
            $table->string('alamat');
            $table->dateTime('tgl_join');
            $table->tinyInteger('status')->default(1);
            $table->integer('update_by')->nullable();
            $table->dateTime('update_date')->nullable();
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
        Schema::dropIfExists('masyarakats');
    }
}
