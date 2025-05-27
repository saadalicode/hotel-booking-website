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
        Schema::table('rooms', function (Blueprint $table) {
            $table->string('title'); // Title of the room (e.g., Single Bed, Double Bed, Suite, etc.)
            $table->string('image'); // Image path for the room
            $table->decimal('price', 8, 2); // Price of the room
            $table->text('description'); // Description of the room
            $table->string('category'); // Category of the room (e.g., Single, Double, Suite, etc.)
            $table->integer('total_rooms'); // Total number of rooms available in the category
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('rooms', function (Blueprint $table) {
            $table->dropColumn(['title', 'image', 'price', 'description', 'category', 'total_rooms']);
        });
    }
};
