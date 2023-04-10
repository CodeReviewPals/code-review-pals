<?php

use App\Models\User;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pull_requests', static function (Blueprint $table) {
            $table->id();
            $table->string('node_id')->unique();
            $table->string('repository')->nullable();
            $table->string('title');
            $table->string('html_url');
            /** @see \App\Enums\PullRequest\Status */
            $table->string('status');
            $table->string('description')->nullable();
            $table->foreignIdFor(User::class)->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pull_requests');
    }
};
