<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVenta extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('venta', function (Blueprint $table) {
            $table->id();
            $table->decimal('total',13,2)->default(0);
            $table->integer('status')->default(1);
            $table->unsignedBigInteger('user_id')->default(0);
            $table->timestamps();
        });

        Schema::create('detalle_venta', function (Blueprint $table) {
            $table->id();
            $table->decimal('precio',13,2)->default(0);
            $table->integer('cantidad')->default(0);
            $table->unsignedBigInteger('juegos_id')->default(0);
            $table->unsignedBigInteger('venta_id')->default(0);
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
        Schema::dropIfExists('detalle_venta');
        Schema::dropIfExists('venta');

    }
}
