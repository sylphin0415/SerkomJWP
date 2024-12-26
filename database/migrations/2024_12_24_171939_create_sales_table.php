<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id('idsales');
            $table->date('tgl_faktur');
            $table->string('no_faktur');
            $table->string('nama_konsumen');
            $table->unsignedBigInteger('idbarang');
            $table->foreign('idbarang')->references('idbarang')->on('products')->onDelete('cascade');
            $table->integer('jumlah');
            $table->decimal('diskon', 8, 2); // Sesuaikan dengan kebutuhan presisi diskon
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};
