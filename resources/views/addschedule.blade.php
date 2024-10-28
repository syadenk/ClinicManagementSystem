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
<>

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

            <a href="{{url('adminLogout')}}"><button style="margin-top:20%;">Log Out</button></a>

        </div>
        <div style="display:flex; justify-content: flex-end; float:right; align-items:right; ">
            <form action="" method="GET">
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
    @if (session('noShift'))
        <p class="message">{{ session('noShift') }}</p>
    @endif

    <form action="manageschedule" method="GET">
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
            <h1 class="title-font">Doctor Schedule</h1>
            <p class="general-font">Manage your availability here.</p>
            <p class="general-font" style="color:red;">To apply shift, click one shift only per submit.</p>
            <div style="margin-top:10px;">
                <div style="display:flex;">
                    <button id="prevWeek">This Week</button>
                    <button id="nextWeek">Next Week</button>
                </div>
                <form action="insertschedule" method="GET" id="scheduleForm">
                    <table>
                        <thead>
                            <tr class="schedule">
                                <th class="scheduledata">Day</th>
                                <th class="scheduledata">Date</th>
                            </tr>
                        </thead>
                        <tbody id="scheduleBody">
                            <!-- Rows will be populated here by JavaScript -->
                        </tbody>
                        </table>
                    </table>
                    <label for="" class="general-font">Select a Doctor</label>
                    <select name="doctorID" class="form-input" type="select">
                        @foreach ($doctor as $doctors)
                            <option value="{{$doctors->doctorID}}">{{$doctors->doctorName}}</option>
                        @endforeach
                    </select>
                    <button type="submit" class="Login">Apply Shift</button>
                </form>
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
