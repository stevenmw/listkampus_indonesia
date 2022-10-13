<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCampusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campus', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->enum('jenis', ['NEGERI', 'SWASTA', 'KEDINASAN']);
            $table->enum('status', ['PTN', 'PTS', 'PTN-BH', 'PTN-BLU']);
            $table->enum('akreditasi', ['A', 'B', 'C']);
            $table->string('nomor_telp');
            $table->string('fax');
            $table->boolean('followed')->default(0);
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
        Schema::dropIfExists('campus');
    }
}
