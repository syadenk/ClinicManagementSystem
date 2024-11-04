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
    <form action="{{url('manageservices')}}" method="GET">
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
            <h1 class="title-font"> Services Update</h1>
            <p class="general-font">Service data in selection: {{$service->serviceID}}</p>
            <div style="display:flex; margin-top:10px;">
                <form method="POST" action="{{url('updateServiceInfo', ['serviceID' => $service->serviceID])}}">
                    @csrf
                        
                        <div style="display:flex; margin-top:10px;">
                            <div class="inv-divider" style="width:1200px;">
                            <p style="margin-top:10px; padding:0;" class="general-large-font">Service Details</p>
                                <input id="name" type="hidden" class="form-input" type="name" name="serviceName" value="{{$service->serviceID}}" default=""/>
                                <div style="padding:2%;">
                                    <label for="name" value="" class="general-font">Service Name</label>
                                    <input id="name" class="form-input" type="name" name="serviceName" value="{{$service->serviceName}}" required autocomplete="username" default=""/>
                                    
                                </div>

                                <div style="padding:2%;">
                                    <label for="phoneNumber" value="" class="general-font">Service Type</label>
                                    <select id="serviceType" name="serviceType" class="form-input" required>
                                        <option value="Consultation" {{ $service->serviceType == 'Consultation' ? 'selected' : '' }}>Consultation</option>
                                        <option value="Scan" {{ $service->serviceType == 'Scan' ? 'selected' : '' }}>Scan</option>
                                        <option value="Dressing" {{ $service->serviceType == 'Dressing' ? 'selected' : '' }}>Dressing</option>
                                    </select>
                                </div>

                                <div style="padding:2%">
                                    <label for="bloodPressure" value="" class="general-font">Service Price</label>
                                    <input id="bloodPressure" class="form-input" type="number" name="servicePrice" value="{{$service->servicePrice}}"/>
                                </div>
                            </div>
                        </div>
                    @if (session('noServiceName'))
                    <p class="general-font" style="color:red; margin:10px;">{{ session('noServiceName') }}</p>
                    @endif
                    @if (session('noPrice'))
                        <p class="general-font" style="color:red; margin:10px;">{{ session('noPrice') }}</p>
                    @endif
                        
                    
            </div>
            <center><button type="submit" class="Login">Update</button></center>
                </form>
                <form method="POST" action="{{url('deleteServices', parameters: ['serviceID'=>$service->serviceID])}}">
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
