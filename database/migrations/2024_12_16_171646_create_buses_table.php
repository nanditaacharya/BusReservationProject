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
        Schema::create('add_buses', function (Blueprint $table) {
            $table->id();
            $table->string('bus_number')->unique();
            $table->foreignId('route_id')->constrained('bus_routes')->onDelete('cascade');
            $table->integer('capacity');
            $table->decimal('price', 10, 2);
            $table->string('driver_name');
            $table->string('driver_license')->unique();
            $table->string('image')->nullable();
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');
            $table->enum('status', ['active', 'inactive'])->default('inactive');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('add_buses');
    }
};
