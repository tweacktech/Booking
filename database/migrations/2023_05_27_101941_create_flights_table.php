<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFlightsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flights', function (Blueprint $table) {
            $table->id();
            $table->string('flight_number');
            $table->unsignedBigInteger('company_id')->foreign('company_id')->references('id')->on('company')->onDelete('cascade');
            $table->string('origin');
            $table->string('destination');
            $table->string('departure_time')->nullable();
            $table->string('return_date')->nullable();
            $table->decimal('price', 10, 2)->default(0.0);
            $table->BigInteger('status')->default(1);
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
        Schema::dropIfExists('flights');
    }
}
