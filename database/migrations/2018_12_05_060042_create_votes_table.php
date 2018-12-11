<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('votes', function (Blueprint $table) {
            $table->increments('id');

            $table->string('title', 20)->comment('名称');
            $table->string('avatar', 255)->comment('头像');
            $table->text('description')->comment('描述');
            $table->string('swipers')->comment('Swipers');

            $table->timestamp('start_at')->nullable()->comment('开始时间');
            $table->timestamp('finish_at')->nullable()->comment('结束时间');
            
            $table->integer('attend_count')->comment('参赛数');
            $table->integer('vote_count')->comment('投票数');
            $table->integer('visit_count')->comment('访问数');
            
            $table->string('seo_title', 20)->comment('标题');
            $table->text('seo_description')->comment('描述');
            $table->string('seo_keywords', 255)->comment('关键词');


            $table->integer('created_by');
            $table->timestamps();
            $table->softDeletes();

            $table->comment = '投票';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('votes');
    }
}
