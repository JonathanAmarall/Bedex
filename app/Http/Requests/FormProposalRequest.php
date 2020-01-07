<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormProposalRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'company_type'            => 'required|min:7|max:14',
            'company_name'            => 'required|min:2| max:100',
            'company_replyemail'      => 'required|email',

            'customer_name'           => 'required|min:2|max:100',
            'customer_cpf'            => 'required|max:17',
            'customer_monthly_salary' => 'required',

            'guarantor_name'          => 'required|min:2|max:100',
            'guarantor_cpf'           => 'required',
            'guarantor_monthly_salary'=> 'required',
        ];
    }
}
