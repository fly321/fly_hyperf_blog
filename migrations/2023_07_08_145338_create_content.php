<?php

use Hyperf\Database\Schema\Schema;
use Hyperf\Database\Schema\Blueprint;
use Hyperf\Database\Migrations\Migration;

class CreateContent extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('content', function (Blueprint $table) {
            //
        });

        Schema::create("content", function (Blueprint $table){
            $table->bigInteger('id');
            $table->text('content')->comment('内容');
            $table->timestamps();
            $table->comment('内容');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('content', function (Blueprint $table) {
            //
        });
    }
}
