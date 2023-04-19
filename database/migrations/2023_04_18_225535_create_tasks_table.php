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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->date('due_date')->nullable();
            $table->enum('status', ['Pending', 'Completed', 'In progress'])->default('Pending');
            $table->string('category_description');
            $table->unsignedBigInteger('created_by');
            $table->timestamps();

            #indico que hago referencia a descripcion y no a id de categoría - linea 20
            $table->foreign('category_description')->references('category_description')->on('category'); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
