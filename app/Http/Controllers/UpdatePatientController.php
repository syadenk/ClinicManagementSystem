<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Patient;

class UpdatePatientController extends Controller
{
    public function retrieve(Request $request, $patientID){
        $staffID=$request->session()->get('staffID');
        $staff = Admin::where('staffID', $staffID)->first();
        $patient= Patient::find($patientID);
        return view('updatepatient', compact('patient','staff'));
    }

    public function update(Request $request, $patientID){
        $patient = Patient::where('patientID', $patientID)->first();
        $password= $request->password;
        $bloodPressure= $request->bloodPressure;
        $phoneNumber= $request->phoneNumber;
        $patientName=$request->name;
        $patientEmail=$request->email;
        $patientIC=$request->ic;

        if($phoneNumber==""){
            return redirect()->route('updatepatients', ['patientID' => $patient->patientID])->with('noPhoneNumber', 'Phone Number is required.');
        }

        if($patientName==""){
            return redirect()->route('updatepatients', ['patientID' => $patient->patientID])->with('noName', 'Name is required.');
        }

        if($patientEmail==""){
            return redirect()->route('updatepatients', ['patientID' => $patient->patientID])->with('noEmail', 'Email is required.');
        }

        if($patientIC==""){
            return redirect()->route('updatepatients', ['patientID' => $patient->patientID])->with('noIC', 'Identification Card number is required.');
        }

        if($password==""){//have 
            return redirect()->route('updatepatients', ['patientID' => $patient->patientID])->with('passwordRequired', 'Password is required.');
        }

        $patient->patientID=$patientID;
        $patient->patientEmail=$request->email;
        $patient->patientName=$request->name;
        $patient->phoneNumber=$phoneNumber;
        $patient->bloodPressure=$bloodPressure;
        $patient->patientIC=$patientIC;
        $patient->save();
        return redirect()->route('updatepatients', ['patientID' => $patient->patientID])->with('success', 'Profile updated successfully.');
    }
    public function delete($patientID){
        $patient = Patient::where('patientID', $patientID)->first();
        $patient->delete();
        return redirect()->route('adminhome')->with('success', 'Patient Information deleted successfully.');
    }
}
