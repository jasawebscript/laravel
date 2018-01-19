<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameParticipantsTableToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('participants', function (Blueprint $table) {
            $table->string('password')->after('email')->nullable();
            $table->rememberToken()->after('password');
            $table->rename('users');
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
            $table->dropColumn('password');
        });

        // separate because of https://github.com/laravel/framework/issues/2979
        Schema::table('users', function (Blueprint $table) {
            $table->dropRememberToken();
        });

        Schema::table('users', function (Blueprint $table) {
            $table->rename('participants');
        });
    }
}
