
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

            // Related booking
            $table->foreignId('booking_id')
                ->constrained('bookings')
                ->cascadeOnDelete();

            // Customer who made the payment
            $table->foreignId('user_id')
                ->constrained('users')
                ->cascadeOnDelete();

            // Payment details
            $table->decimal('amount', 10, 2);

            $table->enum('payment_method', [
                'cash',
                'bank_transfer',
                'card',
                'online'
            ])->default('cash');

            $table->enum('status', [
                'pending',
                'paid',
                'failed',
                'refunded'
            ])->default('pending');

            $table->string('transaction_id')->nullable();

            $table->timestamp('paid_at')->nullable();

            $table->text('notes')->nullable();

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
