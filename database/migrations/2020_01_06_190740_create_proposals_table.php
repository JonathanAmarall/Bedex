<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProposalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proposals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('status')->default('Em análise');
            $table->unsignedBigInteger('user_id');

            $table->string('company_type');
            $table->string('company_name');
            $table->string('company_replyemail');
            $table->string('company_city');
            
            //data customer
            $table->string('customer_name');
            $table->string('customer_cpf');
            $table->string('customer_monthly_salary');
            $table->string('customer_rg')->nullable();
            $table->string('customer_uf')->nullable();
            $table->date('customer_date_birth')->nullable();
            $table->string('customer_name_mother')->nullable();
            $table->string('customer_martial_status')->nullable();

            // customer address
            $table->string('customer_streed_number')->nullable();
            $table->string('customer_city')->nullable();
            $table->string('customer_postal_code')->nullable();
            $table->string('customer_district')->nullable();
            $table->string('customer_residence')->nullable();
            $table->string('customer_time_residence')->nullable();
            $table->string('customer_phone')->nullable();

            $table->string('customer_company_work')->nullable();
            $table->string('customer_phone_commercial')->nullable();
            $table->string('customer_job_role')->nullable();
            $table->string('customer_email')->nullable();
            $table->string('customer_other_lace')->nullable();
            $table->string('customer_remuneration')->nullable();

            // Guarantor data
            $table->string('guarantor_name');
            $table->string('guarantor_cpf');
            $table->string('guarantor_rg')->nullable();
            $table->string('guarantor_monthly_salary');

            $table->string('guarantor_uf')->nullable();
            $table->date('guarantor_date_birth')->nullable();
            $table->string('guarantor_phone')->nullable();
            $table->string('guarantor_address')->nullable();

            // Guarantor company
            $table->string('guarantor_company_work')->nullable();
            $table->string('guarantor_city_company')->nullable();
            $table->string('guarantor_phone_commercial')->nullable();
            $table->date('guarantor_admission_date')->nullable();
            $table->string('guarantor_job_role')->nullable();
            $table->string('guarantor_other_lace')->nullable();
            $table->string('guarantor_remuneration')->nullable();

            // trading form
            $table->decimal('value');
            $table->integer('number_installments')->nullable();
            $table->integer('date_first_installments')->nullable();

            // personal references 1
            $table->string('personal_reference_name')->nullable();
            $table->string('personal_reference_phone')->nullable();
            // personal references 2
            $table->string('personal_reference2_name')->nullable();
            $table->string('personal_reference2_phone')->nullable();

            //commercial references
            $table->string('commercial_reference_name')->nullable();
            $table->string('commercial_reference_phone')->nullable();
            //commercial references 2
            $table->string('commercial_reference2_name')->nullable();
            $table->string('commercial_reference2_phone')->nullable();

            // bank reference
            $table->string('bank_holer')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('bank_number')->nullable();
            $table->string('bank_agency')->nullable();
            $table->date('bank_opening_date')->nullable();
            // reason for request
            $table->string('reason')->nullable();
            // Pessoa Física:
            $table->string('documents')->nullable();


            $table->foreign('user_id')
                ->references('id')->on('users');
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
        Schema::dropIfExists('proposals');
    }
}
