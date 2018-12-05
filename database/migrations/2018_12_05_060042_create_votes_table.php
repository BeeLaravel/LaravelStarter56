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
            $table->timestamp('start_at')->nullable()->comment('开始时间');
            $table->timestamp('finish_at')->nullable()->comment('结束时间');
            $table->string('swipers')->comment('Swipers');
            
            $table->integer('attended_count')->comment('参赛数');
            $table->integer('voted_count')->comment('投票数');
            $table->integer('visited_count')->comment('访问数');
            
            $table->string('seo_title', 20)->comment('标题');
            $table->string('seo_description', 20)->comment('描述');
            $table->string('seo_keywords', 20)->comment('关键词');


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
