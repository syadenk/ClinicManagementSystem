<?php

namespace App\Http\Controllers;
use App\Models\Patient;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    public function registerform()
    {
        return view('register');
    }

    // Handle the registration process
    public function accountRegistration(Request $request)
    {
        $password=$request->password;
        $passwordConfirmation=$request->password_confirmation;
        $email= $request->email;
        if ($password!=$passwordConfirmation){
            return redirect()->route('register')->with('mismatchPassword', 'Password did not match.');
        } else {
            $retrieveEmails = DB::table('patients')->pluck('patientEmail');
            $emailExists = false;
            foreach ($retrieveEmails as $existingEmail) {
                if ($existingEmail == $email) {
                    $emailExists = true; // Email found
                    break; // Exit the loop
                }
            }
        }
        
        
        if ($emailExists) {
            return redirect()->route('register')->with('matchedEmail', 'Email is already in use. Please use another email or login with registered account.');
        } else {
            $patientInfo= new Patient();
            $lastPatient = Patient::orderBy('patientID', 'desc')->first();
            if (!$lastPatient) {
                // If no previous record exists, start with P-001
                $patientInfo->patientID = 'P001';
            } else {
                // Extract numeric part and increment
                $lastIdNumber = (int) str_replace('P-', '', $lastPatient->patientID);
                $newIdNumber = $lastIdNumber + 1;
                // Format with leading zeros (e.g., P-001)
                $patientInfo->patientID = 'P' . str_pad($newIdNumber, 3, '0', STR_PAD_LEFT);
            }
            //print_r($request->input());
            $patientInfo->patientEmail=$email;
            $patientInfo->patientPassword=$password;
            $patientInfo->patientName=$request->fullName;
            $patientInfo->save();
            return redirect()->route('login')->with('success','Account registered sccuessfully. Proceed with login.');
        }

           
    }
        
}