<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('property_id');
            $table->foreign('property_id')
                ->references('id')
                ->on('properties')
                ->onDelete('no action');
            $table->unsignedBigInteger('offer_status_id');
            $table->foreign('offer_status_id')
                ->references('id')
                ->on('offer_statuses')
                ->onDelete('no action');
            $table->string('title',100);
            $table->date('start_date');
            $table->date('end_date');
            $table->double('price', 12, 2);
            $table->string('comment', 255)->nullable();
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
        Schema::dropIfExists('offers');
    }
}
