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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable()->comment('Full name');
            $table->string('image')->nullable()->comment('Profile image URL');
            $table->string('linkedin_url')->nullable()->comment('LinkedIn profile URL');
            $table->string('website')->nullable()->comment('Personal website URL');
            $table->string('location')->nullable()->comment('Location');
            $table->string('mobile')->nullable()->comment('Mobile number');
            $table->string('email')->unique()->nullable()->comment('Email address');
            $table->string('resume')->nullable()->comment('Resume file URL');
            $table->text('bio')->nullable()->comment('Short biography');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
