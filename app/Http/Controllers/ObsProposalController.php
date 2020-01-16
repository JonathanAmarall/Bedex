<?php

namespace App\Http\Controllers;

use App\ObsProposal;
use Illuminate\Http\Request;

class ObsProposalController extends Controller
{
    protected $obs;
    public function __construct(ObsProposal $obs)
    {
        $this->obs = $obs;
    }

    public function store(Request $request)
    {
        $this->obs->create($request->all());
        return redirect("/formulario/$request->proposal_id");
    }

    public function destroy($proposta, $id)
    {
        $obs = ObsProposal::find($id);
        $obs->delete();
        return redirect()->back();
    }
}
