<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CeateRbacCorporationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rbac_corporations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slug');
            $table->string('title', 20);
            $table->string('description');
            $table->string('address');
            $table->string('tel', 15);
            $table->string('postcode', 10);

            $table->unsignedTinyInteger('sort')->default(255);
            $table->integer('created_by');
            $table->timestamps();
            $table->softDeletes();

            $table->comment = 'RBAC - 公司';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rbac_corporations');
    }
}
