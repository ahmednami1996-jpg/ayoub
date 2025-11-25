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
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
    $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
    $table->foreignId('project_id')->constrained('projects')->cascadeOnDelete();
    $table->decimal('amount', 12, 2)->nullable();
    $table->text('message')->nullable();
    $table->enum('status', ['pending', 'accepted', 'rejected'])->default('pending');
    $table->timestamps();

    $table->unique(['user_id', 'project_id']); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};
