<?php

namespace App\Http\Controllers;
use App\Models\Doctor;
use Illuminate\Http\Request;

class DoctorHomeController extends Controller
{
    public function retrieve(Request $request){
        $doctorID=$request->session()->get('doctorID');
        $doctor = Doctor::where('doctorID', $doctorID)->first();
        return view('doctorhome', compact('doctor'));
    }

    public function logout(Request $request){
        $request->session()->forget('doctorID');
        return redirect()->route('login');
    }
}
