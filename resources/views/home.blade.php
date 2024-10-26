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

            <a href="{{url('home')}}"><button style="margin-top:20%;">Home</button></a>

            <a href="{{url('profile')}}"><button >Profile</button></a>

            <a href="{{url('appointment')}}"><button>Appointment</button></a>

            <a href="{{url('service')}}"><button >Services</button></a>

            <a href="{{url('logout')}}"><button style="margin-top:20%;">Log Out</button></a>

        </div>
        <div style="display:flex; justify-content: flex-end; float:right; align-items:right; ">
            <form action="profile" method="GET">
                <input type="hidden" name="patientID" value="{{ $patientInfo->patientID }}">
                <button style="margin-top:13%;">
                    <div style="display:flex; justify-content: center; align-items: center; height:40px; width:auto;" class="profile-button">
                        <img src="img/user.png" alt="" height="30px" width="30px" style="margin-right:10px;">
                        <p >{{ $patientInfo->patientName }}</p>
                    </div>
                </button>
            </form>
            <span class="menu-icon" onclick="openNav()">&#9776;</span>
        </div>
    </header>
    <div class="centerize-box">
        <div class="rounded-box" style="width:1200px; display:block;">
            <h1 class="title-font"> Dashboard</h1>
            <div style="display:flex; margin-top:10px;">
                <form action="profile" method="GET">
                    <input type="hidden" name="patientID" value="{{ $patientInfo->patientID }}">
                        <button style="text-align: left;">
                            <div class="divider" style="margin-right:10px; ">
                                <div style="display:flex;">
                                    <img src="img/user.png" alt="" height="100px" width="100px" style="margin-right:10px;">
                                    <div style="display:block;">
                                        <p class="general-large-font">Profile</p>
                                        <p class="general-font">Manage all personal information</p>
                                    </div>
                                </div>
                            </div>
                        </button>
                </form>
                <form action="appointment" method="GET">
                    <input type="hidden" name="patientID" value="{{ $patientInfo->patientID }}">
                        <button style="text-align: left;">
                            <div class="divider" style="margin-right:10px; ">
                                <div style="display:flex;">
                                    <img src="img/schedule.png" alt="" height="100px" width="100px" style="margin-right:10px;">
                                    <div style="display:block;">
                                        <p class="general-large-font">Appointment</p>
                                        <p class="general-font">View, update and book your appointments.</p>
                                    </div>
                                </div>
                            </div>
                        </button>
                </form>
            </div>
            <div style="display:flex; margin-top:10px;">
                <form action="service" method="GET">
                    <input type="hidden" name="patientID" value="{{ $patientInfo->patientID }}">
                        <button style="text-align: left;">
                            <div class="divider" style="margin-right:10px; width:1170px;">
                                <div style="display:flex;">
                                    <img src="img/stethoscope.png" alt="" height="100px" width="100px" style="margin-right:10px;">
                                    <div style="display:block;">
                                        <p class="general-large-font">Services</p>
                                        <p class="general-font">View all available services in this clinic.</p>
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
