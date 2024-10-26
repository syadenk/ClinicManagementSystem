<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\Services;
use App\Models\Doctor;
use App\Models\Schedule;
use App\Models\Appointment;
use Illuminate\Support\Facades\DB;

class AppointmentController extends Controller
{
    public function retrieve(Request $request){
        $patientID=$request->session()->get('patientID');
        $patient = Patient::where('patientID', $patientID)->first();
        $patientAppointment = DB::table('appointments')
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
        ->where('appointments.patientID', $patientID)
        ->get();

        return view('appointment', compact('patient','patientAppointment'));
    }

    public function bookAppointment(Request $request){
        $patientID = $request->session()->get('patientID');
        $patient = Patient::where('patientID', $patientID)->first();
        $schedule = Schedule::all();
    
        $doctorID = [];
        foreach ($schedule as $schedules) {
            if (isset($schedules->doctorID)) {
                $doctorID[] = $schedules->doctorID;
            }
        }
    
        $service = Services::all();
        $doctorList = Doctor::whereIn('doctorID', $doctorID)->get();
    
        // Collect available dates, times, and timeEnd for each doctor
        foreach ($doctorList as $doctor) {
            $doctor->availableDates = Schedule::where('doctorID', $doctor->doctorID)
                                               ->pluck('availableDate')
                                               ->toArray();
    
            $doctor->timeEnd = Schedule::where('doctorID', $doctor->doctorID)
                                        ->pluck('timeEnd')
                                        ->first(); // Assuming each doctor has a single timeEnd per day
        }
    
        return view('bookappointment', compact('patient', 'doctorList', 'schedule','service'));
    }

    public function bookForm(Request $request){
        $patientID = $request->session()->get('patientID');
        $doctorID=$request->doctorID;
        $serviceID=$request->serviceID;
        $reason=$request->reason;
        $appointmentDate=$request->appointmentDate;
        $appointmentTime=$request->appointmentTime;

        $lastAppointment = Appointment::orderBy('appointmentID', 'desc')->first();
        if (!$lastAppointment) {
            // If no previous record exists, start with P-001
            $appointmentID = 'C001';
        } else {
            // Extract numeric part and increment
            $lastIdNumber = (int) str_replace('C', '', $lastAppointment->appointmentID);
            $newIdNumber = $lastIdNumber + 1;
            // Format with leading zeros (e.g., P-001)
            $appointmentID = 'C' . str_pad($newIdNumber, 3, '0', STR_PAD_LEFT);
        }
        if($appointmentDate==""){
            return redirect()->route('bookappointment')->with('noAppointmentDate', 'Appointment date is required.');
        }

        if($appointmentTime==""){
            return redirect()->route('bookappointment')->with('noAppointmentTime', 'Appointment time is required.');
        }

        if($reason==""){
            return redirect()->route('bookappointment')->with('noReason', 'Reason for appointment is required.');
        }

        $appointment= new Appointment();
        $appointment->appointmentID=$appointmentID;
        $appointment->patientID=$patientID;
        $appointment->doctorID=$doctorID;
        $appointment->appointmentDate=$appointmentDate;
        $appointment->appointmentTime=$appointmentTime;
        $appointment->reason=$reason;
        $appointment->serviceID=$serviceID;
        $appointment->save();
        return redirect()->route('appointment')->with('success', 'Appointment is booked successfully.');
    }

    public function editAppointment(Request $request, $patientAppointments){
        $patientID=$request->session()->get('patientID');
        $patient = Patient::where('patientID', $patientID)->first();
        $patientAppointment = DB::table('appointments')
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
        ->where('appointments.patientID', $patientID)
        ->get();
        $patientID = $request->session()->get('patientID');
        $patient = Patient::where('patientID', $patientID)->first();
        $schedule = Schedule::all();
    
        $doctorID = [];
        foreach ($schedule as $schedules) {
            if (isset($schedules->doctorID)) {
                $doctorID[] = $schedules->doctorID;
            }
        }
    
        $service = Services::all();
        $doctorList = Doctor::whereIn('doctorID', $doctorID)->get();
    
        // Collect available dates, times, and timeEnd for each doctor
        foreach ($doctorList as $doctor) {
            $doctor->availableDates = Schedule::where('doctorID', $doctor->doctorID)
                                               ->pluck('availableDate')
                                               ->toArray();
    
            $doctor->timeEnd = Schedule::where('doctorID', $doctor->doctorID)
                                        ->pluck('timeEnd')
                                        ->first(); // Assuming each doctor has a single timeEnd per day
        }
    
        return view('editappointment', compact('patient', 'doctorList', 'schedule','service','patientAppointment'));
        

    }

    public function updateForm(Request $request){
        $patientID = $request->session()->get('patientID');
        $doctorID=$request->doctorID;
        $serviceID=$request->serviceID;
        $reason=$request->reason;
        $appointmentID=$request->appointmentID;
        $appointment = Appointment::where('appointmentID', $appointmentID)->first();
        $appointmentDate=$request->appointmentDate;
        $appointmentTime=$request->appointmentTime;

        if($appointmentDate==""){
            return redirect()->route('bookappointment')->with('noAppointmentDate', 'Appointment date is required.');
        }

        if($appointmentTime==""){
            return redirect()->route('bookappointment')->with('noAppointmentTime', 'Appointment time is required.');
        }

        if($reason==""){
            return redirect()->route('bookappointment')->with('noReason', 'Reason for appointment is required.');
        }

        $appointment->appointmentID=$appointmentID;
        $appointment->patientID=$patientID;
        $appointment->doctorID=$doctorID;
        $appointment->appointmentDate=$appointmentDate;
        $appointment->appointmentTime=$appointmentTime;
        $appointment->reason=$reason;
        $appointment->serviceID=$serviceID;
        $appointment->save();
        return redirect()->route('appointment')->with('success', 'Appointment is updated successfully.');
    }

    public function deleteAppointment($appointmentID){
        $appointment = Appointment::where('appointmentID', $appointmentID)->first();
        $appointment->delete();
        return redirect()->route('appointment')->with('success', 'Appointment canceled/deleted successfully.');
    }

}
