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
        Schema::create('repositories', static function (Blueprint $table) {
            $table->id();
            $table->string('node_id');
            $table
                ->foreignIdFor(User::class)
                ->constrained()
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->string('full_name');
            $table->string('description')->nullable();
            $table->string('language')->nullable();
            $table->string('html_url');
            $table->timestamps();
            $table->softDeletes();
            $table->unique(['node_id', 'full_name']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('repositories');
    }
};
