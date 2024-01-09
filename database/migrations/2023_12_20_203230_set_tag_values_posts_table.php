<?php

use App\Enums\BlogEnums;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            // Modify the 'tag' column
            $table->enum('tag', array_values(BlogEnums::TAGS))->change();
        });
    }

    public function down(): void
    {
        //
    }
};
