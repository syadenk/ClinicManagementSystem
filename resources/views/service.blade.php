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
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            
            <a href="{{url('home')}}"><button style="margin-top:20%;">Home</button></a>

            <a href="{{url('profile')}}"><button >Profile</button></a>

            <a href="{{url('appointment')}}"><button>Appointment</button></a>

            <a href="{{url('service')}}"><button >Services</button></a>

            <a href="{{url('logout')}}"><button style="margin-top:20%;">Log Out</button></a>
            
        </div>
        <div style="display:flex; justify-content: flex-end; align-items:right; width:auto;">
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
    @if (session('success'))
        <p class="message">{{ session('success') }}</p>
    @endif
    <form action="{{url('home')}}" method="GET">
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
        <div class="rounded-box" style="width:1200px; display:block; height:auto; margin-top:0; margin-bottom:5%;">
            <h1 class="title-font"> Services</h1>
            <p class="general-font">There are many services here to meet your needs! Including:</p>
            <table>
                <tr>
                    <th>Service Name</th>
                    <th>Service Type</th>
                    <th>Price</th>
                </tr>
                <tr>
                @foreach($services as $service)
                    <td>{{$service->serviceName}}</td>
                    <td>{{ $service->serviceType }}</td>
                    <td>RM {{ number_format($service->servicePrice, 2) }}</td>
                </tr>
                @endforeach
                
            </table>
        </div>
    </div>
   

    <!--Footer-->
    <footer style="background-color: #0c4759; margin-top: 5%; margin:0%;" class="general-font">
        <h1 style="color: white; font-size:10px; margin-left:5%">&copy; Copyright 2024 | All Rights Reserved</h1>
    </footer>
</body>
</html>
