<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForeignKeyForRoleUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('role_user', function (Blueprint $table) {
            // $table->bigIncrements('id');

            $table->foreign('role_id')->references('id')->on('roles')->onDlete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDlete('cascade');
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropIfExists('foreign_key_for_role_user');
        // $table->dropForeign(['role_id']);
        // $table->dropForeign(['user_id']);

        Schema::table('role_user',function(Blueprint $table){
            $table->dropForeign(['role_user_role_id_foreign']);
            $table->dropForeign(['role_user_user_id_foreign']);
        });
    }
}
