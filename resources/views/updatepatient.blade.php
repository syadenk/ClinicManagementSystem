<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Page</title>
    <div>
        <link rel="stylesheet" type="text/css" href="{{ asset('css/structure.css') }}"/>
        <link rel="stylesheet" type="text/css" href="{{ asset('css/font.css') }}"/>
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
        <img src="{{ asset('img/logoklinik.jpg') }}" alt="" style="width:80px; height:80px;">
        </div>

        <!--Side navigation menu-->
        <div id="mySidenav" class="sidenav">
            <button href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</button>

            <a href="{{url('adminhome')}}"><button style="margin-top:20%;">Home</button></a>

            <a href="{{url('managepatients')}}"><button>Patient</button></a>

            <a href="{{url('manageappointment')}}"><button >Appointment</button></a>

            <a href="{{url('manageservices')}}"><button >Services</button></a>

            <a href="{{url('managedoctor')}}"><button >Doctors</button></a>

            <a href="{{url('manageadmin')}}"><button >Staff</button></a>

            <a href="{{url('manageschedule')}}"><button >Schedule</button></a>

            <a href="{{url('adminLogout')}}"><button style="margin-top:20%;">Log Out</button></a>
        </div>
        <div style="display:flex; justify-content: flex-end; float:right; align-items:right; ">
            <form action="" method="GET">
                <input type="hidden" name="staffID" value="">
                <button style="margin-top:13%;">
                    <div style="display:flex; justify-content: center; align-items: center; height:40px; width:auto;" class="profile-button">
                        <img src="{{ asset('img/user.png') }}" alt="" height="30px" width="30px" style="margin-right:10px;">
                        <p >{{ $staff->staffID}}</p>
                    </div>
                </button>
            </form>
            <span class="menu-icon" onclick="openNav()">&#9776;</span>
        </div>
    </header>
    @if (session('success'))
        <p class="message">{{ session('success') }}</p>
    @endif
    <form action="{{url('managepatients')}}" method="GET">
        @csrf
        <input type="hidden" name="patientID" value="{{ $staff->staffID }}">
            <button style="margin-top: 3%; margin-bottom: 2%; margin-left: 9.6%; ">
                <div style="display:flex; align-items: center; width: 100px;height:60px;" class="profile-button">
                    <img src="{{asset('img/back.png')}}" alt="" height="30px" width="30px" style="margin-right:10px;">
                    <p class="general-font">Back</p>
                </div>    
            </button>
    </form>
    <div class="centerize-box">
        <div class="rounded-box" style="width:1200px; display:block; height:auto; margin-bottom:5%; margin-top:0;">
            <h1 class="title-font"> Patient Records</h1>
            <p class="general-font">Patient data in selection: {{$patient->patientID}}</p>
            <div style="display:flex; margin-top:10px;">
                <form method="POST" action="{{ route('updatePatientInfo', parameters: ['patientID' => $patient->patientID]) }}">
                    @csrf
                        
                        <div style="display:flex; margin-top:10px;">
                            <div class="inv-divider" style="width:580px;">
                            <p style="margin-top:10px; padding:0;" class="general-large-font">Personal Information</p>
                                <div style="padding:2%;">
                                    <label for="name" value="" class="general-font">Name</label>
                                    <input id="name" class="form-input" type="name" name="name" value="{{$patient->patientName}}" required autocomplete="username" default=""/>
                                    
                                </div>

                                <div style="padding:2%;">
                                    <label for="phoneNumber" value="" class="general-font">Phone Number</label>
                                    <input id="phoneNumber" class="form-input" type="phoneNumber" name="phoneNumber" value="{{$patient->phoneNumber}}"  default=""/>
                                    
                                </div>

                                <div style="padding:2%">
                                    <label for="bloodPressure" value="" class="general-font">Blood Pressure (optional)</label>
                                    <input id="bloodPressure" class="form-input" type="bloodPressure" name="bloodPressure" value="{{$patient->bloodPressure}}"/>
                                </div>

                                <div style="padding:2%">
                                    <label for="ic" value="" class="general-font">Identification Card Number</label>
                                    <input id="ic" class="form-input" type="ic" name="ic" value="{{$patient->patientIC}}" />
                                </div>
                            </div>
                            <div class="inv-divider" style="width:580px;">
                                <p style="margin-top:10px;" class="general-large-font">Account Information</p>

                                <div style="padding:2%;">
                                    <label for="email" value="" class="general-font">Email</label>
                                    <input id="email" class="form-input" type="email" name="email" value="{{$patient->patientEmail}}" default=""/>
                                    
                                </div>

                                <div style="padding:2%">
                                    <label for="password" value="" class="general-font">Password</label>
                                    <input id="password" class="form-input" type="password" name="password" value="{{$patient->patientPassword}}"/>
                                </div>
                            </div> 
                            
                        </div>
                    @if (session('noPhoneNumber'))
                    <p class="general-font" style="color:red; margin:10px;">{{ session('noPhoneNumber') }}</p>
                    @endif
                    @if (session('noName'))
                        <p class="general-font" style="color:red; margin:10px;">{{ session('noName') }}</p>
                    @endif
                    @if (session('noEmail'))
                        <p class="general-font" style="color:red; margin:10px;">{{ session('noEmail') }}</p>
                    @endif
                    @if (session('passwordRequired'))
                        <p class="general-font" style="color:red; margin:10px;">{{ session('passwordRequired') }}</p>
                    @endif
                    @if (session('noIC'))
                        <p class="general-font" style="color:red; margin:10px;">{{ session('noIC') }}</p>
                    @endif
                        
                    
            </div>
            <center><button type="submit" class="Login">Update</button></center>
                </form>
                <form method="POST" action="{{ route('deletePatientInfo', parameters: ['patientID' => $patient->patientID]) }}">
                @csrf
                    <center><button type="submit" style="background-color: red; margin-top:1%;" class="Login">Delete</button></center>
                </form>    
        </div>
    </div>
   

    <!--Footer-->
    <footer style="background-color: #0c4759; margin-top: 50%; margin:0%;" class="general-font">
        <h1 style="color: white; font-size:10px; margin-left:5%">&copy; Copyright 2024 | All Rights Reserved</h1>
    </footer>
</body>
</html>
