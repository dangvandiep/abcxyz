<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGiftcodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('giftcodes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code', 32)->unique();
            $table->integer('amount');
            $table->json('items');
            $table->enum('type', ['public', 'private']);
            $table->string('mail_title', 50);
            $table->text('mail_content');
            $table->string('mail_description')->nullable();
            $table->string('tag')->index();
            $table->timestamp('begin_time')->nullable();
            $table->timestamp('end_time')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->integer('server_id')->nullable();
            $table->integer('used')->default(0);
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();

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
        Schema::dropIfExists('giftcodes');
    }
}
