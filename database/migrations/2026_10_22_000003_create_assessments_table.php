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
        Schema::create('assessments', function (Blueprint $table) {
            $table->id();
            $table->string('full_name', 150);
            $table->string('work_email', 150)->index();
            $table->string('company_name', 150);
            $table->string('team_size', 50);
            $table->string('interested_in', 100)->nullable();
            $table->text('wishlist')->nullable();
            $table->string('status', 50)->default('pending');
            $table->string('ip_address', 45)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assessments');
    }
};
