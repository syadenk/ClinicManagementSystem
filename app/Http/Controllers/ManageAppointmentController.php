<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Appointment;
use App\Models\Schedule;
use App\Models\Doctor;
use Illuminate\Support\Facades\DB;
use TCPDF;
class ManageAppointmentController extends Controller
{
    public function retrieve(Request $request){
        $staffID=$request->session()->get('staffID');
        $staff = Admin::where('staffID', $staffID)->first();
        $appointment = DB::table('appointments')
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
        ->get();
        return view('manageappointment', compact('appointment','staff'));
    }

    public function delete($appointmentID){
        $appointment = Appointment::where('appointmentID', $appointmentID)->first();
        $appointment->delete();
        return redirect()->route('manageappointment')->with('success', 'Appointment canceled/deleted successfully.');
    }

    public function generatePDF($appointmentID)
    {
        // Fetch the data (e.g., appointments with relationships)
        $appointment = DB::table('appointments')
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
        ->where('appointments.appointmentID', $appointmentID)
        ->first();

        $pdf = new TCPDF();
        $pdf->AddPage(); // Add a new page

        // Set some content to print
        $html = view('reporttemplate', ['appointment' => $appointment])->render(); // Render the view to a string
        $pdf->writeHTML($html); // Write HTML to PDF

        // Output the PDF as a download
        return $pdf->Output('reporttemplate_' . $appointment->appointmentID . '.pdf', 'D'); // 'D' for download
    }
}
