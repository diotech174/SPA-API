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
        Schema::create('produtos_de_campanhas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->unsignedBigInteger('produto_id');
            $table->foreign('produto_id')->references('id')->on('produtos');
            $table->unsignedBigInteger('campanha_id');
            $table->foreign('campanha_id')->references('id')->on('campanhas');
            $table->char('status', 1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produtos_campanha');
    }
};
