<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\Services;

class ServiceController extends Controller
{
    public function retrieve(Request $request){
        $patientID=$request->session()->get('patientID');
        $patientInfo = Patient::where('patientID', $patientID)->first();
        $services= Services::all();
        return view('service', compact('patientInfo','services'));

    }
}
