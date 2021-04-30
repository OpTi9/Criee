<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEncherirsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('encherirs', function (Blueprint $table) {
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('post_id')->unsigned();
            $table->decimal('prix', $precision = 8, $scale = 2);
            $table->dateTime('date_enchere');
            $table->primary(['user_id', 'post_id','prix']);

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('post_id')->references('post_id')->on('posts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('encherirs');
    }
}
