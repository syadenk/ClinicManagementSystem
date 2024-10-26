<?php

namespace App\Http\Controllers;
use App\Models\Doctor;
use App\Models\Schedule;
use App\Models\Services;
use Illuminate\Http\Request;

class DoctorInsertScheduleController extends Controller
{
    public function retrieve(Request $request){
        $doctorID=$request->session()->get('doctorID');
        $doctor = Doctor::where('doctorID', $doctorID)->first();
        $selectedShift = $request->input('selected_shift', []);
        

        $dayAndDates = [];

        // Process the selected dates
        foreach ($selectedShift as $shift) {
            list($day, $formattedDate) = explode('|', $shift);
            $dayAndDates[] = [
                'day' => $day,
                'date' => $formattedDate,
            ];
        }
        

        return view('doctorinsertschedule', compact('doctor','dayAndDates'));
    }

    public function add(Request $request){
        $doctorID=$request->session()->get('doctorID');
        $day=$request->day;
        $date=$request->date;
        $shift=$request->shift;

        if($shift=="morningevening"){
            $startTime="08:00:00";
            $endTime="16:00:00";
        }
        elseif($shift=="middle"){
            $startTime="12:00:00";
            $endTime="20:00:00";
        }
        elseif($shift=="eveningnight"){
            $startTime="14:00:00";
            $endTime="22:00:00";
        }
        else{
            return redirect()->route('doctorschedule')->with('noShift', 'Shift is required.');
        }

        $lastSchedule = Schedule::orderBy('scheduleID', 'desc')->first();
        if (!$lastSchedule) {
            // If no previous record exists, start with P-001
            $scheduleID = 'J001';
        } else {
            // Extract numeric part and increment
            $lastIdNumber = (int) str_replace('J', '', $lastSchedule->scheduleID);
            $newIdNumber = $lastIdNumber + 1;
            // Format with leading zeros (e.g., P-001)
            $scheduleID = 'J' . str_pad($newIdNumber, 3, '0', STR_PAD_LEFT);
        }

        $schedule= new Schedule();


        $schedule->scheduleID=$scheduleID;
        $schedule->doctorID=$doctorID;
        $schedule->availableDate=$date;
        $schedule->timeStart=$startTime;
        $schedule->timeEnd=$endTime;
        $schedule->day=$day;
        $schedule->save();

        return redirect()->route('doctorschedule')->with('success', 'New schedule is added.');
    }
}
