<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::dropIfExists('consultations');
        Schema::dropIfExists('content_blocks');
    }

    public function down(): void
    {
        // Recreate hanya untuk keperluan rollback
        Schema::create('consultations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('topic')->nullable();
            $table->text('message')->nullable();
            $table->dateTime('preferred_at')->nullable();
            $table->string('status')->default('pending');
            $table->timestamps();
            $table->index('status');
        });

        Schema::create('content_blocks', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique();
            $table->string('title')->nullable();
            $table->longText('content')->nullable();
            $table->json('metadata')->nullable();
            $table->boolean('is_published')->default(false);
            $table->timestamps();
        });
    }
};