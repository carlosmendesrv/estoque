<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('request_id')->nullable();
            $table->string('code');
            $table->string('description');
            $table->string('box_qtd');
            $table->string('box_suggestion');
            $table->string('invetory_qtd');
            $table->string('status_product');
            $table->string('status_request');

            $table->foreign('request_id')
                ->references('id')
                ->on('requests')
                ->ondDelete('cascade');
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
        Schema::dropIfExists('items');
    }
}
