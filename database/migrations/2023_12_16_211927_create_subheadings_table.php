<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubheadingsTable extends Migration
{
    public function up()
    {
        Schema::create('subheadings', function (Blueprint $table) {
            $table->unsignedBigInteger('subheading_id');
            $table->unsignedBigInteger('post_id');
            $table->string('subheading_title');
            $table->text('subheading_content');
            
            $table->foreign('post_id')->references('post_id')->on('posts');
            
            $table->timestamps();

            $table->primary(['subheading_id', 'post_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('subheadings');
    }
}


