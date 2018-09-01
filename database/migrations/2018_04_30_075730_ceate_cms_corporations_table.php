<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CeateCmsCorporationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cms_corporations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slug');
            $table->string('title');
            $table->string('description');

            $table->unsignedTinyInteger('sort')->default(255);
            $table->integer('created_by');
            $table->timestamps();
            $table->softDeletes();

            $table->comment = 'CMS - 公司';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cms_corporations');
    }
}
