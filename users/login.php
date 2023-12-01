<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CDF</title>
    <?php include('inc/header.php'); ?>
    <link rel="stylesheet" type="text/css" href="../assets/css/styles.css">

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <!-- <link rel="stylesheet" href="bootstrap dist/css/bootstrap.min.css"> -->
    <style>
        .logo {
            color: purple;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <a class="landing-page home" href="../index.php">
        <i class='bx bx-home' style='font-size: 3rem; color: purple;'></i>
    </a>
    <div class="container">
        <div class="content">
            <h2 class="logo"><i class='bx bxl-jquery'></i>CDF</h2>
            <div class="text-sci">
                <h2>Welcome!<br><span>To Constituency Development Fund (CDF) Online Service Site</span></h2>
                <p>
                    Local Council advertises invitations for empowerment grant submissions. Grant application form for
                    youth,women & community empowerment.
                </p>
            </div>
        </div>
        <div class="logreg-box">
            <div class="form-box login">
                <form action="" id="login">
                    <h2>Login Credentials</h2>

                    <div class="input-box">
                        <span class="icon"><i class='bx bxs-envelope'></i></span>
                        <input type="email" name="email" required>
                        <label>Email</label>

                    </div>
                    <div class="input-box">
                        <span class="icon"><i class='bx bxs-lock-alt'></i></span>
                        <input type="password" name="password" required>
                        <label>Password</label>

                    </div>

                    <div class="remember-forgot">

                        <label><input type="checkbox">Remember me</label>

                        <a href="#">Forgot password</a>

                    </div>

                    <button type="submit" class="btn">Login</button>


                    <div class="login-register">

                        <p>Don't have an account ?<a href="#" class="register-link">Sign Up</a></p>
                    </div>

                </form>

            </div>


            <div class="form-box register">
                <form action="" id="sign-up" method="post">
                    <h2>Registration</h2>
                    <div class="input-box">
                        <span class="icon"><i class='bx bxs-user'></i></span>
                        <input type="text" name="fullname" required>
                        <label>Name of Club/Organization/Corp.</label>
                    </div>
                    <div class="input-box">
                        <span class="icon"><i class='bx bxs-user'></i></span>
                        <input type="email" name="email" required>
                        <label>Email</label>
                    </div>
                    <div class="input-box">
                        <span class="icon"><i class='bx bxs-lock-alt'></i></span>
                        <input type="password" name="password" required>
                        <label>Password</label>
                    </div>
                    <div class="remember-forgot">
                        <label><input type="checkbox">I agree to the terms & conditions</label>
                    </div><button type="submit" class="btn">Sign Up</button>
                    <div class="login-register">
                        <p>Already have an account ?<a href="#" class="login-link">Sign In</a></p>
                    </div>

                </form>

            </div>

        </div>
    </div>

</body>
<?php include('inc/script.php'); ?>
<script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../assets/js/script.js"></script>
<script>
    jQuery(document).ready(function() {

        jQuery("#login").submit(function(e) {
            e.preventDefault();
            var formData = jQuery(this).serialize();
            $.jGrowl("Loading Please Wait......", {
                sticky: false
            });
            $.ajax({
                type: "POST",
                url: "../back-end/login_auth.php",
                data: formData,
                success: function(html) {
                    if (html == 'true') {
                        $.jGrowl("Welcome to your CDF Account", {
                            header: 'Access Granted'
                        });
                        var delay = 1000;
                        setTimeout(function() {
                            window.location.href = 'index.php?page=home';
                        }, delay);
                    } else {
                        $.jGrowl("Please Check your Email and Password", {
                            header: 'Login Failed'
                        });
                    }
                }
            });
            return false;
        });

        jQuery("#sign-up").submit(function(e) {
            e.preventDefault();

            var formData = jQuery(this).serialize();
            $.ajax({
                type: "POST",
                url: "../back-end/user_signup.php",
                data: formData,
                success: function(html) {
                    if (html == 'true') {
                        $.jGrowl("Thank you for Creating a CDF account", {
                            header: 'Sign up Success'
                        });
                        var delay = 2000;
                        setTimeout(function() {
                            window.location = 'login.php';
                        }, delay);
                    } else if (html == 'false') {
                        $.jGrowl("Error in page. ", {
                            header: 'Sign Up Failed'
                        });
                    }
                }
            });
        });
    });
</script>

</html>