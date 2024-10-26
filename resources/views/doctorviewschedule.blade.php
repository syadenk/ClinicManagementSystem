<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Page</title>
    <div>
        <link rel="stylesheet" type="text/css" href="css/structure.css"/>
        <link rel="stylesheet" type="text/css" href="css/font.css"/>
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

    <form action="doctorschedule" method="GET">
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
        <div class="rounded-box" style="width:1200px; display:block; margin-bottom:10%; margin-top:0; height:auto;">
            <h1 class="title-font">View Schedule</h1>
            <p class="general-font">Your current schedule:</p>
            <div style="margin-top:10px;">
                    <table>
                        <thead>
                            <tr class="schedule">
                                <th class="scheduledata">Day</th>
                                <th class="scheduledata">Date</th>
                                <th class="scheduledata">Start Shift</th>
                                <th class="scheduledata">End Shift</th>
                            </tr>
                        </thead>
                        @foreach ($schedule as $schedules )
                        <tbody>
                            <td class="scheduledata">{{$schedules->day}}</td>
                            <td class="scheduledata">{{$schedules->availableDate}}</td>
                            <td class="scheduledata">{{$schedules->timeStart}}</td>
                            <td class="scheduledata">{{$schedules->timeEnd}}</td>
                        @endforeach 
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </div>

    <!--Footer-->
    <footer style="background-color: #0c4759; margin-top: 5%; margin:0%;" class="general-font">
        <h1 style="color: white; font-size:10px; margin-left:5%">&copy; Copyright 2024 | All Rights Reserved</h1>
    </footer>
    
</body>
</html>
