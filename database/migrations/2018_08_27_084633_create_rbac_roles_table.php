<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRbacRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rbac_roles', function (Blueprint $table) {
            $table->increments('id');

            $table->string('slug', 50)->comment('标识');
            $table->string('title', 50)->comment('标题');
            $table->integer('parent_id')->default(0)->comment('父 ID');
            $table->text('description')->nullable()->comment('描述');

            $table->integer('created_by');
            $table->timestamps();
            $table->softDeletes();

            $table->comment = 'RBAC - 角色';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rbac_roles');
    }
}
