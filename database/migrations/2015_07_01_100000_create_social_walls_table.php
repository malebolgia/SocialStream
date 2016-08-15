<?php

use Illuminate\Database\Migrations\Migration;

class CreateSocialWallsTable extends Migration
{
    /*
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {

        /*
         * Table: social_walls
         */
        Schema::create('social_walls', function ($table) {
            $table->increments('id');
            $table->string('nameid', 255)->nullable();
            $table->longText('options')->nullable();
            $table->bigInteger('category_id')->nullable();
            $table->string('slug', 100)->nullable();
            $table->integer('user_id')->nullable();
            $table->string('upload_folder', 100)->nullable();
            $table->softDeletes();
            $table->nullableTimestamps();
        });
    }

    /*
    * Reverse the migrations.
    *
    * @return void
    */

    public function down()
    {
        Schema::drop('social_walls');
    }
}
