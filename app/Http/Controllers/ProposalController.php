<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormProposalRequest;
use App\Proposal;
use Illuminate\Http\Request;

class ProposalController extends Controller
{

    protected $_proposal;

    public function __construct(Proposal $proposal)
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
        $propostas = $this->_proposal->all();
        return view('proposals.form.index', compact('propostas'));

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
        $form = new Proposal;
        $form->user_id = auth()->user()->id;
        $form->company_type = $request->company_type;
        $form->company_name = $request->company_name;
        $form->company_replyemail = $request->company_replyemail;
        $form->company_city = $request->company_city;
        $form->customer_name = $request->customer_name;
        $form->customer_cpf = $request->customer_cpf;
        $form->customer_monthly_salary = $request->customer_monthly_salary;
        $form->value = $request->value;

        $form->guarantor_name = $request->guarantor_name;
        $form->guarantor_cpf = $request->guarantor_cpf;
        $form->guarantor_rg = $request->guarantor_rg;
        $form->guarantor_monthly_salary = $request->guarantor_monthly_salary;
        if ($form->save()) {

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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
