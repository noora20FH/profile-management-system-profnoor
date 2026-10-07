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
        Schema::table('outreach_programs', function (Blueprint $table) {
            $table->string('impact_url')
                ->nullable()
                ->after('secondary_metric');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('outreach_programs', function (Blueprint $table) {
            $table->dropColumn('impact_url');
        });
    }
};
