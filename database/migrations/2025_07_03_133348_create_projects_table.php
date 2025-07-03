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
        // Create the 'projects' table with required columns and foreign key constraint
        Schema::create('projects', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('project_name')->comment('Project name'); // Project name
            $table->string('url')->nullable()->comment('Optional project URL'); // Optional project URL
            $table->string('thumbnail')->comment('Project thumbnail image path'); // Project thumbnail image path
            $table->unsignedBigInteger('service_id')->comment('Foreign key to services table'); // Foreign key to services table
            $table->string('technology')->comment('Technologies used'); // Technologies used
            $table->text('description')->comment('Project description'); // Project description
            $table->timestamps(); // created_at and updated_at

            // Set up foreign key constraint to services table
            $table->foreign('service_id')->references('id')->on('services')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
