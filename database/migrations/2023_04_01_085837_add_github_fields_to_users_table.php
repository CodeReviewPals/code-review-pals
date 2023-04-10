<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', static function (Blueprint $table) {
            $table
                ->string('github_id')
                ->nullable()
                ->unique()
                ->after('email');
            $table
                ->string('github_token')
                ->nullable()
                ->after('github_id');
            $table
                ->string('github_refresh_token')
                ->nullable()
                ->after('github_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', static function (Blueprint $table) {
            $table->dropColumn(['github_id', 'github_token', 'github_refresh_token']);
        });
    }
};
