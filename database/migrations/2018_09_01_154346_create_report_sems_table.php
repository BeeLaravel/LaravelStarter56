<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportSemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('report_sems', function (Blueprint $table) {
            $table->increments('id');

            $table->tinyInteger('corporation_id')->comment('公司 ID');
            $table->date('date')->comment('日期');

            $table->enum('type', ['baidu', 'sogou', 'shenma', '360'])->comment('类型');

            $table->smallInteger('dialog_useful')->comment('有效对话');
            $table->smallInteger('dialog_useless')->comment('无效对话');
            $table->smallInteger('bespeak')->comment('预约');
            $table->smallInteger('visit')->comment('到访');

            $table->decimal('consumption')->comment('消费');
            $table->decimal('consumption_real')->comment('实际消费');
            
            $table->integer('created_by');
            $table->timestamps();
            $table->softDeletes();

            $table->comment = '报表 - SEM';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('report_sems');
    }
}
