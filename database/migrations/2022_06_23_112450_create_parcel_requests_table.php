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
        Schema::create('parcel_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('parcel_id');
            $table->foreignId('courier_id');
            $table->integer('status');
            $table->text('reason')->nullable();
            $table->timestamps();
            $table->foreign('parcel_id')->references('id')->on('parcels')->onDelete('cascade');
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
        Schema::dropIfExists('parcel_requests');
    }
};
