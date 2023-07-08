<?php

use Hyperf\Database\Schema\Schema;
use Hyperf\Database\Schema\Blueprint;
use Hyperf\Database\Migrations\Migration;

class CreateCategory extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('category', function (Blueprint $table) {
            //
        });

        Schema::create("category", function (Blueprint $table){
            $table->bigInteger('id')->unsigned()->autoIncrement();
            $table->string('title', 50)->comment('分类名');
            $table->timestamps();
            $table->comment('分类');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('category', function (Blueprint $table) {
            //
        });
    }
}
