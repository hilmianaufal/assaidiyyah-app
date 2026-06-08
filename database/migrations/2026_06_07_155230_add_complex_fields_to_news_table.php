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
        Schema::table('news', function (Blueprint $table) {
            $table->foreignId('news_category_id')->nullable()->after('id')->constrained()->nullOnDelete();
            $table->foreignId('author_id')->nullable()->after('news_category_id')->constrained()->nullOnDelete();
            $table->timestamp('published_at')->nullable()->after('status');
            $table->boolean('is_featured')->default(false)->after('published_at');
            $table->unsignedBigInteger('views')->default(0)->after('is_featured');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('news', function (Blueprint $table) {
            //
        });
    }
};
