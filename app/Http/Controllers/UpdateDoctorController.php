<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Doctor;
class UpdateDoctorController extends Controller
{
    public function retrieve(Request $request, $doctorID){
        $staffID=$request->session()->get('staffID');
        $staff = Admin::where('staffID', $staffID)->first();
        $doctor= Doctor::where('doctorID', $doctorID)->first();
        return view('updatedoctor', compact('doctor','staff'));
    }

    public function update(Request $request){
        $doctorID=$request->doctorID;
        $doctor = Doctor::where('doctorID', $doctorID)->first();
        $doctorName= $request->doctorName;
        $doctorPassword= $request->doctorPassword;
        $specialties= $request->specialties;

        if($specialties==""){
            return redirect()->route('updatedoctor', ['doctorID' => $doctor->doctorID])->with('noSpecialties', 'Doctor specialties is required.');
        }

        if($doctorName==""){
            return redirect()->route('updatedoctor', ['doctorID' => $doctor->doctorID])->with('noName', 'Doctor Name is required.');
        }

        if($doctorPassword==""){
            return redirect()->route('updatedoctor', ['doctorID' => $doctor->doctorID])->with('noPassword', 'Doctor Password is required.');
        }

        $doctor->doctorID=$doctorID;
        $doctor->doctorName=$doctorName;
        $doctor->specialties=$specialties;
        $doctor->doctorPassword=$doctorPassword;
        $doctor->save();

        return redirect()->route('managedoctor', ['doctorID' => $doctor->doctorID])->with('success', 'Doctor data updated successfully.');
    }

    public function delete($doctorID){
        $doctor = Doctor::where('doctorID', $doctorID)->first();
        $doctor->delete();
        return redirect()->route('managedoctor')->with('success', 'Service deleted successfully.');
    }

}
