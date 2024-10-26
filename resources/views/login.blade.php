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
    <div class="centerize-box">
        <div class="rounded-box">
            <div class="inv-divider" style="margin-right:160px;">
                <img src="img/logoklinik.jpg" alt="" style="width:180px; height:180px;">
                <h1 class="title-font">Sign in</h1>
                <h1 class="general-font" style="font-size:22px; margin-left:2px;">with your account</h1>
                <div style="margin-top:90px; display:block;">
                    <a href="/adminlogin" class="general-font" style="float:right; color:blue;">Admin Login</a>
                </div>

                <div>
                    <a href="/doctorlogin" class="general-font" style="float:right; color:blue; margin-right:15px;">Doctor Login</a>
                </div>

            </div>
            <div class="inv-divider" style="display: block; margin-top:100px;">
                <form method="POST" action="accountLogin" >
                    @csrf
                    <div style="padding:2%;">
                        <label for="email" value="" class="general-font">Email</label>
                        <input id="email" class="form-input" type="email" name="email" :value="old('email')" required autocomplete="username" />
                    </div>
                    <div style="padding:2%">
                        <label for="password" value="" class="general-font">Password</label>
                        <input id="password" class="form-input" type="password" name="password" required autocomplete="new-password" />
                    </div>
                    <center><button type="submit" class="Login">Login</button></center>
                    @if (session('nonexistentEmail'))
                        <p class="general-font" style="color:red; margin:10px;">{{ session('nonexistentEmail') }}</p>
                    @endif
                    @if (session('success'))
                        <p class="general-font" style="color:red; margin:10px;">{{ session('success') }}</p>
                    @endif
                    @if (session('false'))
                        <p class="general-font" style="color:red; margin:10px;">{{ session('false') }}</p>
                    @endif

                    <a href="/register" class="general-font" style="float:right; color:blue; margin-top:30px;">Create an account</a>
                </form>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
   

    <!--Footer-->
    <footer style="background-color: #0c4759; margin-top: 5%; margin:0%;" class="general-font">
        <h1 style="color: white; font-size:10px; margin-left:5%">&copy; Copyright 2024 | All Rights Reserved</h1>
    </footer>
</body>
</html>
