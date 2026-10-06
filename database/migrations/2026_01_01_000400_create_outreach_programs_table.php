<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create("outreach_programs", function (Blueprint $table): void {
            $table->id();
            $table->string("title");
            $table->string("slug")->unique();
            $table->string("category")->nullable();
            $table->text("description");
            $table->string("year");
            $table->string("image_path")->nullable();
            $table->string("primary_metric")->nullable();
            $table->string("secondary_metric")->nullable();
            $table->boolean("is_featured")->default(false);
            $table->boolean("is_published")->default(false);
            $table->unsignedInteger("sort_order")->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists("outreach_programs");
    }
};
