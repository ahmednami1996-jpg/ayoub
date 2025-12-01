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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
             $table->string("title")->require();
            $table->string("description")->nullable();
            $table->text("resume",300)->require();
            $table->enum("status",["pending","approved","rejected"])->default("pending");
            $table->decimal('budget',10,2)->require();
            $table->boolean("is_taken")->default(false)->comment("0=not taken,1=taken");
            $table->string("picture")->nullable();
            $table->text("market")->nullable();
            $table->string('business_model')->nullable();
            $table->string("investment_type")->nullable();
            $table->integer("kpi_users")->nullable();
            $table->decimal("monthly_growth_p",10,2)->nullable();
            $table->decimal("annual_revenue")->nullable();
            $table->decimal("retention_rate_p")->nullable();
            $table->integer("views")->default(0);
            $table->String("country")->nullable();
            $table->String("city")->nullable();
            
            


            $table->foreignId('category_id')->nullable();
             $table->foreignId('user_id')                     
                  ->constrained()
                  ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        
        Schema::dropIfExists('projects');
    }
};
