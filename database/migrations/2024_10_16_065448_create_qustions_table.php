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
        Schema::create('qustions', function (Blueprint $table) {
            $table->id();
            $table->foreignId("exam_id")->references("id")->on("exams")->onDelete("cascade");
            $table->string("q");
            $table->text("answr1");
            $table->text("answr2");
            $table->text("answr3")->nullable();
            $table->text("answr4")->nullable();
            $table->text("right");
            $table->integer("degre");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('qustions');
    }
};
