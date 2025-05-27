<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomCategoriesTable extends Migration
{
    public function up()
    {
        Schema::create('room_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');  // Name of the category (e.g., Single, Double, etc.)
            $table->text('description');  // Description of the category
            $table->string('image');  // Path to the image of the category
            $table->integer('total_rooms');  // Total number of rooms in the category
            $table->decimal('price', 8, 2);  // Price for the category
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('room_categories');
    }
}
