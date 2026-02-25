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
        Schema::table('programs', function (Blueprint $table) {
            $table->renameColumn('name', 'title');
            $table->renameColumn('is_available', 'is_open');
            $table->string('slug')->unique();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('category_id')->constrained()->cascadeOnDelete();
            $table->string('duration');
            $table->string('type');
            $table->date('programStart')->nullable();
            $table->date('registerDate')->nullable();
            $table->date('closedDate')->nullable();
            $table->softDeletes();
        });

        // Also we need to change price from integer to string (varchar) as per ERD
        Schema::table('programs', function (Blueprint $table) {
            $table->string('price')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('programs', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['category_id']);
            $table->dropColumn(['slug', 'user_id', 'category_id', 'duration', 'type', 'programStart', 'registerDate', 'closedDate', 'deleted_at']);
            $table->renameColumn('title', 'name');
            $table->renameColumn('is_open', 'is_available');
        });

        Schema::table('programs', function (Blueprint $table) {
            $table->integer('price')->nullable()->change();
        });
    }
};
