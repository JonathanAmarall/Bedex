<?php

use App\Simulator;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SimulatorDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('simulators')->insert([
            'interestRate' => 0.15,
            'collectionFee' => 69.00,
            'registrationFee' => 50.00,
            'consultationFee' => 20.00,

            'inputRangeLoanVal' => 1000.00,
            'inputRangeLoanStep' => 150,
            'inputRangeLoanMax' => 5000,
            'inputRangeLoanMin' => 500,

            'inputRangeTimesVal' => 1,
            'inputRangeTimesStep' => 1,
            'inputRangeTimesMax' => 12,
            'inputRangeTimesMin' => 1,
        ]);
    }
}
