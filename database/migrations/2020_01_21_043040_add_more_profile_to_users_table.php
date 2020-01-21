<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMoreProfileToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->string('akun_wa')->after('password')->nullable(true);
            $table->string('akun_telegram')->after('password')->nullable(true);
            $table->string('akun_instagram')->after('password')->nullable(true);
            $table->string('akun_facebook')->after('password')->nullable(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->dropColumn('akun_wa');
            $table->dropColumn('akun_telegram');
            $table->dropColumn('akun_instagram');
            $table->dropColumn('akun_facebook');
        });
    }
}
