<?php

namespace App\Http\Controllers;
use App\Models\Patient;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DoctorAppointmentRecordsController extends Controller
{
    public function retrieve(Request $request){
        $doctorID=$request->session()->get('doctorID');
        $doctor = Doctor::where('doctorID', $doctorID)->first();
        $doctorAppointment = DB::table('appointments')
        ->join('patients', 'appointments.patientID', '=', 'patients.patientID')
        ->join('services', 'appointments.serviceID', '=', 'services.serviceID')
        ->join('doctors', 'appointments.doctorID', '=', 'doctors.doctorID')
        ->select(
            'appointments.*', 
            'patients.patientName', 
            'services.serviceName',
            'doctors.doctorName',
            'doctors.specialties'
        )
        ->where('appointments.doctorID', $doctorID)
        ->get();

        return view('doctorappointmentrecords', compact('doctor','doctorAppointment'));
    }
}
