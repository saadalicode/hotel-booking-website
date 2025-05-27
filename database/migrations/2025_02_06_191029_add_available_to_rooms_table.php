<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAvailableToRoomsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('rooms', function (Blueprint $table) {
            // Adding the 'available' column, which will be a boolean (true for available, false for unavailable)
            $table->boolean('available')->default(true);  // Default is true, meaning the room is available
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('rooms', function (Blueprint $table) {
            // Drop the 'available' column if the migration is rolled back
            $table->dropColumn('available');
        });
    }
}
