<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('articles', function (Blueprint $t) {
            $t->id();
            $t->foreignId('article_category_id')->nullable()->constrained('article_categories')->nullOnDelete();
            $t->string('title');
            $t->string('slug')->unique();
            $t->text('excerpt')->nullable();
            $t->longText('body')->nullable();
            $t->string('image')->nullable();
            $t->boolean('is_featured')->default(false);   // artikel utama
            $t->unsignedTinyInteger('read_minutes')->nullable();
            $t->timestamp('published_at')->nullable()->index();
            $t->timestamps();

            $t->index(['is_featured', 'published_at']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
