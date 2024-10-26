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
        Schema::create('patients', function (Blueprint $table) {
            $table->string('patientID',4)->primary()->unique();
            $table->text('patientEmail');
            $table->text('patientIC');
            $table->text('patientPassword');
            $table->integer('bloodPressure')-> nullable();
            $table->text('patientName');
            $table->string('phoneNumber', 11);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
