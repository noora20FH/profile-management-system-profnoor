<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create("research_projects", function (Blueprint $table): void {
            $table->id();
            $table->string("title");
            $table->string("slug")->unique();
            $table->text("summary");
            $table->year("year");
            $table->string("funding_source")->nullable();
            $table->string("image_path")->nullable();
            $table->string("publication_url")->nullable();
            $table->boolean("is_featured")->default(false);
            $table->boolean("is_published")->default(false);
            $table->unsignedInteger("sort_order")->default(0);
            $table->timestamps();
        });

        Schema::create("publications", function (Blueprint $table): void {
            $table->id();
            $table
                ->foreignId("research_project_id")
                ->nullable()
                ->constrained()
                ->nullOnDelete();
            $table->string("title");
            $table->string("slug")->unique();
            $table->text("abstract")->nullable();
            $table->string("journal")->nullable();
            $table->date("published_at")->nullable();
            $table->string("doi")->nullable();
            $table->string("url")->nullable();
            $table->boolean("is_published")->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists("publications");
        Schema::dropIfExists("research_projects");
    }
};
