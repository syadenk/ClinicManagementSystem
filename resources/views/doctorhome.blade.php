<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Page</title>
    <div>
        <link rel="stylesheet" type="text/css" href="css/structure.css"/>
        <link rel="stylesheet" type="text/css" href="css/font.css"/>
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
            <form action="{{url('doctorprofile')}}" method="GET">
                <input type="hidden" name="patientID" value="">
                <button style="margin-top:13%;">
                    <div style="display:flex; justify-content: center; align-items: center; height:40px; width:auto;" class="profile-button">
                        <img src="img/user.png" alt="" height="30px" width="30px" style="margin-right:10px;">
                        <p >{{ $doctor->doctorID }}</p>
                    </div>
                </button>
            </form>
            <span class="menu-icon" onclick="openNav()">&#9776;</span>
        </div>
    </header>
    @if (session('success'))
        <p class="message">{{ session('success') }}</p>
    @endif
    <div class="centerize-box">
        <div class="rounded-box" style="width:1200px; height:auto; display:block;">
            <h1 class="title-font"> Doctor's Dashboard</h1>
            <div style="display:flex; margin-top:10px; ">
                <form action="doctorprofile" method="GET">
                    <input type="hidden" name="patientID" value="">
                        <button style="text-align: left;">
                            <div class="divider" style="margin-right:10px; width:1170px;">
                                <div style="display:flex;">
                                    <img src="img/user.png" alt="" height="100px" width="100px" style="margin-right:10px;">
                                    <div style="display:block;">
                                        <p class="general-large-font">Profile</p>
                                        <p class="general-font">Manage all personal information.</p>
                                    </div>
                                </div>
                            </div>
                        </button>
                </form>
            </div>
            <div style="display:flex; margin-top:10px;">
                <form action="doctorschedule" method="GET">
                    <input type="hidden" name="patientID" value="">
                        <button style="text-align: left;">
                            <div class="divider" style="margin-right:10px; width:1170px;">
                                <div style="display:flex;">
                                    <img src="img/schedule.png" alt="" height="100px" width="100px" style="margin-right:10px;">
                                    <div style="display:block;">
                                        <p class="general-large-font">Schedule</p>
                                        <p class="general-font">View and update your schedule.</p>
                                    </div>
                                </div>
                            </div>
                        </button>
                </form>
            </div>
            <div style="display:flex; margin-top:10px;">
                <form action="doctorappointmentrecords" method="GET">
                    <input type="hidden" name="patientID" value="">
                        <button style="text-align: left;">
                            <div class="divider" style="margin-right:10px; width:1170px;">
                                <div style="display:flex;">
                                    <img src="img/time.png" alt="" height="100px" width="100px" style="margin-right:10px;">
                                    <div style="display:block;">
                                        <p class="general-large-font">Appointment Records</p>
                                        <p class="general-font">View your past appointments.</p>
                                    </div>
                                </div>
                            </div>
                        </button>
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
