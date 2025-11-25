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
        Schema::create('subventions', function (Blueprint $table) {
            $table->id();
            $table->string("title")->nullable();
            $table->string("organization")->nullable();
            $table->string("country")->nullable();
            $table->string("city")->nullable();
           
            $table->string("file_name")->nullable();
            $table->text("eligibilities")->nullable();
            $table->integer("views")->nullable();
            $table->boolean("status")->default(true);
            $table->text("url")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subventions');
    }
};
