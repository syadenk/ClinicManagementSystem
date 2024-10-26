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
        Schema::create('reports', function (Blueprint $table) {
            $table->string('appointmentID',4);//a001
            $table->foreign('appointmentID')->references('appointmentID')->on('appointments')->onDelete('cascade');
            $table->string('doctorID',4);//d001
            $table->foreign('doctorID')->references('doctorID')->on('doctors')->onDelete('cascade');
            $table->string('serviceID',4);//s001
            $table->foreign('serviceID')->references('serviceID')->on('services')->onDelete('cascade');
            $table -> text('remarks');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
