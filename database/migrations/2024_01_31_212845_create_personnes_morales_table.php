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
        Schema::create('personnes_morales', function (Blueprint $table) {
            $table->id();
            $table->string('denomination');
            $table->string('forme_sociale');
            $table->string('siege_social');
            $table->string('num_rccm');
            $table->string('num_ifu');
            $table->string('nom_representant');
            $table->string('prenom_representant');
            $table->string('add_representant');
            $table->string('dom_representant');
            $table->string('home_representant');
            $table->string('nationalite');
            $table->string('piece_presentee');
            $table->string('tel_fixe');
            $table->string('tel_portable');
            $table->string('email');
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
        Schema::dropIfExists('personnes_morales');
    }
};
