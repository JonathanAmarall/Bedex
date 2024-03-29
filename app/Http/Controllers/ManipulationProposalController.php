<?php

namespace App\Http\Controllers;

use App\Proposal;
use App\User;
use Illuminate\Http\Request;
use App\Notifications\NotificationProposals;
use Exception;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Support\Facades\Storage;

class ManipulationProposalController extends Controller
{
    public function alterProposal(Request $request, $id)
    {
        $proposta = Proposal::find($id);

        switch ($request->status) {
            case ("Aprovado"):
                $proposta->status = "Aprovado";
                $proposta->avaliable = true;
                $proposta->save();
                User::find($proposta->user_id)->notify(new NotificationProposals($proposta));
                return redirect()->back();
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
                User::find($proposta->user_id)->notify(new NotificationProposals($proposta));
                return redirect()->back();
                break;
            case ("Em análise"):
                $proposta->status = "Em análise";
                $proposta->save();
                User::find($proposta->user_id)->notify(new NotificationProposals($proposta));
                return redirect()->back();
                break;
            case ("Pré-aprovado"):
                $proposta->status = "Pré-aprovado";
                $proposta->save();
                User::find($proposta->user_id)->notify(new NotificationProposals($proposta));
                return redirect()->back();
                break;
            default:
                return redirect()->back();
                break;
        }
    }

    public function downloadDocument($id)
    {
        $document = Proposal::find($id);
        try {
            return Storage::download($document->documents);
        } catch (Exception $e) {
            return redirect()
                ->back()
                ->with('error', "Não possui há documentos para serem baixados.");
        }
    }
}
