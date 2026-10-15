<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('profiles', function (Blueprint $table) {
            // ----- HERO SECTION -----
            $table->string('status_pill')->nullable()->after('title');
            $table->string('hero_photo_path')->nullable()->after('photo_path');
            $table->string('hero_cta_primary_label')->nullable()->after('hero_description');
            $table->string('hero_cta_primary_url')->nullable()->after('hero_cta_primary_label');
            $table->string('hero_cta_secondary_label')->nullable()->after('hero_cta_primary_url');
            $table->json('hero_metrics')->nullable()->after('hero_cta_secondary_label');

            // ----- BIOGRAPHY SECTION -----
            $table->string('biography_photo_path')->nullable()->after('hero_metrics');
            $table->string('biography_eyebrow')->nullable()->after('biography_photo_path');
            $table->string('biography_title')->nullable()->after('biography_eyebrow');
            $table->json('biography_paragraphs')->nullable()->after('biography_title');
            $table->json('qualifications')->nullable()->after('biography_paragraphs');
            $table->json('expertise_tags')->nullable()->after('qualifications');
        });
    }

    public function down(): void
    {
        Schema::table('profiles', function (Blueprint $table) {
            $table->dropColumn([
                'status_pill',
                'hero_photo_path',
                'hero_cta_primary_label',
                'hero_cta_primary_url',
                'hero_cta_secondary_label',
                'hero_metrics',
                'biography_photo_path',
                'biography_eyebrow',
                'biography_title',
                'biography_paragraphs',
                'qualifications',
                'expertise_tags',
            ]);
        });
    }
};