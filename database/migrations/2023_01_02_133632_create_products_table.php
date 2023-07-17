<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('ProdName');
            $table->integer('ProdPrice');
            $table->string('ProdCat');
            $table->string('ProdImg');
            $table->string('ProdDes');
            $table->date('ProdDate');
            $table->integer('ProdShow');
            $table->integer('ProdBuy');
            $table->integer('uId');
            $table->integer('catId');
            $table->integer('tab');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
