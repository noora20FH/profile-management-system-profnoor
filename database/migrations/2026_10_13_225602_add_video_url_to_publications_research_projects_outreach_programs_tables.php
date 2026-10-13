<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('publications', function (Blueprint $table) {
            $table->string('video_url')
                ->nullable()
                ->after('url');
        });

        Schema::table('research_projects', function (Blueprint $table) {
            $table->string('video_url')
                ->nullable()
                ->after('publication_url');
        });

        Schema::table('outreach_programs', function (Blueprint $table) {
            $table->string('video_url')
                ->nullable()
                ->after('impact_url');
        });
    }

    public function down(): void
    {
        Schema::table('publications', function (Blueprint $table) {
            $table->dropColumn('video_url');
        });

        Schema::table('research_projects', function (Blueprint $table) {
            $table->dropColumn('video_url');
        });

        Schema::table('outreach_programs', function (Blueprint $table) {
            $table->dropColumn('video_url');
        });
    }
};