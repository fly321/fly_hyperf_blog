<?php

use Hyperf\Database\Schema\Schema;
use Hyperf\Database\Schema\Blueprint;
use Hyperf\Database\Migrations\Migration;

class CreateArticle extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('article', function (Blueprint $table) {
            //
        });

        /**
        CREATE TABLE `fly_article` (
        `id` int unsigned NOT NULL AUTO_INCREMENT,
        `title` varchar(255) COLLATE utf8mb4_general_ci NOT NULL COMMENT '标题',
        `describe` varchar(500) COLLATE utf8mb4_general_ci NOT NULL COMMENT '描述',
        `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT '文章首图',
        `created_at` datetime NOT NULL COMMENT '创建时间',
        `updated_at` datetime NOT NULL COMMENT '修改时间',
        PRIMARY KEY (`id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
         */
        Schema::create("article", function (Blueprint $table){
            $table->bigInteger('id')->unsigned()->autoIncrement();
            $table->string('title', 255)->comment('标题');
            $table->string('describe', 500)->comment('描述');
            $table->string('image', 255)->comment('首图');
            $table->timestamps();
            $table->comment('文章');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('article', function (Blueprint $table) {
            //
        });
    }
}
