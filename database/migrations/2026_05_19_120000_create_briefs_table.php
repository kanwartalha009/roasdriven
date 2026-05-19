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
        Schema::create('briefs', function (Blueprint $table) {
            $table->id();

            // Required fields
            $table->string('name', 120);
            $table->string('email', 160)->index();
            $table->string('brand', 160);
            $table->string('url', 255);

            // Optional fields
            $table->string('revenue', 40)->nullable();
            $table->string('spend', 40)->nullable();
            $table->json('needs')->nullable();
            $table->text('message')->nullable();

            // Audit (helpful for spam debugging)
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();

            $table->timestamps();

            $table->index('created_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('briefs');
    }
};
