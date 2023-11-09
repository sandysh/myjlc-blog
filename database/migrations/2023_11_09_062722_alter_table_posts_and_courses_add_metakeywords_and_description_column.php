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
        Schema::table('posts', function (Blueprint $table){
            $table->longText('keywords')->nullable();
            $table->longText('description')->nullable();
        });

        Schema::table('courses', function (Blueprint $table){
            $table->longText('keywords')->nullable();
            $table->longText('description')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropColumns("posts", ["keywords","description"]);
        Schema::dropColumns("courses", ["keywords","description"]);
    }
};
