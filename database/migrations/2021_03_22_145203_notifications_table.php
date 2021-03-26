<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Enums\MessageStatus;

class NotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('courpon_id')->nullable();
            $table->unsignedBigInteger('message_id')->nullable();
            $table->unsignedBigInteger('order_id')->nullable();
            $table->unsignedBigInteger('sweet_id')->nullable();
            $table->string('title');
            $table->string('content');
            $table->enum('status', MessageStatus::getKeys());
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('courpon_id')->references('id')->on('courpons');
            $table->foreign('message_id')->references('id')->on('messages');
            $table->foreign('order_id')->references('id')->on('orders');
            $table->foreign('sweet_id')->references('id')->on('sweets');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notifications');
    }
}
