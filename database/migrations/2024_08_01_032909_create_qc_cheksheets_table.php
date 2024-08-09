<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('qc_cheksheet', function (Blueprint $table) {
            $table->id();
            $table->integer('no_ladle');
            $table->string('product_name');
            $table->string('material');
            $table->integer('temp_taping');
            $table->dateTime('start_time_tapping');
            $table->integer('reaction_time');
            $table->dateTime('time_start_pouring');
            $table->integer('temp_start_pouring');
            $table->dateTime('n1_tpm');
            $table->dateTime('n2_tpm');
            $table->dateTime('n3_tpm');
            $table->double('act_C');
            $table->double('act_Si');
            $table->double('act_Mn');
            $table->double('act_Cr');
            $table->double('act_Cu');
            $table->double('act_Mg');
            $table->double('act_S');
            $table->double('act_Sn');
            $table->double('act_Ni');
            $table->dateTime('time_finish_pouring');
            $table->integer('temp_finish_pouring');
            $table->integer('pcs_mold');
            $table->integer('fading_time');
            $table->integer('short_pour');
            $table->integer('mold_bocor');
            $table->string('op_pouring');
            $table->string('marubo');
            $table->string('frm');
            $table->string('remark');
            //$table->dateTime('time_finish_pouring');
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
        Schema::dropIfExists('qc_cheksheet');
    }
};
