<?php

use App\Enums\Discord\ChannelType;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('channels', function (Blueprint $table) {
            $table->id();
            $table->string('channel_id');
            $table->string('parent_id')->nullable();
            $table->string('guild_id')->nullable();
            /** @see ChannelType */
            $table->integer('type');
            $table->string('name');
            $table->morphs('channelable');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('channels');
    }
};
