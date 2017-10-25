<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SellTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sell', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger('product_id');
            $table->index('product_id');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('no action')->onUpdate('no action');
            $table->unsignedInteger('member_id')->nullable();
            $table->index('member_id');
            $table->foreign('member_id')->references('id')->on('member')->onDelete('no action')->onUpdate('no action');
            $table->unsignedInteger('account_id');
            $table->index('account_id');
            $table->foreign('account_id')->references('id')->on('accounts')->onDelete('no action')->onUpdate('no action');
            $table->unsignedInteger('quantity');
            $table->date('date');
            $table->double('income');
            $table->rememberToken();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sell');
    }
}
