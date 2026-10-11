<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('publications', function (Blueprint $table) {

            /*
             |--------------------------------------------------------------------------
             | Jenis Publikasi
             |--------------------------------------------------------------------------
             */

            $table->string('type')
                ->default('journal')
                ->after('research_project_id');


            /*
             |--------------------------------------------------------------------------
             | Informasi Publikasi
             |--------------------------------------------------------------------------
             */

            $table->string('publisher')
                ->nullable()
                ->after('journal');

            $table->text('description')
                ->nullable()
                ->after('abstract');


            $table->string('authors')
                ->nullable()
                ->after('publisher');


            /*
             |--------------------------------------------------------------------------
             | File Upload
             |--------------------------------------------------------------------------
             */

            $table->string('file_path')
                ->nullable()
                ->after('url');


            $table->string('file_name')
                ->nullable()
                ->after('file_path');


            /*
             |--------------------------------------------------------------------------
             | Visual
             |--------------------------------------------------------------------------
             */

            $table->string('thumbnail')
                ->nullable()
                ->after('file_name');


            /*
             |--------------------------------------------------------------------------
             | Index
             |--------------------------------------------------------------------------
             */

            $table->index('type');

        });
    }


    public function down(): void
    {
        Schema::table('publications', function (Blueprint $table) {

            $table->dropIndex(['type']);

            $table->dropColumn([
                'type',
                'publisher',
                'description',
                'authors',
                'file_path',
                'file_name',
                'thumbnail',
            ]);

        });
    }
};