<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Page</title>
    <div>
        <link rel="stylesheet" type="text/css" href="css/structure.css"/>
        <link rel="stylesheet" type="text/css" href="css/font.css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.13.18/jquery.timepicker.min.css">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.13.18/jquery.timepicker.min.js"></script>
        <script src="{{asset('js/sidebar.js')}}"></script>
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
                        <img src="img/user.png" alt="" height="30px" width="30px" style="margin-right:10px;">
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
    @if (session('noShift'))
        <p class="message">{{ session('noShift') }}</p>
    @endif

    <form action="doctorhome" method="GET">
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
            <h1 class="title-font">Appointment Records</h1>
            <p class="general-font">Records for previous and present appointments.</p>
            <div style="margin-top:10px;">
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
                    @foreach ($doctorAppointment as $doctorAppointments)
                        <tr>
                            <td class="scheduledata">{{$doctorAppointments->appointmentID}}<a  style="text-decoration: none; color: inherit;" href=""></a></td>
                            <td class="scheduledata">{{$doctorAppointments->reason}}</td>
                            <td class="scheduledata">{{$doctorAppointments->appointmentDate}}</td>
                            <td class="scheduledata">{{$doctorAppointments->appointmentTime}}</td>
                            <td class="scheduledata">{{$doctorAppointments->serviceName}}</td>
                            <td class="scheduledata">{{$doctorAppointments->patientName}}</td>
                            <td class="scheduledata">{{$doctorAppointments->doctorName}}</td>
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.13.18/jquery.timepicker.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.13.18/jquery.timepicker.min.css">
    <script src="{{asset('js/schedule.js')}}"></script>
    
</body>
</html>
