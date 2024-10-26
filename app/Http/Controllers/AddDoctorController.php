<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Doctor;
class AddDoctorController extends Controller
{
    public function retrieve(Request $request){
        $staffID=$request->session()->get('staffID');
        $staff = Admin::where('staffID', $staffID)->first();

        $lastDoctor = Doctor::orderBy('doctorID', 'desc')->first();
        if (!$lastDoctor) {
            // If no previous record exists, start with P-001
            $doctorID = 'D001';
            return view('adddoctor', compact('doctorID','staff'));
        } else {
            // Extract numeric part and increment
            $lastIdNumber = (int) str_replace('D', '', $lastDoctor->doctorID);
            $newIdNumber = $lastIdNumber + 1;
            // Format with leading zeros (e.g., P-001)
            $doctorID = 'D' . str_pad($newIdNumber, 3, '0', STR_PAD_LEFT);
            return view('adddoctor', compact('doctorID','staff'));
        }
        
    }

    public function add(Request $request){
        $staffID=$request->session()->get('staffID');
        $staff = Admin::where('staffID', $staffID)->first();
        $doctorID=$request->doctorID;
        $doctorName=$request->doctorName;
        $doctorPassword=$request->doctorPassword;
        $specialties=$request->specialties;

        if($doctorName==""){
            return redirect()->route('adddoctor')->with('noDocName', 'Doctor name is required.');
        }

        if($doctorPassword==""){
            return redirect()->route('adddoctor')->with('noPassword', 'Doctor password is required.');
        }

        if($specialties==""){
            return redirect()->route('adddoctor')->with('noSpecialties', 'Specialties is required.');
        }

        $doctor= new Doctor();
        $doctor->doctorID=$doctorID;
        $doctor->doctorName=$doctorName;
        $doctor->doctorPassword=$doctorPassword;
        $doctor->specialties=$specialties;
        $doctor->save();
        return redirect()->route('managedoctor')->with('success', 'New doctor is added successfully.');
    }
}
