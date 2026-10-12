<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {

        Schema::table('publications', function (Blueprint $table) {


            // hapus kolom journal
            $table->dropColumn('journal');


            // tipe publikasi
            $table->string('type')
                ->after('research_project_id');


        });


    }


    public function down(): void
    {

        Schema::table('publications', function (Blueprint $table) {


            $table->string('journal')
                ->nullable();


            $table->dropColumn('type');


        });

    }

};