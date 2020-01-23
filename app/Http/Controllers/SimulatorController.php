<?php

namespace App\Http\Controllers;

use App\Simulator;
use Illuminate\Http\Request;

class SimulatorController extends Controller
{
    protected $simulator;

    public function __construct(Simulator $simulator)
    {
        $this->simulator = $simulator;
    }
    public function index()
    {
        return view('simulator.index');
    }

    public function ShowAndEditConfiguration()
    {
        $config = Simulator::find(1);
        return view('simulator.show-and-edit', compact('config'));
    }

    public function update(Request $request)
    {
        $config = Simulator::find(1);
        $config->update($request->all());
        return redirect()
            ->back()
            ->with('success', 'Dados atualizados com sucesso.');
    }

    public function getValueRangeLoan()
    {
        return Simulator::select('inputRangeLoanVal', 'inputRangeLoanStep', 'inputRangeLoanMax', 'inputRangeLoanMin')->first();
    }

    public function getValueRangeTimes()
    {
        return Simulator::select('inputRangeTimesVal', 'inputRangeTimesStep', 'inputRangeTimesMax', 'inputRangeTimesMin')->first();
    }
}
