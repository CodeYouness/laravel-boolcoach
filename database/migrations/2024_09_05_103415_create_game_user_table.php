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
        Schema::create('game_user', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger("user_id");
                $table->foreign('user_id')->references("id")->on('users')
                ->cascadeOnUpdate();

            $table->unsignedBigInteger("game_id");
                $table->foreign('game_id')->references("id")->on('games')
                ->cascadeOnUpdate();

            $table->string('rank')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('game_user', function (Blueprint $table) {

            $table->dropForeign(['user_id']);
            $table->dropForeign(['game_id']);
        });

        Schema::dropIfExists('game_user');
    }
};
