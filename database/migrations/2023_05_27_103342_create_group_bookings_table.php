<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGroupBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('group_bookings', function (Blueprint $table) {
           $table->id();
            $table->unsignedBigInteger('customer_id')->references('id')->on('customers')->onDelete('cascade');
            $table->unsignedBigInteger('company_id')->foreign('company_id')->references('id')->on('company')->onDelete('cascade');
            $table->unsignedBigInteger('flight_id')->references('id')->on('flights')->onDelete('cascade');
            $table->string('group_name')->nullable();
            $table->string('trip_type')->nullable();
            $table->string('departure_date')->nullable();
            $table->string('return_date')->nullable();      
            $table->text('message')->nullable();      
            $table->integer('group_size');            
            $table->text('emails')->nullable(); 
            $table->string('booking_number')->unique();
             $table->enum('status', ['pending', 'confirmed','Approved', 'canceled'])->default('pending');
              $table->decimal('total_price', 10, 2);           
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
        Schema::dropIfExists('group_bookings');
    }
}
