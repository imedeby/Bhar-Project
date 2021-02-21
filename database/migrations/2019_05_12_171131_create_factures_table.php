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
            $table->float('avance2')->default(0);
            $table->float('avance3')->default(0);
            $table->float('remise')->default(0);
            $table->boolean('tva');
            $table->string('type_caution');
            $table->text('remarque')->default("");
            $table->date('date_debut');
            $table->date('date_fin');
            $table->boolean('status_a')->default(0);
            $table->boolean('status_d')->default(0);
            $table->boolean('status_r')->default(0);
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
