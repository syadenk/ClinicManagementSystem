<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $primaryKey = 'patientID';
    protected $keyType = 'string'; 
    public $timestamps = false;
    protected static function boot()
{
    
    parent::boot();

    static::creating(function ($patient) {
        // Retrieve the last patient record based on the custom patientID format
        $lastPatient = Patient::orderBy('patientID', 'desc')->first();

        if (!$lastPatient) {
            // If no patients exist, start with P-001
            $patient->patientID = 'P001';
        } else {
            // Extract the numeric part of the last patientID and increment it
            $lastIdNumber = (int) str_replace('P', '', $lastPatient->patientID);
            $newIdNumber = $lastIdNumber + 1;

            // Format the new ID with leading zeros
            $patient->patientID = 'P' . str_pad($newIdNumber, 3, '0', STR_PAD_LEFT);
        }
    });
}
}
