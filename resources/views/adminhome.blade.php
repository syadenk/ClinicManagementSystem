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
    <div class="centerize-box">
        <div class="rounded-box" style="width:1200px; display:block; height:auto;">
            <h1 class="title-font"> Admin Dashboard</h1>
            <div style="display:flex; margin-top:10px;">
                <form action="managepatients" method="GET">
                    <input type="hidden" name="staffID" value="{{$staff->staffID}}">
                        <button style="text-align: left;">
                            <div class="divider" style="margin-right:10px; ">
                                <div style="display:flex;">
                                    <img src="img/user.png" alt="" height="100px" width="100px" style="margin-right:10px;">
                                    <div style="display:block;">
                                        <p class="general-large-font">Patients Data</p>
                                        <p class="general-font">Manage all patients data.</p>
                                    </div>
                                </div>
                            </div>
                        </button>
                </form>
                <form action="manageappointment" method="GET">
                    <input type="hidden" name="staffID" value="">
                        <button style="text-align: left;">
                            <div class="divider" style="margin-right:10px; ">
                                <div style="display:flex;">
                                    <img src="img/schedule.png" alt="" height="100px" width="100px" style="margin-right:10px;">
                                    <div style="display:block;">
                                        <p class="general-large-font">Appointment Database</p>
                                        <p class="general-font">Manage appointment records.</p>
                                    </div>
                                </div>
                            </div>
                        </button>
                </form>
            </div>
            <div style="display:flex; margin-top:10px;">
                <form action="manageservices" method="GET">
                    <input type="hidden" name="staffID" value="">
                        <button style="text-align: left;">
                            <div class="divider" style="margin-right:10px;">
                                <div style="display:flex;">
                                    <img src="img/stethoscope.png" alt="" height="100px" width="100px" style="margin-right:10px;">
                                    <div style="display:block;">
                                        <p class="general-large-font">Services Options</p>
                                        <p class="general-font">Manage service options in this clinic.</p>
                                    </div>
                                </div>
                            </div>
                        </button>
                </form>
                <form action="managedoctor" method="GET">
                    <input type="hidden" name="staffID" value="">
                        <button style="text-align: left;">
                            <div class="divider" style="margin-right:10px;">
                                <div style="display:flex;">
                                    <img src="img/doctor.png" alt="" height="95px" width="95px" style="margin-right:10px;">
                                    <div style="display:block;">
                                        <p class="general-large-font">Doctors Data</p>
                                        <p class="general-font">Manage doctors data.</p>
                                    </div>
                                </div>
                            </div>
                        </button>
                </form>
            </div>
            <div style="display:flex; margin-top:10px;">
                <form action="manageadmin" method="GET">
                    <input type="hidden" name="staffID" value="">
                        <button style="text-align: left;">
                            <div class="divider" style="margin-right:10px;">
                                <div style="display:flex;">
                                    <img src="img/option.png" alt="" height="100px" width="100px" style="margin-right:10px;">
                                    <div style="display:block;">
                                        <p class="general-large-font">Staffs Data</p>
                                        <p class="general-font">Manage staff data.</p>
                                    </div>
                                </div>
                            </div>
                        </button>
                </form>
                <form action="manageschedule" method="GET">
                    <input type="hidden" name="staffID" value="">
                        <button style="text-align: left;">
                            <div class="divider" style="margin-right:10px;">
                                <div style="display:flex;">
                                    <img src="img/schedule.png" alt="" height="100px" width="100px" style="margin-right:10px;">
                                    <div style="display:block;">
                                        <p class="general-large-font">Schedule</p>
                                        <p class="general-font">Manage staff schedule.</p>
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
