<?php

namespace App\Http\Controllers;
use App\Models\Doctor;
use App\Models\Schedule;
use Illuminate\Http\Request;

class DoctorScheduleController extends Controller
{
    public function retrieve(Request $request){
        $doctorID=$request->session()->get('doctorID');
        $doctor = Doctor::where('doctorID', $doctorID)->first();
        return view('doctorschedule', compact('doctor'));
    }

    public function retrieveSchedule(Request $request){
        $doctorID=$request->session()->get('doctorID');
        $doctor = Doctor::where('doctorID', $doctorID)->first();
        $schedule = Schedule::where('doctorID', $doctorID)->get();
        return view('doctorviewschedule', compact('doctor','schedule'));
    }

    

}
