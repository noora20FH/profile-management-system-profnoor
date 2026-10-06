<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create("media", function (Blueprint $table): void {
            $table->id();
            $table->string("disk")->default("public");
            $table->string("path");
            $table->string("filename");
            $table->string("mime_type")->nullable();
            $table->unsignedBigInteger("size")->nullable();
            $table->string("alt_text")->nullable();
            $table->string("collection")->default("default")->index();
            $table->timestamps();
        });

        Schema::create("consultations", function (Blueprint $table): void {
            $table->id();
            $table->string("name");
            $table->string("email");
            $table->string("topic")->nullable();
            $table->text("message")->nullable();
            $table->dateTime("preferred_at")->nullable();
            $table->string("status")->default("pending")->index();
            $table->timestamps();
        });

        Schema::create("content_blocks", function (Blueprint $table): void {
            $table->id();
            $table->string("key")->unique();
            $table->string("title")->nullable();
            $table->longText("content")->nullable();
            $table->json("metadata")->nullable();
            $table->boolean("is_published")->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists("content_blocks");
        Schema::dropIfExists("consultations");
        Schema::dropIfExists("media");
    }
};
