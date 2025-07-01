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
        Schema::create('experinces', function (Blueprint $table) {
            $table->id();
            $table->string('title')->comment('Job title or position');
            $table->string('company')->comment('Company name');
            $table->string('location')->nullable()->comment('Location of the job');
            $table->date('from_date')->comment('Start date of the experience');
            $table->date('to_date')->nullable()->comment('End date of the experience');
            $table->boolean('currently_working')->default(false)->comment('Whether currently working in this role');
            $table->text('description')->nullable()->comment('Role description, responsibilities');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('experinces');
    }
};
