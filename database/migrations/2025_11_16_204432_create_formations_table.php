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
        Schema::create('formations', function (Blueprint $table) {
            $table->id();
             $table->string("title")->nullable();;
             $table->foreignId('category_id')                     
                  ->nullable();
                $table->string("provider")->nullable();;
                $table->boolean("mode")->default(1)->description("0- in person / 1 -online");
                $table->text("url")->nullable();;
                $table->decimal("cost",10,2);
                $table->integer("like")->default(0);
                $table->string("picture")->nullable();
                $table->decimal("reduction")->nullable();
                $table->string("duration")->nullable();
                $table->decimal("rate")->nullable();
                $table->integer("views")->nullable();
                $table->boolean("status")->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('formations');
    }
};
