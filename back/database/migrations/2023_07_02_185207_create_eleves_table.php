<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('eleves', function (Blueprint $table) {
            $table->id();
            $table->integer("numero")->nullable();
            $table->string("prenom");
            $table->string("nom");
            $table->date("date_naiss")->nullable();
            $table->date("lieu_naiss")->nullable();
            $table->enum("type",["interne","externe"]);
            $table->boolean("sexe");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('eleves');
    }
};
