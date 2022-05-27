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
        Schema::create('parcel_details', function (Blueprint $table) {
            $table->id();
            $table->timestamp('time');
            $table->string('location');
            $table->text('message')->nullable();
            $table->foreignId('parcel_id');
            $table->string('recipient_name');
            $table->text('signature');
            $table->foreign('parcel_id')->references('id')->on('parcels')->onDelete('cascade');
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
        Schema::dropIfExists('parcel_details');
    }
};
