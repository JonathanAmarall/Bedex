<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use function Psy\debug;

class CreateFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forms', function (Blueprint $table) {
            $table->bigIncrements('id');
            //data store company
            $table->string('company_type');
            $table->string('company_city');
            $table->string('company_replyemail');
            $table->string('company_name');
            
            //data customer
            $table->string('customer_name');
            $table->string('customer_cpf');
            $table->string('customer_rg');
            $table->string('customer_uf');
            $table->string('customer_date_birth');
            $table->string('customer_name_mother');
            $table->string('customer_martial_status');

            // customer address
            $table->string('customer_streed_number');
            $table->string('customer_city');
            $table->string('customer_postal_code');
            $table->string('customer_district');
            $table->string('customer_residence');
            $table->string('customer_time_residence');
            $table->string('customer_phone');

            $table->string('customer_company_work');
            $table->string('customer_phone_commercial');
            $table->string('customer_job_role');
            $table->string('customer_email');
            $table->string('customer_monthly_salary');
            $table->string('customer_other_lace')->nullable();
            $table->string('customer_remuneration')->nullable();

            // Guarantor data
            $table->string('guarantor_name');
            $table->string('guarantor_cpf');
            $table->string('guarantor_rg');
            $table->string('guarantor_uf');
            $table->string('guarantor_date_birth');
            $table->string('guarantor_phone');
            $table->string('guarantor_address');

            // Guarantor company
            $table->string('guarantor_company_work');
            $table->string('guarantor_city_company');
            $table->string('guarantor_phone_commercial');
            $table->string('guarantor_admission_date');
            $table->string('guarantor_job_role');
            $table->string('guarantor_monthly_salary');
            $table->string('guarantor_other_lace')->nullable();
            $table->string('guarantor_remuneration')->nullable();

            // trading form
            $table->decimal('value');
            $table->integer('number_installments');
            $table->integer('date_first_installments');

            // personal references 1
            $table->string('personal_reference_name');
            $table->string('personal_reference_phone');
            // personal references 2
            $table->string('personal_reference2_name')->nullable();
            $table->string('personal_reference2_phone')->nullable();

            //commercial references
            $table->string('commercial_reference_name');
            $table->string('commercial_reference_phone');
            //commercial references 2
            $table->string('commercial_reference2_name')->nullable();
            $table->string('commercial_reference2_phone')->nullable();

            // bank reference
            $table->string('bank_holer');
            $table->string('bank_name');
            $table->string('bank_number');
            $table->string('bank_agency');
            $table->string('bank_opening_date')->nullable();

            // reason for request
            $table->string('reason');

            // Pessoa Física:
            $table->string('documents');
            // * CPF de todos os Envolvidos(Xerox);
            // * RG de todos os Envolvidos(Xerox);
            // * Comprovante de Renda do Contratante e cônjuge;
            // * Comprovante de Residência do Contratante(Conta de luz ou Conta de água com máximo de 60 dias);


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('forms');
    }
}
