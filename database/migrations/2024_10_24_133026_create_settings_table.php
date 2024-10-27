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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string("phone")->default("no");
            $table->string("logo")->default("no");
            $table->string("icone")->default("no");
            $table->string("prandname")->default("no");
            $table->integer("amout")->default(1000);
            $table->integer("years")->default(1);
            $table->string("facebook")->default("no");
            $table->timestamps();
            $table->string("watsapp")->default("no");
            $table->string("linkedin")->default("no");
            $table->string("email")->default("no");
         
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
