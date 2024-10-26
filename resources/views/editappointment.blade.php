<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Page</title>
    <div>
        <link rel="stylesheet" type="text/css" href="{{asset('css/structure.css')}}"/>
        <link rel="stylesheet" type="text/css" href="{{asset('css/font.css')}}"/>
        <script src="{{asset('js/sidebar.js')}}"></script>
        <link rel="stylesheet" href="">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poltawski+Nowy:ital,wght@1,700&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poltawski+Nowy:ital,wght@1,700&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Agbalumo&display=swap" rel="stylesheet">
    </div>
</head>
<body>

    <!--Header contents-->
    <header class="main-header">
        <div class="header-content">
        <img src="{{asset('img/logoklinik.jpg')}}" alt="" style="width:80px; height:80px;">
        </div>

        <!--Side navigation menu-->
        <div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <form action="home" method="GET">
                <input type="hidden" name="patientID" value="{{ $patient->patientID }}">
                    <button style="margin-top:20%;">Home</button>
            </form>

            <form action="profile" method="GET">
                <input type="hidden" name="patientID" value="{{ $patient->patientID }}">
                <button>Profile</button>

            </form>

            <button>Appointment</button>

            <form action="service" method="GET">

                <input type="hidden" name="patientID" value="{{ $patient->patientID }}">
                <button>Services</button>

            </form>

            <form action="{{url('logout')}}" method="POST">
                @csrf
                <input type="hidden" name="patientID" value="{{ $patient->patientID }}">
                    <button style="margin-top:20%;">Log Out</button>
            </form>
        </div>

        <div style="display:flex; justify-content: flex-end; align-items:right; width:auto;">
            <form action="profile" method="GET">
                <input type="hidden" name="patientID" value="{{ $patient->patientID }}">
                <button style="margin-top:13%;">
                    <div style="display:flex; justify-content: center; align-items: center; height:40px; width:auto;" class="profile-button">
                        <img src="{{asset('img/user.png')}}" alt="" height="30px" width="30px" style="margin-right:10px;">
                        <p >{{ $patient->patientName }}</p>
                    </div>
                </button>
            </form>
            <span class="menu-icon" onclick="openNav()">&#9776;</span>
        </div>
    </header>
    @if (session('success'))
        <p class="message">{{ session('success') }}</p>
    @endif
    <div style="display: block;">
    <form action="{{url('appointment')}}" method="GET">
        @csrf
        <input type="hidden" name="patientID" value="{{ $patient->patientID }}">
            <button style="margin-top: 3%; margin-bottom: 2%; margin-left: 9.6%; ">
                <div style="display:flex; align-items: center; width: 100px;height:60px;" class="profile-button">
                    <img src="{{asset('img/back.png')}}" alt="" height="30px" width="30px" style="margin-right:10px;">
                    <p class="general-font">Back</p>
                </div>    
            </button>
    </form>
        
    </div>
    <div class="centerize-box">
        <div class="rounded-box" style="width:1200px; display:block; height:auto; margin:0;">
            <h1 class="title-font"> Edit Appointment</h1>
            <div>
                <form method="POST" action="updateForm">
                    @csrf
                    <p style="margin-top:10px;" class="general-large-font">Personal Information</p>

                    <div style="padding:2%;">
                        <label for="name" class="general-font">Name</label>
                        <input id="name" class="form-input" type="text" name="name" value="{{ $patient->patientName }}" readonly />
                    </div>

                    <div style="padding:2%;">
                        <label for="phoneNumber" class="general-font">Phone Number</label>
                        <input id="phoneNumber" class="form-input" type="text" name="phoneNumber" value="{{ $patient->phoneNumber }}" readonly />
                    </div>

                    <div style="padding:2%;">
                        <label for="bloodPressure" class="general-font">Blood Pressure (optional)</label>
                        <input id="bloodPressure" class="form-input" type="text" name="bloodPressure" value="{{ $patient->bloodPressure }}" readonly />
                    </div>

                    <div style="padding:2%;">
                        <label for="ic" class="general-font">Identification Card Number</label>
                        <input id="ic" class="form-input" type="text" name="ic" value="{{ $patient->patientIC }}" readonly />
                    </div>

                    <p style="margin-top:10px;" class="general-large-font">Appointment</p>

                    @foreach ($patientAppointment as $patientAppointments)


                        <div style="padding:2%;">
                            <label for="reason" class="general-font">Appointment ID</label>
                            <input id="reason" class="form-input" type="text" name="appointmentID" value="{{$patientAppointments->appointmentID}}"/>
                        </div>

                        <div style="padding:2%;">
                            <label for="reason" class="general-font">Reason</label>
                            <input id="reason" class="form-input" type="text" name="reason" value="{{$patientAppointments->reason}}"/>
                        </div>
                    
                    
                        <div style="padding:2%;">
                            <label for="doctorID" class="general-font">Choose a Doctor</label>
                            <select id="doctorID" class="form-input" name="doctorID">
                            <option value="{{ $patientAppointments->doctorID }}">{{$patientAppointments->doctorName}}, Specialties: ({{ $patientAppointments->specialties }})</option> 
                                @foreach ($doctorList as $doctor)
                                    <option value="{{ $doctor->doctorID }}" 
                                            data-available-dates="{{ json_encode($doctor->availableDates) }}"
                                            data-time-end="{{ $doctor->timeEnd }}">
                                        {{ $doctor->doctorName }} , Specialties: ({{ $doctor->specialties }})
                                    </option>
                                @endforeach
                            </select>
                            <p class="general-font" style="color:#0c4759; margin-left:1px;">Doctor listed is doctors that are available between this week & next week.</p>
                        </div>

                        <div style="padding:2%;">
                            <label for="availableDate" class="general-font">Select Service</label>
                            <select id="availableDate" class="form-input" name="serviceID">
                                <option value="{{$patientAppointments->serviceID}}">{{$patientAppointments->serviceName}}</option>
                                @foreach ($service as $services)
                                    <option value="{{ $services->serviceID }}">{{ $services->serviceName }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div style="padding:2%;">
                            <label for="availableDate" class="general-font">Select Date</label>
                            <select id="availableDate" class="form-input" name="appointmentDate">
                                <option value="{{$patientAppointments->appointmentDate}}">{{$patientAppointments->appointmentDate}}</option>
                                @foreach ($schedule as $schedules)
                                    <option value="{{ $schedules->availableDate }}">{{ $schedules->availableDate }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div style="padding:2%;">
                            <label for="availableTime" class="general-font">Select Time</label>
                            <select id="availableTime" class="form-input" name="appointmentTime">
                                <option value="{{$patientAppointments->appointmentTime}}">{{$patientAppointments->appointmentTime}}</</option>
                                <option value="08:00:00">8 a.m.</option>
                                <option value="09:00:00">9 a.m</option>
                                <option value="10:00:00">10 a.m</option>
                                <option value="11:00:00">11 a.m</option>
                                <option value="12:00:00">12 p.m</option>
                                <option value="13:00:00">1 p.m</option>
                                <option value="14:00:00">2 p.m</option>
                                <option value="15:00:00">3 p.m</option>
                                <option value="16:00:00">4 p.m</option>
                                <option value="17:00:00">5 p.m</option>
                                <option value="18:00:00">6 p.m</option>
                                <option value="19:00:00">7 p.m</option>
                                <option value="20:00:00">8 p.m</option>
                                <option value="21:00:00">9 p.m</option>
                            </select>
                        </div>
                    @endforeach
                    @if (session('noAppointmentDate'))
                    <p class="general-font" style="color:red; margin:10px;">{{ session('noAppointmentDate') }}</p>
                    @endif
                    @if (session('noAppointmentTime'))
                        <p class="general-font" style="color:red; margin:10px;">{{ session('noAppointmentTime') }}</p>
                    @endif
                    @if (session('noReason'))
                        <p class="general-font" style="color:red; margin:10px;">{{ session('noReason') }}</p>
                    @endif
                    

                    <center><button type="submit" class="Login" style="width:600px;">Submit</button></center>
                </form>
            </div>
        </div>
    </div>
   

    <!--Footer-->
    <footer style="background-color: #0c4759; margin-top: 5%; margin:0%;" class="general-font">
        <h1 style="color: white; font-size:10px; margin-left:5%">&copy; Copyright 2024 | All Rights Reserved</h1>
    </footer>
    <script src="{{asset('js/filter.js')}}"></script>
</body>
</html>
