<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('report_contacts', function (Blueprint $table) {
            $table->increments('id');

            $table->tinyInteger('corporation_id')->comment('公司 ID');
            $table->date('date')->comment('日期');
            $table->smallInteger('onduty')->comment('在班人数');

            $table->smallInteger('callback')->comment('总回访');
            $table->smallInteger('callback_real')->comment('有效回访');
            $table->smallInteger('callback_old')->comment('老数据总回访');
            $table->smallInteger('callback_old_real')->comment('老数据有效回访');
            $table->smallInteger('visit')->comment('到访');
            $table->smallInteger('previsit')->comment('预到访');

            $table->decimal('money')->comment('到诊金额');
            
            $table->integer('created_by');
            $table->timestamps();
            $table->softDeletes();

            $table->comment = '报表 - 咨询';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('report_contacts');
    }
}
