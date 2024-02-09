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
        Schema::create('client_physique_operations', function (Blueprint $table) {
            $table->id();
            $table->string('nature');
            $table->string('moyen');
            $table->decimal('montant', 10, 2);
            $table->date('date_operation');
            $table->unsignedBigInteger('personne_physique_id');
            $table->timestamps();

            $table->foreign('personne_physique_id')->references('id')->on('personnes_physiques')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('client_physique_operations');
    }
};
