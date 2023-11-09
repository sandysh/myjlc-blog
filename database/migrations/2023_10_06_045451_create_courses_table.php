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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\User::class);
            $table->foreignIdFor(\App\Models\Category::class);
            $table->string('title');
            $table->string('slug');
            $table->longText('overview');
            $table->string('hours');
            $table->decimal('price',10,2);
            $table->boolean('gst');
            $table->integer('students');
            $table->string('class_type');
            $table->boolean('placements');
            $table->string('featured_image');
            $table->string('page_title');
            $table->boolean('active')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
