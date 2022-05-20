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
        Schema::create('parcels_details', function (Blueprint $table) {
            $table->id();
            $table->timestamp('time');
            $table->varchar('location');
            $table->text('message');
            $table->integer('parcel_id');
            $table->foreign('parcel_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('parcels_details');
    }
};
