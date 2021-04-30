<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id('post_id');
            $table->bigInteger('author-id')->unsigned();
            $table->timestamps();
            $table->string('title');
            $table->text('description');
            $table->string('img')->nullable();
            $table->decimal('brut', $precision = 8, $scale = 2);
            $table->decimal('prixDepart', $precision = 8, $scale = 2);
            $table->decimal('prixPlancher', $precision = 8, $scale = 2);
            $table->decimal('prixActuel', $precision = 8, $scale = 2);
            $table->bigInteger('espece_id')->unsigned();
            $table->bigInteger('taille_id')->unsigned();
            $table->bigInteger('bateau_id')->unsigned();
            $table->bigInteger('bac_id')->unsigned();
            $table->bigInteger('presentation_id')->unsigned();
            $table->bigInteger('qualite_id')->unsigned();
            $table->bigInteger('date_id')->unsigned();

            $table->foreign('author-id')->references('id')->on('users');
            $table->foreign('espece_id')->references('espece_id')->on('especes');
            $table->foreign('taille_id')->references('taille_id')->on('tailles');
            $table->foreign('bateau_id')->references('bateau_id')->on('bateaus');
            $table->foreign('bac_id')->references('bac_id')->on('bacs');
            $table->foreign('presentation_id')->references('presentation_id')->on('presentations');
            $table->foreign('qualite_id')->references('qualite_id')->on('qualites');
            $table->foreign('date_id')->references('date_id')->on('date_peches');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
