<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('factures', function (Blueprint $table) {
            $table->bigIncrements('N_facture');
            $table->string('N_client');
            $table->string('adress');
            $table->string('p_num');
            $table->string('source_facture');
            $table->float('net_payer');
            $table->float('avance');
            $table->float('avance2');
            $table->float('avance3');
            $table->float('remise');
            $table->boolean('tva');
            $table->string('type_caution');
            $table->text('remarque');
            $table->date('date_debut');
            $table->date('date_fin');
            $table->boolean('status_a');
            $table->boolean('status_d');
            $table->boolean('status_r');
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
        Schema::dropIfExists('factures');
    }
}
