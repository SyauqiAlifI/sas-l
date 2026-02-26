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
            $table->dropColumn('rating');
        });
        Schema::table('programs', function (Blueprint $table) {
            $table->decimal('rating', 2, 1)->nullable()->after('description');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('programs', function (Blueprint $table) {
            $table->dropColumn('rating');
        });
        Schema::table('programs', function (Blueprint $table) {
            $table->enum('rating', ['poor', 'bad', 'neutral', 'good', 'best'])->default('neutral')->after('description');
        });
    }
};
