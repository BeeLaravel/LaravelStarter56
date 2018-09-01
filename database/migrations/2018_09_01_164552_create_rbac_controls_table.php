<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRbacControlsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rbac_controls', function (Blueprint $table) {
            $table->increments('id');

            $table->enum('type', ['platform', 'system', 'function', 'operation'])->comment('类型');
            $table->enum('strategy', ['allow', 'deny'])->comment('策略');
            $table->morphs('morphs');
            $table->integer('identify')->comment('标识');
            $table->ipAddress('ip');
            $table->timestamp('time_begin')->nullable();
            $table->timestamp('time_end')->nullable();

            $table->integer('created_by');
            $table->timestamps();
            $table->softDeletes();

            $table->comment = 'RBAC - 控制';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cms_ips');
    }
}
