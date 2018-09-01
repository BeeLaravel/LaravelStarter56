<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CeateCmsSettingValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cms_setting_values', function (Blueprint $table) {
            $table->increments('id');
            $table->string('key');
            $table->string('value');
            $table->integer('organization_id');

            $table->unsignedTinyInteger('sort')->default(255);
            $table->integer('created_by');
            $table->timestamps();
            $table->softDeletes();

            $table->comment = 'CMS - 配置值';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cms_setting_values');
    }
}
