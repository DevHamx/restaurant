<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class OnDeleteCascade extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('restaurant_menus', function (Blueprint $table) {
            $table->dropForeign('restaurant_menus_restaurant_id_foreign');
            $table->foreign('restaurant_id')->references('id')->on('restaurants')->onDelete('cascade');
        });

        Schema::table('restaurant_menu_items', function (Blueprint $table) {
            $table->dropForeign('restaurant_menu_items_restaurant_menu_id_foreign');
            $table->foreign('restaurant_menu_id')->references('id')->on('restaurant_menus')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
