<?php

namespace App\Http\Controllers;

use App\Proposal;
use Illuminate\Http\Request;

class ManipulationProposalController extends Controller
{
    public function alterProposal(Request $request, $id)
    {
        $proposta = Proposal::find($id);
        switch ($request->status) {
            case ("Aprovado"):
                return view('proposals.form.edit', compact('proposta'));
                break;
            case ("Reprovado"):
                $proposta->status = "Reprovado";
                $proposta->save();
                return redirect()->back();
                break;
            case ("Pré-analise"):
                $proposta->status = "Pré-analise";
                $proposta->save();
                return redirect()->back();
                break;
            case ("Em análise"):
                $proposta->status = "Em análise";
                $proposta->save();
                return redirect()->back();
                break;
            case ("Pré-aprovado"):
                $proposta->status = "Pré-aprovado";
                $proposta->save();
                return redirect()->back();
                break;
            default:
                return redirect()->back();
                break;
        }
    }
}
