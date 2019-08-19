<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGiftcodeLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('giftcode_logs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('giftcode_id');
            $table->unsignedBigInteger('user_id');
            $table->bigInteger('character_id');
            $table->integer('server_id');
            $table->timestamps();

            $table->foreign('giftcode_id')->references('id')->on('giftcodes')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('giftcode_logs');
    }
}
