<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateObsProposalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('obs_proposals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('obs');
            $table->unsignedBigInteger('proposal_id');
            $table->foreign('proposal_id')
            ->references('id')
            ->on('proposals');
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
        Schema::dropIfExists('obs_proposals');
    }
}
