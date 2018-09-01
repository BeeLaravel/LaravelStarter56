<?php

use Jialeo\LaravelSchemaExtend\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CeateCmsSetingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cms_settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('key')->unique();
            $table->string('default_value');
            $table->string('description');

            $table->unsignedTinyInteger('sort')->default(255);
            $table->integer('created_by');
            $table->timestamps();
            $table->softDeletes();

            $table->comment = 'CMS - 配置';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cms_settings');
    }
}
