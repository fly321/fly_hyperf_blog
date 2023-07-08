<?php

use Hyperf\Database\Schema\Schema;
use Hyperf\Database\Schema\Blueprint;
use Hyperf\Database\Migrations\Migration;

class CreateMenu extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('menu', function (Blueprint $table) {
            $table->bigInteger('id')->unsigned()->autoIncrement();
            $table->string('title', 50)->comment('菜单名称');
            $table->string('url', 100)->comment('菜单地址');
            $table->string("query", 100)->comment('菜单参数');
            $table->integer("weight")->comment('菜单权重');
            $table->timestamps();
            $table->comment('菜单');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('menu', function (Blueprint $table) {
            Schema::dropIfExists('true');
        });
    }
}
