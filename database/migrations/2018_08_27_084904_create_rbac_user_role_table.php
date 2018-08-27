<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRbacUserRoleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rbac_user_role', function (Blueprint $table) {
            $table->integer('user_id')->comment('用户 ID');
            $table->integer('role_id')->comment('角色 ID');

            $table->comment = 'RBAC - 用户角色';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rbac_user_role');
    }
}
