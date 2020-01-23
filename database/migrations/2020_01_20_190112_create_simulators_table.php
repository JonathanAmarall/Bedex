<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSimulatorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('simulators', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->decimal('interestRate'); // taxa de juros %
            
            $table->decimal('collectionFee'); // taxa de cobrança
            $table->decimal('registrationFee'); // taxa de cadastro
            $table->decimal('consultationFee'); // taxa de consulta

            $table->decimal('inputRangeLoanVal', 10,2);
            $table->integer('inputRangeLoanStep');
            $table->integer('inputRangeLoanMax');
            $table->integer('inputRangeLoanMin');

            $table->integer('inputRangeTimesVal');
            $table->integer('inputRangeTimesStep');
            $table->integer('inputRangeTimesMax');
            $table->integer('inputRangeTimesMin');

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
        Schema::dropIfExists('simulators');
    }
}
