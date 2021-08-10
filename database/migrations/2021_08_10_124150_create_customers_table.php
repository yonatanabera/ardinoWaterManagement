<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('name'); 
            $table->string('deviceNumber');
            $table->float('deposite')->default(0.0);
            $table->float('remainingAmount')->default(0.0); 
            $table->float('usedAmount')->default(0.0); 
            $table->float('currentConsumption')->default(0.0); 
            $table->float('totalConsumption')->default(0.0);
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
        Schema::dropIfExists('customers');
    }
}
