<?php
use Illuminate\Database\Migrations\Migration;
use Jialeo\LaravelSchemaExtend\Schema;
use Illuminate\Database\Schema\Blueprint;

class CreateRbacUsersTable extends Migration {
    public function up() {
        Schema::create('rbac_users', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name', 20);
            $table->string('avatar');
            $table->string('email')->unique();
            $table->string('corporation_id')->comment('公司 ID');
            $table->string('password');
            $table->rememberToken();

            $table->timestamps();
            $table->softDeletes();

            $table->comment = 'RBAC - 用户';
        });
    }
    public function down() {
        Schema::dropIfExists('rbac_administrators');
    }
}
