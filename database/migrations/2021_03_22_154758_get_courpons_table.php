<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Enums\GetCourponStatus;

class GetCourponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('get_courpons', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('courpon_id');
            $table->unsignedBigInteger('user_id');
            $table->integer('category_id')->unsigned()->nullable();
            $table->string('name');
            $table->integer('price')->nullable();
            $table->string('parcent')->nullable();
            $table->string('in_force');
            $table->enum('flag', GetCourponStatus::getKeys());
            $table->timestamps();

            $table->foreign('courpon_id')->references('id')->on('courpons');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('category_id')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('get_courpons');
    }
}
