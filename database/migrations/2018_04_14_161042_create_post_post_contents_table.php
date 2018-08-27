<?php

use Jialeo\LaravelSchemaExtend\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostPostContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_contents', function (Blueprint $table) {
            $table->integer('post_id')->comment('文章 ID');
            $table->enum('language', ['zh-CN', 'zh-TW', 'zh-HK', 'en-US', 'en-GB', 'jp', 'kr'])->default('zh-CN')->comment('语言');
            $table->enum('content_type', ['MarkDown', 'reStructuredText', 'TinyMCE', 'UEditor'])->default('MarkDown')->comment('内容类型');
            $table->text('content')->comment('内容');

            $table->comment = '文章 - 文章内容';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post_details');
    }
}
