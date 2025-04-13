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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('make'); // e.g., Toyota, Ford
            $table->string('model'); // e.g., Corolla, Mustang
            $table->year('year'); // e.g., 2020
            $table->string('color')->nullable();
            $table->string('transmission')->nullable(); // e.g., Automatic, Manual
            $table->string('fuel_type')->nullable(); // e.g., Petrol, Diesel, Electric
            $table->integer('mileage')->nullable(); // in kilometers
            $table->decimal('price', 10, 2); // car price
            $table->text('description')->nullable();
            $table->string('image_url')->nullable(); // 🚘 image URL field
            $table->boolean('is_available')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
