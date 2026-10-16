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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();

              $table->foreignId('membership_id')
                ->constrained('memberships')
                ->onDelete('cascade');

            $table->decimal('jumlah_pembayaran', 10, 2);
            $table->date('tanggal_pembayaran');
            $table->string('metode_pembayaran');
            $table->string('status_pembayaran')->default('berhasil');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
