<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Page</title>
    <div>
        <link rel="stylesheet" type="text/css" href="css/structure.css"/>
        <link rel="stylesheet" type="text/css" href="css/font.css"/>
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

<script src="functions.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var successMessage = document.getElementById('success-message');

        if (successMessage) {
            // Wait for 3 seconds
            setTimeout(function () {
                // Add fade-out class to start transition
                successMessage.classList.add('fade-out');

                // Remove the message after 1 second of fade-out
                setTimeout(function () {
                    successMessage.remove();
                }, 1000); // Matches the transition duration
            }, 3000); // Start fade-out after 3 seconds
        }
    });
</script>
<body>    
    <div class="centerize-box">
        <div class="rounded-box" style="height:600px;">
            <div class="inv-divider" style="margin-right:160px;">

                <img src="img/logoklinik.jpg" alt="" style="width:180px; height:180px;">
                <h1 class="title-font">Create</h1>
                <h1 class="general-font" style="font-size:22px; margin-left:3px; ">an account</h1>
            </div>

            <div class="inv-divider" style="display: block;">

                <form method="POST" action="accountRegistration" >

                    @csrf

                    <div style="padding:2%;">
                        <label for="email" value="" class="general-font">Email</label>
                        <input id="email" class="form-input" type="email" name="email" :value="old('email')" required autocomplete="username" />
                        
                    </div>

                    <div style="padding:2%">
                        <label for="password" value="" class="general-font">Password</label>
                        <input id="password" class="form-input" type="password" name="password" required autocomplete="new-password" />
                    </div>

                    <div style="padding:2%">
                        <label for="password_confirmation" value="" class="general-font">Re-enter Password</label>
                        <input id="password_confirmation" class="form-input" type="password" name="password_confirmation" required autocomplete="new-password" />
                    </div>

                    <div style="padding:2%">
                        <label for="fullName" value="" class="general-font">Full Name</label>
                        <input id="fullName" class="form-input" type="fullName" name="fullName" required autofocus autocomplete="new-password" />
                    </div>

                    @if (session('mismatchPassword'))
                        <p class="general-font" style="color:red; margin:10px;">{{ session('mismatchPassword') }}</p>
                    @endif
                    @if (session('matchedEmail'))
                        <p class="general-font" style="color:red; margin:10px;">{{ session('matchedEmail') }}</p>
                    @endif

                    <center><button type="submit" class="Login">Register</button></center>

                    <a href="/" class="general-font" style="float:right; color:blue; margin-top:30px; margin-bottom:60px;">Back to Sign In</a>
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
