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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('customer_name'); // Nama pelanggan
            $table->string('customer_phone'); // Nomor HP pelanggan
            $table->foreignId('service_id')->constrained()->onDelete('cascade'); // Layanan yang dipilih
            $table->date('booking_date'); // Tanggal booking
            $table->integer('sessions'); // Jumlah sesi
            $table->integer('total_price'); // Total harga
            $table->enum('status', ['pending', 'success', 'failed', 'cancel'])->default('pending');
            $table->enum('payment_status', ['unpaid', 'paid', 'failed'])->default('unpaid');
            $table->string('midtrans_order_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
