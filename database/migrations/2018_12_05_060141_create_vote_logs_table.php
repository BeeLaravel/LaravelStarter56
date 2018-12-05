<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVoteLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vote_logs', function (Blueprint $table) {
            $table->increments('id');

            $table->string('ip', 20)->comment('IP 地址');
            $table->string('vote_user_id', 20)->comment('投给');

            $table->integer('created_by')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->comment = '投票 - 日志';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vote_logs');
    }
}
