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
        Schema::create('opesides', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('image');
            $table->string('video');
            $table->longText('descrption');
            $table->integer('viwes')->default(0);
            $table->integer("recomendCount")->default(0);
            $table->integer("recomendNum")->default(0);
            $table->foreignId("course_id")->references("id")->on("courses")->onDelete("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('opesides');
    }
};
