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
        Schema::create('client_morale_operations', function (Blueprint $table) {
            $table->id();
            $table->string('nature');
            $table->string('moyen');
            $table->decimal('montant', 10, 2);
            $table->date('date_operation');
            $table->unsignedBigInteger('personne_physique_id');
            $table->timestamps();

            $table->foreign('personne_morale_id')->references('id')->on('personnes_morales')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('client_morale_operations');
    }
};
