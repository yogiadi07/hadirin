<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIdAnggotaToAnggotasTable extends Migration
{
    public function up()
    {
        Schema::table('anggotas', function (Blueprint $table) {
            $table->string('id_anggota')->nullable()->unique();

        });
    }

    public function down()
    {
        Schema::table('anggotas', function (Blueprint $table) {
            $table->dropColumn('id_anggota');
        });
    }
}
