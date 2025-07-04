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
        Schema::create('education', function (Blueprint $table) {
            
            $table->id()->comment('Primary key');
            $table->string('cource')->comment('Name of the course');
            $table->string('specialization')->nullable()->comment('Specialization in the course (optional)');
            $table->date('from_date')->nullable()->comment('Start date of the course (optional)');
            $table->date('to_date')->nullable()->comment('End date of the course (optional)');
            $table->boolean('currently_study')->default(false)->comment('Indicates if currently studying');
            $table->string('collage_name')->comment('Name of the college');
            $table->text('description')->nullable()->comment('Additional description (optional)');
            $table->text('mini_project')->nullable()->comment('Mini project details (optional)');
            $table->text('major_project')->nullable()->comment('Major project details (optional)');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('education');
    }
};
