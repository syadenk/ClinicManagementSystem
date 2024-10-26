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

            <a href="{{url('adminhome')}}"><button style="margin-top:20%;">Home</button></a>

            <a href="{{url('managepatients')}}"><button>Patient</button></a>

            <a href="{{url('manageappointment')}}"><button >Appointment</button></a>

            <a href="{{url('manageservices')}}"><button >Services</button></a>

            <a href="{{url('managedoctor')}}"><button >Doctors</button></a>

            <a href="{{url('manageadmin')}}"><button >Staff</button></a>

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
    <form action="{{url('manageadmin')}}" method="GET">
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
            <h1 class="title-font"> Add New Admin</h1>
            <p class="general-font">Insert all details below.</p>
            <div style="display:flex; margin-top:10px;">
                <form method="POST" action="addNewAdmin">
                    @csrf
                        
                        <div style="display:flex; margin-top:10px;">
                            <div class="inv-divider" style="width:1200px;">
                            <p style="margin-top:10px; padding:0;" class="general-large-font">Service Details</p>

                                <div style="padding:2%;">
                                    <label for="name" value="" class="general-font">Staff ID</label>
                                    <input id="name" class="form-input" type="name" name="staffID" value="{{$staffID}}" required autocomplete="username" default="" readonly/>
                                    
                                </div>

                                <div style="padding:2%;">
                                    <label for="name" value="" class="general-font">Staff Name</label>
                                    <input id="name" class="form-input" type="name" name="staffName" value="" default=""/>
                                    
                                </div>

                                <div style="padding:2%;">
                                    <label for="name" value="" class="general-font">Staff Password</label>
                                    <input id="name" class="form-input" type="name" name="staffPassword" value="" default=""/>
                                    
                                </div>

                                <div style="padding:2%;">
                                    <label for="name" value="" class="general-font">Staff Phone Number</label>
                                    <input id="name" class="form-input" type="name" name="phoneNumber" value="" default=""/>
                                    
                                </div>
                            </div>
                        </div>
                    @if (session('noStaffName'))
                    <p class="general-font" style="color:red; margin:10px;">{{ session('noStaffName') }}</p>
                    @endif
                    @if (session('noPassword'))
                        <p class="general-font" style="color:red; margin:10px;">{{ session('noPassword') }}</p>
                    @endif
                    @if (session('noPhoneNum'))
                        <p class="general-font" style="color:red; margin:10px;">{{ session('noPhoneNum') }}</p>
                    @endif
                    
            </div>
            <center><button type="submit" class="Login">Create</button></center>
                </form>  
        </div>
    </div>
   

    <!--Footer-->
    <footer style="background-color: #0c4759; margin-top: 50%; margin:0%;" class="general-font">
        <h1 style="color: white; font-size:10px; margin-left:5%">&copy; Copyright 2024 | All Rights Reserved</h1>
    </footer>
</body>
</html>
