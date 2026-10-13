<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::table('publications')
            ->whereNull('type')
            ->orWhere('type', '')
            ->update([
                'type' => 'artikel_jurnal'
            ]);
    }


    public function down(): void
    {
        DB::table('publications')
            ->where('type', 'artikel_jurnal')
            ->update([
                'type' => ''
            ]);
    }
};