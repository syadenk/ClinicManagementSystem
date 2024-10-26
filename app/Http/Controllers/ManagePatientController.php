<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Patient;
class ManagePatientController extends Controller
{
    public function retrieve(Request $request){
        $staffID=$request->session()->get('staffID');
        $staff = Admin::where('staffID', $staffID)->first();
        $patient= Patient::all();
        return view('managepatients', compact('patient','staff'));
    }

    public function addpatient(Request $request){
        $staffID=$request->session()->get('staffID');
        $staff = Admin::where('staffID', $staffID)->first();
        return view('addpatient', compact('staff'));
    }

    public function addForm(Request $request){
        $password= $request->password;
        $bloodPressure= $request->bloodPressure;
        $phoneNumber= $request->phoneNumber;
        $patientPassword=$request->password;
        $patientName=$request->name;
        $patientEmail=$request->email;
        $patientIC=$request->ic;

        $lastPatient = Patient::orderBy('patientID', 'desc')->first();
        if (!$lastPatient) {
            // If no previous record exists, start with P-001
            $patientID = 'P001';
        } else {
            // Extract numeric part and increment
            $lastIdNumber = (int) str_replace('P', '', $lastPatient->patientID);
            $newIdNumber = $lastIdNumber + 1;
            // Format with leading zeros (e.g., P-001)
            $patientID = 'P' . str_pad($newIdNumber, 3, '0', STR_PAD_LEFT);
        }

        if($phoneNumber==""){
            return redirect()->route('addpatient')->with('noPhoneNumber', 'Phone Number is required.');
        }

        if($patientName==""){
            return redirect()->route('addpatient')->with('noName', 'Name is required.');
        }

        if($patientEmail==""){
            return redirect()->route('addpatient')->with('noEmail', 'Email is required.');
        }

        if($patientIC==""){
            return redirect()->route('addpatient')->with('noIC', 'Identification Card number is required.');
        }

        if($patientPassword==""){//have 
            return redirect()->route('addpatient')->with('passwordRequired', 'Password is required.');
        }
        $patient= new Patient();
        $patient->patientID=$patientID;
        $patient->patientEmail=$patientEmail;
        $patient->patientName=$patientName;
        $patient->patientPassword=$patientPassword;
        $patient->phoneNumber=$phoneNumber;
        $patient->bloodPressure=$bloodPressure;
        $patient->patientIC=$patientIC;
        $patient->save();

        return redirect()->route('managepatients')->with('success', 'New patient added successfully.');
    }
}
