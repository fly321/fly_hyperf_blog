<?php

use Hyperf\Database\Schema\Schema;
use Hyperf\Database\Schema\Blueprint;
use Hyperf\Database\Migrations\Migration;

class CreateAdmin extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('admin', function (Blueprint $table) {
            //
        });

        Schema::create("admin", function (Blueprint $table){
            $table->bigInteger('id')->unsigned()->autoIncrement();
            $table->string('username', 50)->comment('用户名');
            $table->string('password', 64)->comment('密码');
            $table->string('nickname', 50)->comment('昵称');
            $table->string('avatar', 255)->comment('头像');
            $table->string('email', 50)->comment('邮箱');
            $table->string("salt", 50)->comment('盐');
            $table->integer("status")->comment('状态');
            $table->bigInteger("last_login_time")->comment('最后登录时间');
            $table->string("last_login_ip", 50)->comment('最后登录ip');
            $table->timestamps();
            $table->comment('管理员');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('admin', function (Blueprint $table) {
            //
        });
    }
}
