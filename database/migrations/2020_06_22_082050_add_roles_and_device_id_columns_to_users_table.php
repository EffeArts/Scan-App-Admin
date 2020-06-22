<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRolesAndDeviceIdColumnsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('role_id')->after('email')->default(1);
            $table->foreign('role_id')->references('id')->on('roles');
            $table->integer('device_id')->after('email')->nullable();
            $table->foreign('device_id')->references('id')->on('devices');
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
        });
    }
}
