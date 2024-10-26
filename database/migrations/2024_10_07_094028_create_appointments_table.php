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
        Schema::create('appointments', function (Blueprint $table) {
            $table->string('appointmentID',4)->primary();
            $table->string('patientID', 4);
            $table->string('doctorID', 4);
            $table->string('serviceID', 4);
            $table->foreign('patientID')->references('patientID')->on('patients');
            $table->foreign('doctorID')->references('doctorID')->on('doctors');
            $table->foreign('serviceID')->references('serviceID')->on('services');
            $table->date('appointmentDate');
            $table->time('appointmentTime');
            $table->text('reason');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
