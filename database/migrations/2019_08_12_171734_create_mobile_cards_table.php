<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMobileCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('mobile_cards', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('order_id')->unique();
            $table->integer('price');
            $table->integer('bonus')->default(0);
            $table->integer('revenue')->default(0);
            $table->enum('status', ['create', 'wait', 'success', 'failed'])->index();
            $table->string('serial');
            $table->string('pin');
            $table->string('type');
            $table->string('gate');
            $table->unsignedBigInteger('user_id');
            $table->integer('server_id')->nullable();
            $table->bigInteger('character_id')->nullable();
            $table->string('note')->nullable();
            $table->timestamps();

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
        Schema::dropIfExists('mobile_cards');
    }
}
