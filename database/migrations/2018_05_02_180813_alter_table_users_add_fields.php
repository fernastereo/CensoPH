<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableUsersAddFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('property_id')->unsigned();
            $table->string('idnumber')->nullable();
            $table->string('notification_address')->nullable();
            $table->string('cellphone_number')->nullable();

            $table->foreign('property_id')->references('id')->on('properties');
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
            $table->dropForeign('users_property_id_foreign');
            $table->dropColumn('property_id');
            $table->dropColumn('idnumber');
            $table->dropColumn('notification_address');
            $table->dropColumn('cellphone_number');
        });
    }
}
