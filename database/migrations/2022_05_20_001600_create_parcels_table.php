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
        Schema::create('parcels', function (Blueprint $table) {
            $table->id();
            $table->string('tracking_number');
            $table->double('weight');
            $table->foreignId('sender_id');
            $table->string('sender_address');
            $table->string('sender_postcode');
            $table->string('recipient_firstname');
            $table->string('recipient_lastname');
            $table->string('recipeint_address');
            $table->string('recipient_postcode');
            $table->string('recipient_phone');
            $table->foreignId('courier_id')->nullable();
            $table->integer('status');
            $table->timestamp('arrived_time')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('sender_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('courier_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('parcels');
    }
};
