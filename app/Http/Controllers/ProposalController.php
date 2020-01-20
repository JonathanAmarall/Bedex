<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormProposalRequest;
use App\ObsProposal;
use App\Proposal;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProposalController extends Controller
{
    protected $_proposal;

    public function __construct(Proposal $proposal, User $user)
    {
        $this->_proposal = $proposal;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->hasRole('admin')) {
            $propostas = Proposal::all();
            return view('proposals.form.index', compact('propostas'));
        } else {
            $propostas = $this->_proposal->verifyProposalFromUser(Auth()->User()->id);
            return view('proposals.form.index', compact('propostas'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('proposals.form.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FormProposalRequest $request)
    {
        $data = $request->all();
        if ($request->hasFile('documents') && $request->file('documents')->isValid()) {
            $upload = $request->documents->store('documents');
            $data['documents'] = $upload;
            if (!$upload) {
                return redirect()
                    ->back()
                    ->with('error', 'Falha ao enviar documento.');
            }
        }
        if ($this->_proposal->create($data)) {
            $this->_proposal->sendNotificationForAdmins();
            return redirect()->route('formulario.index');
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $proposta = Proposal::find($id);
        $obs = ObsProposal::where('proposal_id', $id)->get();
        // dd($obs);
        return view('proposals.form.show', compact('proposta', 'obs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $proposta = Proposal::find($id);
        return view('proposals.form.edit', compact('proposta'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $proposta = $this->_proposal->find($id);
        $data = $request->all();
        if ($request->hasFile('documents') && $request->file('documents')->isValid()) {
            $upload = $request->documents->store('documents');
            $data['documents'] = $upload;
            if (!$upload) {
                return redirect()
                    ->back()
                    ->with('error', 'Falha ao enviar documento.');
            }
        }
        if ($proposta->update($data)) {
            $this->_proposal->sendNotificationForAdmins();
            return redirect("/formulario/$id");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $proposal = Proposal::findOrfail($id);
        Storage::delete($proposal->documents);
        if ($proposal->delete()) {
            return redirect()->route("formulario.index");
        } else {
            return redirect()->back();
        }
    }
}
