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
        <img src="img/logoklinik.jpg" alt="" style="width:80px; height:80px;">
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
            <form action="profile" method="GET">
                <input type="hidden" name="staffID" value="">
                <button style="margin-top:13%;">
                    <div style="display:flex; justify-content: center; align-items: center; height:40px; width:auto;" class="profile-button">
                        <img src="img/user.png" alt="" height="30px" width="30px" style="margin-right:10px;">
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
    <form action="{{url('adminhome')}}" method="GET">
        @csrf
        <input type="hidden" name="patientID" value="">
            <button style="margin-top: 3%; margin-bottom: 2%; margin-left: 9.6%; ">
                <div style="display:flex; align-items: center; width: 100px;height:60px;" class="profile-button">
                    <img src="{{asset('img/back.png')}}" alt="" height="30px" width="30px" style="margin-right:10px;">
                    <p class="general-font">Back</p>
                </div>    
            </button>
    </form>
    <div class="centerize-box">
        <div class="rounded-box" style="width:1200px; display:block; margin-bottom:5%; margin-top:0; height:auto;">
            <h1 class="title-font"> Appointment</h1>
            <p class="general-font"> To cancel appointment, click on its action.</p>
            <div style="display:flex; margin-top:10px;">
                <table>
                    <thead class="schedule">
                        <th class="scheduledata">Appointment ID</th>
                        <th class="scheduledata">Reason</th>
                        <th class="scheduledata">Appointment Date</th>
                        <th class="scheduledata">Appointment Time</th>
                        <th class="scheduledata">Service Type</th>
                        <th class="scheduledata">Patient Name</th>
                        <th class="scheduledata">Appointed Doctor</th>
                        <th class="scheduledata">Action</th>
                    </thead>
                    @foreach ($appointment as $appointments)
                        <tr>
                            
                            <td class="scheduledata">{{$appointments->appointmentID}}<a  style="text-decoration: none; color: inherit;" href=""></a></td>
                            <td class="scheduledata">{{$appointments->reason}}</td>
                            <td class="scheduledata">{{$appointments->appointmentDate}}</td>
                            <td class="scheduledata">{{$appointments->appointmentTime}}</td>
                            <td class="scheduledata">{{$appointments->serviceName}}</td>
                            <td class="scheduledata">{{$appointments->patientName}}</td>
                            <td class="scheduledata">{{$appointments->doctorName}}</td>
                            <td class="scheduledata">
                                <form action="{{url('deleteAppointmentForm', parameters: ['appointmentID' => $appointments->appointmentID])}}" method=POST>
                                    @csrf
                                    <button onclick="return confirm('Are you sure you want to delete this record?');" class="Login" style="margin:1px;">Cancel/Delete</button>
                                </form>
                                <form action="{{url('generatereport', parameters: ['appointmentID' => $appointments->appointmentID])}}" method=GET>
                                    @csrf
                                    <button class="Login" style="margin:1px;">Generate Report</button>
                                </form>
                                
                            </td>
                        </tr>
                    @endforeach

                    
                </table>
            </div>
        </div>
    </div>
   

    <!--Footer-->
    <footer style="background-color: #0c4759; margin-top: 5%; margin:0%;" class="general-font">
        <h1 style="color: white; font-size:10px; margin-left:5%">&copy; Copyright 2024 | All Rights Reserved</h1>
    </footer>
</body>
</html>
