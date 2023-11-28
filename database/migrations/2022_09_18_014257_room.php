<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Room extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('room', function(Blueprint $table){
           $table->id();
           $table->unsignedBigInteger('room_category_id');
           $table->foreign('room_category_id')->on('room_category')->references('id')->onDelete('cascade')->onUpdate('cascade');
           $table->binary('image');
           $table->text('description');
           $table->decimal('price', $precision=10, $scale=0);
           $table->boolean('include_breakfast')->default(0);
           $table->string('max_guest');
           $table->string('available_room');
           $table->string('total_bed_room');
           $table->string('total_bath_room');
           $table->boolean('king_bed')->default(0);
           $table->boolean('twin_bed')->default(0);
           $table->boolean('ac')->default(0);
           $table->boolean('bathtub')->default(0);
           $table->boolean('refrigator')->default(0);
           $table->boolean('wifi')->default(0);
           $table->boolean('minibar')->default(0);
           $table->boolean('kitchen')->default(0);
           $table->boolean('television')->default(0);
           $table->softDeletes();
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
        Schema::dropIfExist('room');
    }
}
