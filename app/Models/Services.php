<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    protected $primaryKey = 'serviceID';
    protected $keyType = 'string'; 
    public $timestamps = false;

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($service) {
            // Retrieve the last service record based on the custom serviceID format
            $lastService = Services::orderBy('serviceID', 'desc')->first();

            if (!$lastService) {
                // If no services exist, start with S001
                $service->serviceID = 'S001';
            } else {
                // Extract the numeric part of the last serviceID and increment it
                $lastIdNumber = (int) str_replace('S', '', $lastService->serviceID);
                $newIdNumber = $lastIdNumber + 1;

                // Format the new ID with leading zeros
                $service->serviceID = 'S' . str_pad($newIdNumber, 3, '0', STR_PAD_LEFT);
            }
        });
    }
}