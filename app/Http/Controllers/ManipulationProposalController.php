<?php

namespace App\Http\Controllers;

use App\Proposal;
use App\User;
use Illuminate\Http\Request;
use App\Notifications\NotificationProposals;

class ManipulationProposalController extends Controller
{
    public function alterProposal(Request $request, $id)
    {
        $proposta = Proposal::find($id);
        
        switch ($request->status) {
            case ("Aprovado"):
                User::find($proposta->user_id)->notify(new NotificationProposals($proposta));
                return view('proposals.form.edit', compact('proposta'));
            break;
            case ("Reprovado"):
                $proposta->status = "Reprovado";
                $proposta->save();
                User::find($proposta->user_id)->notify(new NotificationProposals($proposta));
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
