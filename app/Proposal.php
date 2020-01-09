<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Proposal extends Model
{

    public function verifyProposalFromUser($id)
    {
        return Proposal::where('user_id', $id)->get();
    }

    // protected $fillable = [
    //     //company
    //     'company_type', 'company_name', 'company_replyemail', 'company_city',
    //     //customer
    //     'customer_name', 'customer_cpf', 'customer_monthly_salary', 'customer_rg',
    //     'customer_uf', 'customer_date_birth', 'customer_name_mother', 'customer_martial_status',
    //     'customer_streed_number', 'customer_city', 'customer_postal_code', 'customer_district',
    //     'customer_residence', 'customer_time_residence', 'customer_phone', 'customer_company_work',
    //     'customer_phone_commercial', 'customer_job_role',
    //     'customer_email', 'customer_other_lace', 'customer_remuneration',

    // ];
}
