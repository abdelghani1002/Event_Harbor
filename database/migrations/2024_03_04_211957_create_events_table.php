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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->longText('description');
            $table->timestamp('date');
            $table->string('place');
            $table->integer('tickets_number');
            $table->integer('tickets_booked')->default(0);
            $table->float('ticket_price');
            $table->string('photo_src')->nullable()->default('event_default.jpg');
            $table->enum('reservation_type', ['manual', 'automatic'])->default('manual');
            $table->enum('status', ['pending', 'published', 'rejected'])->default('pending');
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('category_id')->nullable()->constrained('categories')->nullOnDelete()->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
