<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create("profiles", function (Blueprint $table): void {
            $table->id();
            $table->string("name");
            $table->string("title");
            $table->string("email")->nullable();
            $table->string("phone")->nullable();
            $table->string("institution")->nullable();
            $table->text("biography")->nullable();
            $table->text("hero_description")->nullable();
            $table->string("photo_path")->nullable();
            $table->boolean("is_active")->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists("profiles");
    }
};
