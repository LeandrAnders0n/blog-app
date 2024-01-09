<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Enums\BlogEnums;

class CreatePostsTable extends Migration
{
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id('post_id');
            $table->string('author_name');
            $table->timestamp('publish_date')->default(now());
            $table->string('title');
            $table->text('introduction_content')->nullable();
            $table->text('comments')->nullable(); // Added comments column
            $table->enum('post_status', [BlogEnums::IN_PROGRESS, BlogEnums::ACCEPTED, BlogEnums::REJECTED])->default(BlogEnums::IN_PROGRESS);
            $table->unsignedBigInteger('author_id');
            
            $table->foreign('author_id')->references('id')->on('users');
            
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
