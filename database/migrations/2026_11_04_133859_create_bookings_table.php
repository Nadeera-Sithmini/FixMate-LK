
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();

            // Customer
            $table->foreignId('user_id')
                ->constrained('users')
                ->cascadeOnDelete();

            // Selected service
            $table->foreignId('service_id')
                ->constrained('services')
                ->restrictOnDelete();

            // Appliance details
            $table->string('appliance_name');
            $table->text('problem_description');

            // Booking information
            $table->date('booking_date');
            $table->time('booking_time');

            // Customer location
            $table->string('address');
            $table->string('city');
            $table->string('phone');

            // Booking status
            $table->enum('status', [
                'pending',
                'confirmed',
                'assigned',
                'in_progress',
                'completed',
                'cancelled'
            ])->default('pending');

            // Estimated cost
            $table->decimal('estimated_cost', 10, 2)->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
