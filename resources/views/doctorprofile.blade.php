<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Page</title>
    <div>
        <link rel="stylesheet" type="text/css" href="{{ asset('css/structure.css') }}"/>
        <link rel="stylesheet" type="text/css" href="{{ asset('css/font.css') }}"/>
        <script src="js/sidebar.js"></script>
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

            <a href="{{url('doctorhome')}}"><button style="margin-top:20%;">Home</button></a>

            <a href="{{url('doctorprofile')}}"><button>Profile</button></a>

            <a href="{{url('doctorschedule')}}"><button>Schedule</button></a>

            <a href="{{url('doctorappointmentrecords')}}"><button >Records</button></a>

            <a href="{{url('doctorLogout')}}"><button style="margin-top:20%;">Log Out</button></a>

        </div>

        <div style="display:flex; justify-content: flex-end; float:right; align-items:right; ">
            <form action="" method="GET">
                <input type="hidden" name="staffID" value="">
                <button style="margin-top:13%;">
                    <div style="display:flex; justify-content: center; align-items: center; height:40px; width:auto;" class="profile-button">
                        <img src="{{ asset('img/user.png') }}" alt="" height="30px" width="30px" style="margin-right:10px;">
                        <p >{{ $doctor->doctorID}}</p>
                    </div>
                </button>
            </form>
            <span class="menu-icon" onclick="openNav()">&#9776;</span>
        </div>
    </header>
    @if (session('success'))
        <p class="message">{{ session('success') }}</p>
    @endif
    <form action="{{url('doctorhome')}}" method="GET">
        @csrf
        <input type="hidden" name="patientID" value="{{ $doctor->doctorID }}">
            <button style="margin-top: 3%; margin-bottom: 2%; margin-left: 9.6%; ">
                <div style="display:flex; align-items: center; width: 100px;height:60px;" class="profile-button">
                    <img src="{{asset('img/back.png')}}" alt="" height="30px" width="30px" style="margin-right:10px;">
                    <p class="general-font">Back</p>
                </div>    
            </button>
    </form>
    <div class="centerize-box">
        <div class="rounded-box" style="width:1200px; display:block; height:auto; margin:0;">
            <h1 class="title-font"> Profile</h1>
            <div>
                <form method="POST" action="updateDoctorProfile">
                @csrf
                    <p style="margin-top:10px;" class="general-large-font">Personal Information</p>
                    <div style="padding:2%;">
                        <label for="name" value="" class="general-font">Doctor ID</label>
                        <input id="name" class="form-input" type="name" name="name" value="{{$doctor->doctorID}}" default="" readonly/>
                        
                    </div>

                    <div style="padding:2%;">
                        <label for="phoneNumber" value="" class="general-font">Doctor Name</label>
                        <input id="phoneNumber" class="form-input" type="phoneNumber" name="doctorName" value="{{$doctor->doctorName}}"  default=""/>
                        
                    </div>

                    <div style="padding:2%">
                        <label for="bloodPressure" value="" class="general-font">Specialties</label>
                        <input id="bloodPressure" class="form-input" type="" name="specialties" value="{{$doctor->specialties}}"/>
                    </div>

                    <p style="margin-top:10px;" class="general-large-font">Password</p>

                    <div style="padding:2%">
                        <label for="password" value="" class="general-font">Old Password</label>
                        <input id="password" class="form-input" type="password" name="password_old" />
                    </div>

                    <div style="padding:2%">
                        <label for="password" value="" class="general-font">New Password</label>
                        <input id="password" class="form-input" type="password" name="password" />
                    </div>

                    <div style="padding:2%">
                        <label for="password_confirmation" value="" class="general-font">Re-enter Password</label>
                        <input id="password_confirmation" class="form-input" type="password" name="password_confirmation" />
                    </div>

                    <center><button type="submit" class="Login" style="width:600px;">Update</button></center>
                    @if (session('noName'))
                        <p class="general-font" style="color:red; margin:10px;">{{ session('noName') }}</p>
                    @endif
                    @if (session('noSpecialties'))
                        <p class="general-font" style="color:red; margin:10px;">{{ session('noSpecialties') }}</p>
                    @endif
                    @if (session('oldPasswordRequired'))
                        <p class="general-font" style="color:red; margin:10px;">{{ session('oldPasswordRequired') }}</p>
                    @endif
                    @if (session('oldPasswordMismatched'))
                        <p class="general-font" style="color:red; margin:10px;">{{ session('oldPasswordMismatched') }}</p>
                    @endif
                    @if (session('mismatchedPassword'))
                        <p class="general-font" style="color:red; margin:10px;">{{ session('mismatchedPassword') }}</p>
                    @endif
                    @if (session('samePassword'))
                        <p class="general-font" style="color:red; margin:10px;">{{ session('samePassword') }}</p>
                    @endif
                    @if (session('passwordFieldsRequired'))
                        <p class="general-font" style="color:red; margin:10px;">{{ session('passwordFieldsRequired') }}</p>
                    @endif
                    @if (session('confirmPassword'))
                        <p class="general-font" style="color:red; margin:10px;">{{ session('confirmPassword') }}</p>
                    @endif
                    @if (session('noIC'))
                        <p class="general-font" style="color:red; margin:10px;">{{ session('noIC') }}</p>
                    @endif
                </form>
            </div>
        </div>
    </div>   

    <!--Footer-->
    <footer style="background-color: #0c4759; margin-top: 50%; margin:0%;" class="general-font">
        <h1 style="color: white; font-size:10px; margin-left:5%">&copy; Copyright 2024 | All Rights Reserved</h1>
    </footer>
</body>
</html>
