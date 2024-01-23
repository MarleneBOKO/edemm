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
        Schema::create('personnes_physiques', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('date_lieu');
            $table->string('nation');
            $table->string('adres_pro');
            $table->string('adres_ref');
            $table->string('tel');
            $table->string('np');
            $table->string('ident');
            $table->string('prenom');
            $table->string('sit_mat');
            $table->string('profession');
            $table->string('adres_dom');
            $table->string('tel_fixe');
            $table->string('piece_presente');
            $table->string('date_lieu_piece');
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
        Schema::dropIfExists('personnes_physiques');
    }
};
