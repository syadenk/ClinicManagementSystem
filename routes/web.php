<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\AdminHomeController;
use App\Http\Controllers\ManagePatientController;
use App\Http\Controllers\UpdatePatientController;
use App\Http\Controllers\ManageServicesController;
use App\Http\Controllers\UpdateServicesController;
use App\Http\Controllers\AddServicesController;
use App\Http\Controllers\ManageAdminsController;
use App\Http\Controllers\UpdateAdminsController;
use App\Http\Controllers\AddAdminsController;
use App\Http\Controllers\DoctorLoginController;
use App\Http\Controllers\DoctorHomeController;
use App\Http\Controllers\DoctorProfileController;
use App\Http\Controllers\ManageDoctorController;
use App\Http\Controllers\UpdateDoctorController;
use App\Http\Controllers\DoctorScheduleController;
use App\Http\Controllers\DoctorInsertScheduleController;
use App\Http\Controllers\AddDoctorController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\ManageScheduleController;
use App\Http\Controllers\ManageAppointmentController;
use App\Http\Controllers\DoctorAppointmentRecordsController;

//page route
Route::get('/register', function () {
    return view('register');
});


// PATIENT //
//Redirect to profile page
Route::get('/profile', [ProfileController::class, 'retrieve'])->name('profile');

//Redirect to Homepage with retreive function
Route::get('/home', [HomeController::class, 'retrieve'])->name('home');

//Redirect to Service with retreive function
Route::get('/service', [ServiceController::class, 'retrieve'])->name('service');

//Logout from page
Route::get('logout', [HomeController::class, 'logout']);

//Update profile to database
Route::post('updateProfile', [ProfileController::class, 'updateProfile']);

//Redirect to register page
Route::get('/register', [RegisterController::class, 'registerform'])->name('register');

//Register account to database
Route::post('accountRegistration',[RegisterController::class, 'accountRegistration']);

//Redirect to login page
Route::get('/', [LoginController::class, 'retrieve'])->name('login');

//Login authentication
Route::post('accountLogin', [LoginController::class, 'loginform']);

//Redirect to appointment page
Route::get('/appointment', [AppointmentController::class, 'retrieve'])->name('appointment');

//Redirect to book appointment page
Route::get('/bookappointment', [AppointmentController::class, 'bookAppointment'])->name('bookappointment');

//Send book appointment details to database
Route::post('/bookForm', [AppointmentController::class, 'bookForm'])->name('bookForm');

//Update appointment details
Route::get('/editappointment/{patientAppointment}', [AppointmentController::class, 'editAppointment'])->name('editappointment');

//Update appointment form
Route::post('/editappointment/updateForm', [AppointmentController::class, 'updateForm'])->name('updateForm');

//Delete appointment
Route::post('/deleteAppointment/{appointmentID}', [AppointmentController::class, 'deleteAppointment'])->name('deleteAppointment');


//////////////////////////////////////////////////////////////            \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\


// ADMIN //

//////////////////////////////////// ADMIN HOME \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
//Redirect to admin login page
Route::get('/adminlogin', [AdminLoginController::class, 'retrieve'])->name('adminlogin');

//Admin login authentication
Route::post('adminloginform', [AdminLoginController::class, 'login'])->name('adminloginform');

//Redirect to admin homepage
Route::get('/adminhome', [AdminHomeController::class, 'retrieve'])->name('adminhome');

//Admin logout
Route::get('adminLogout', [AdminHomeController::class, 'adminLogout']);

//////////////////////////////////// ADMIN-PATIENT \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
//Redirect to manage patient page
Route::get('/managepatients', [ManagePatientController::class, 'retrieve'])->name('managepatients');

Route::get('/addpatient', [ManagePatientController::class, 'addpatient'])->name('addpatient');

Route::post('addForm', [ManagePatientController::class, 'addForm'])->name('addForm');


//Redirect to update patient page
Route::get('/updatepatients/{patientID}', [UpdatePatientController::class, 'retrieve'])->name('updatepatients');

//(Admin) Update patient info
Route::post('/updatePatientInfo/{patientID}', [UpdatePatientController::class, 'update'])->name('updatePatientInfo');

//(Admin) Delete patient info
Route::post('/deletePatientInfo/{patientID}', [UpdatePatientController::class, 'delete'])->name('deletePatientInfo');


//////////////////////////////////// ADMIN-SERVICE \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
//Manage services page
Route::get('/manageservices', [ManageServicesController::class, 'retrieve'])->name('manageservices');

//Redirect to update service page
Route::get('/updateservices/{serviceID}', [UpdateServicesController::class, 'retrieve'])->name('updateservices');

//Update service to database
Route::post('/updateServiceInfo/{serviceID}', [UpdateServicesController::class, 'update'])->name('updateServiceInfo');

//Delete service from database
Route::post('/deleteServices/{serviceID}', [UpdateServicesController::class, 'delete'])->name('deleteServices');

//Redirect to add services page
Route::get('/addservices', [AddServicesController::class, 'retrieve'])->name('addservices');

//Add service database
Route::post('/addNewServices', [AddServicesController::class, 'add'])->name('addNewServices');

//////////////////////////////////// ADMIN-ADMIN \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\

//Redirect to manage staff page
Route::get('/manageadmin', [ManageAdminsController::class, 'retrieve'])->name('manageadmin');

//Redirect to update staff page
Route::get('/updateadmin/{staffTableID}', [UpdateAdminsController::class, 'retrieve'])->name('updateadmin');

//Redirect to add new staff page
Route::get('/addAdmin', [AddAdminsController::class, 'retrieve'])->name('addAdmin');

//Add new staff to database
Route::post('/addNewAdmin', [AddAdminsController::class, 'add'])->name('addNewAdmin');

// Update staff data to database
Route::post('/updateAdminInfo/{staffTableID}', [UpdateAdminsController::class, 'update'])->name('updateAdminInfo');

// Delete staff data from database
Route::post('/deleteAdminInfo/{staffTableID}', [UpdateAdminsController::class, 'delete'])->name('deleteAdminInfo');

//////////////////////////////////// ADMIN-DOCTOR \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\

// Manage doctor page
Route::get('/managedoctor', [ManageDoctorController::class, 'retrieve'])->name('managedoctor');

// Update doctor page
Route::get('/updatedoctor/{doctorID}', [UpdateDoctorController::class, 'retrieve'])->name('updatedoctor');

// Redirect to add doctor form page
Route::get('/adddoctor', [AddDoctorController::class, 'retrieve'])->name('adddoctor');

// Add doctor data to database
Route::post('addDoctorForm', [AddDoctorController::class, 'add'])->name('addDoctorForm');

// Delete doctor data from database
Route::post('/deleteDoctor/{doctorID}', [UpdateDoctorController::class, 'delete'])->name('deleteDoctor');

// Update doctor data to database
Route::post('/updateDoctorForm/{doctorID}', [UpdateDoctorController::class, 'update'])->name('updateDoctorForm');

//////////////////////////////////// ADMIN-SCHEDULE \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\

// Redirect to manageschedule page (view doctor's schedule)
Route::get('/manageschedule', [ManageScheduleController::class, 'retrieve'])->name('manageschedule');

// Add new schedule for doctor
Route::get('/addschedule', [ManageScheduleController::class, 'retrieveSchedule'])->name('addschedule');

// Fill details of schedule for doctor
Route::get('/insertschedule', [ManageScheduleController::class, 'retrieveScheduleInfo'])->name('insertschedule');

Route::post('addScheduleForm', [ManageScheduleController::class, 'addScheduleForm'])->name('addScheduleForm');


//////////////////////////////////// ADMIN-APPOINTMENT \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\

Route::get('/manageappointment', [ManageAppointmentController::class, 'retrieve'])->name('manageappointment');

Route::post('/deleteAppointmentForm/{appointmentID}', [ManageAppointmentController::class, 'delete'])->name('deleteAppointmentForm');

Route::get('/generatereport/{appointmentID}', [ManageAppointmentController::class, 'generatePDF'])->name('generatereport');


// DOCTOR //

//Redirect to login page
Route::get('/doctorlogin', [DoctorLoginController::class, 'retrieve'])->name('doctorlogin');

//Redirect to login page
Route::post('doctorForm', [DoctorLoginController::class, 'login'])->name('doctorForm');

Route::get('/doctorhome', [DoctorHomeController::class, 'retrieve'])->name('doctorhome');

Route::get('doctorLogout', [DoctorHomeController::class, 'logout'])->name('doctorLogout');

Route::post('updateDoctorProfile', [DoctorProfileController::class, 'update'])->name('updateDoctorProfile');

Route::get('/doctorprofile', [DoctorProfileController::class, 'retrieve'])->name('doctorprofile');

Route::get('/doctorschedule', [DoctorScheduleController::class, 'retrieve'])->name('doctorschedule');

Route::get('/doctorInsertSchedule', [DoctorInsertScheduleController::class, 'retrieve'])->name('doctorInsertSchedule');

Route::post('insertSchedule', [DoctorInsertScheduleController::class, 'add'])->name('insertSchedule');

Route::get('retrieveSchedule', [DoctorScheduleController::class, 'retrieveSchedule'])->name('retrieveSchedule');

Route::get('/doctorappointmentrecords', [DoctorAppointmentRecordsController::class, 'retrieve'])->name('doctorappointmentrecords');



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
