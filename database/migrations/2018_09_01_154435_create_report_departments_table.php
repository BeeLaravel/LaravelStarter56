<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportDepartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('report_departments', function (Blueprint $table) {
            $table->increments('id');

            $table->tinyInteger('corporation_id')->comment('公司 ID');
            $table->date('date')->comment('日期');

            $table->enum('type', ['weibo', 'xinyang', 'gengmei', 'meituan', 'yuemei', 'meidaila', 'helijia', 'other'])->comment('渠道');

            $table->smallInteger('dialog_useful')->comment('有效对话');
            $table->smallInteger('dialog_useless')->comment('无效对话');
            $table->smallInteger('bespeak')->comment('预约');
            $table->smallInteger('visit')->comment('到访');
            $table->smallInteger('visit_sem')->comment('到访-竞价');
            $table->smallInteger('volume')->comment('成交');

            $table->decimal('consumption')->comment('消费');
            $table->decimal('consumption_real')->comment('实际消费');

            $table->decimal('achievement')->comment('业绩');
            $table->decimal('achievement_first')->comment('初诊业绩');
            
            $table->integer('created_by');
            $table->timestamps();
            $table->softDeletes();

            $table->comment = '报表 - 科室';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('report_departments');
    }
}
