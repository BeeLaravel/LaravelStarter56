<?php

use Jialeo\LaravelSchemaExtend\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLinkTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('link_tags', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('parent_id')->default(0)->comment('父ID');
            $table->string('slug', 50)->comment('标识');
            $table->string('title', 50)->comment('标题');
            $table->text('description')->nullable()->comment('描述');

            $table->unsignedTinyInteger('sort')->default(255);
            $table->integer('created_by');
            $table->timestamps();
            $table->softDeletes();

            $table->comment = '链接 - 标签';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('link_tags');
    }
}
