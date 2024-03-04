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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('contact_number');
            $table->string('contact_email');
            $table->foreignId('kind')->references('id')->on('kinds');
            $table->string('description');
            $table->string('mark');
            $table->foreignId('area')->references('id')->on('areas');
            $table->date('find_date');
            $table->foreignId('status')->references('id')->on('statuses');
            $table->string('photo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
