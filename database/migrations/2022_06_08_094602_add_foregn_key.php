<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForegnKey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('post_services', function (Blueprint $table) {
            $table->foreign('posts_id')
                ->references('id')
                ->on('posts')
                ->onDelete('CASCADE');
        });
        Schema::table('post_hair_colors', function (Blueprint $table) {
            $table->bigInteger('posts_id')->unsigned()->change();
            $table->foreign('posts_id')
                ->references('id')
                ->on('posts')
                ->onDelete('CASCADE');
        });
        Schema::table('post_intim_hairs', function (Blueprint $table) {
            $table->bigInteger('posts_id')->unsigned()->change();
            $table->foreign('posts_id')
                ->references('id')
                ->on('posts')
                ->onDelete('CASCADE');
        });
        Schema::table('post_metros', function (Blueprint $table) {
            $table->bigInteger('posts_id')->unsigned()->change();
            $table->foreign('posts_id')
                ->references('id')
                ->on('posts')
                ->onDelete('CASCADE');
        });
        Schema::table('post_rayons', function (Blueprint $table) {
            $table->bigInteger('posts_id')->unsigned()->change();
            $table->foreign('posts_id')
                ->references('id')
                ->on('posts')
                ->onDelete('CASCADE');
        });
        Schema::table('post_times', function (Blueprint $table) {
            $table->bigInteger('posts_id')->unsigned()->change();
            $table->foreign('posts_id')
                ->references('id')
                ->on('posts')
                ->onDelete('CASCADE');
        });
        Schema::table('post_nationals', function (Blueprint $table) {
            $table->bigInteger('post_nationals_id')->unsigned()->change();
            $table->foreign('post_nationals_id')
                ->references('id')
                ->on('posts')
                ->onDelete('CASCADE');
        });
        Schema::table('post_places', function (Blueprint $table) {
            $table->bigInteger('post_id')->unsigned()->change();
            $table->foreign('post_id')
                ->references('id')
                ->on('posts')
                ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('post_services', function (Blueprint $table) {
            $table->dropForeign('post_services_posts_id_foreign');
        });
        Schema::table('post_hair_colors', function (Blueprint $table) {
            $table->dropForeign('post_hair_colors_posts_id_foreign');
        });
        Schema::table('post_intim_hairs', function (Blueprint $table) {
            $table->dropForeign('post_intim_hairs_posts_id_foreign');
        });
        Schema::table('post_metros', function (Blueprint $table) {
            $table->dropForeign('post_metros_posts_id_foreign');
        });
        Schema::table('post_rayons', function (Blueprint $table) {
            $table->dropForeign('post_rayons_posts_id_foreign');
        });
        Schema::table('post_places', function (Blueprint $table) {
            $table->dropForeign('post_places_post_id_foreign');
        });
        Schema::table('post_nationals', function (Blueprint $table) {
            $table->dropForeign('post_nationals_post_nationals_id_foreign');
        });
    }
}
