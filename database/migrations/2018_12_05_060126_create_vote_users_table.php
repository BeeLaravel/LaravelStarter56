<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVoteUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vote_users', function (Blueprint $table) {
            $table->increments('id');

            $table->string('title', 20)->comment('名称');
            $table->string('avatar', 20)->comment('头像');
            $table->text('description', 20)->comment('描述');
            $table->integer('vote_id');

            $table->integer('vote_count')->comment('投票数');
            $table->integer('visit_count')->comment('访问数');

            $table->integer('created_by')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->comment = '投票 - 用户';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vote_users');
    }
}
