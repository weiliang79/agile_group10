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
            $table->varchar('tracking_number');
            $table->double('weight');
            $table->integer('sender_id');
            $table->varchar('sender_address');
            $table->varchar('sender_postcode');
            $table->varchar('recipient_firstname');
            $table->varchar('recipient_lastname');
            $table->varchar('recipeint_address');
            $table->varchar('recipient_postcode');
            $table->varchar('recipient_phone');
            $table->integer('courier_id')->nullable();
            $table->integer('status');
            $table->timestamp('created_time');
            $table->timestamp('arrived_time');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('sender_id')->references('id')->on('users')->onDelete('cascade');
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
