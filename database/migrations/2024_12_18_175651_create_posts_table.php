<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('image');
            $table->string('description');
            $table->longText('meta_words')->nullable();
            $table->longText('meta_description')->nullable();
            $table->integer('views')->default(0);
            // $table->enum('status',['pending', 'approved', 'rejected'])->nullable();
            $table->string('status')->default('pending');
            $table->timestamps();
        });

        Schema::create('category_post', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained()->cascadeOnDelete();
            $table->foreignId('post_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Position matter because if the category_post holds the relations between two tables and if the post is before the 'category id
        // it would  delete the post id and give an error in category_id because the post id doesnte exists
        // it also mater whare this code is because the migration loomk steup by steup
        Schema::dropIfExists('category_post');
        Schema::dropIfExists('posts');
    }
};
