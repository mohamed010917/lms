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
        Schema::create('degres', function (Blueprint $table) {
            $table->id();
            $table->foreignId("exam_id")->references("id")->on("exams")->onDelete("cascade");
            $table->foreignId("user_id")->references("id")->on("Users")->onDelete("cascade");
            $table->integer("full");
            $table->integer("degre");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('degres');
    }
};
