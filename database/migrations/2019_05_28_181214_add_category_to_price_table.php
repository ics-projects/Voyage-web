<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCategoryToPriceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('seat_price', function (Blueprint $table) {
            $table->bigInteger('category')->unsigned()->index('category_idx');
            $table->foreign('category', 'fk_seat_price_category')
                ->references('id')->on('seat_category')
                ->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('seat_price', function (Blueprint $table) {
            //
        });
    }
}
