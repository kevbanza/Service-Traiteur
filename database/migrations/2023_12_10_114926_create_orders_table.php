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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->decimal('price');
            $table->dateTime('delivery_date')->nullable();
            $table->foreignId('person_id')->references('id')->on('users')->nullable();
            $table->string('name');
            $table->string('email')->nullable();
            $table->string('phone');
            $table->boolean('delivery_status')->default(0);
            $table->text('address');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
