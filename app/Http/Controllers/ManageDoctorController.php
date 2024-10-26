<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Doctor;
class ManageDoctorController extends Controller
{
    public function retrieve(Request $request){
        $staffID=$request->session()->get('staffID');
        $staff = Admin::where('staffID', $staffID)->first();
        $doctor= Doctor::all();
        return view('managedoctor', compact('doctor','staff'));
    }

    
}
