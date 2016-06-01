<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tags', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tag')->unique(); //tag名，唯一
            $table->string('title');
            $table->string('subtitle');
            $table->string('page_image');//标签图片地址
            $table->string('meta_description');//标签介绍
            $table->string('layout')->default('blog.layouts.index');//
            $table->boolean('reverse_direction');//是否在文章列表按时间升序排列博客文章
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tags');
    }
}
