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
        Schema::create('daily_logs', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->time('time');
            $table->string('driver_name');
            $table->string('driver_otp');
            $table->string('driver_license');
            $table->string('plate_number');
            $table->string('lto_cr');
            $table->date('lto_or');
            $table->string('truck_type');
            $table->string('commodity_carried');
            $table->string('commodity_type');
            $table->string('origin');
            $table->string('destination');
            $table->integer('total_weight');
            $table->integer('allowable_gvw');
            $table->integer('excess_load')->nullable();
            $table->integer('excess_gvw')->nullable();
            $table->integer('overloaded_axles')->nullable();
            $table->enum('overloaded', ['both', 'gvw-only', 'axle-only'])->nullable();
            $table->enum('apprehended', ['yes', 'no']);
            $table->timestamps();

            // Indexes for faster queries
            $table->index('date');
            $table->index('plate_number');
            $table->index('driver_license');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('daily_logs');
    }
};
