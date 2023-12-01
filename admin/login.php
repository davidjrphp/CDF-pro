<!DOCTYPE html>
<html lang="en">
<?php
session_start();
include('connection.php');
ob_start();
$system = $conn->query("SELECT * FROM system_settings")->fetch_array();
foreach ($system as $k => $v) {
    $_SESSION['system'][$k] = $v;
}
ob_end_flush();
?>
<?php
if (isset($_SESSION['login_id']))
    header("location:index.php?page=home");

?>
<?php include 'header.php' ?>
<style>
    .login-page {
        background: #7f9fd3;
    }

    .page-title {
        margin-top: 2px;
        font-size: 1.5rem;
        color: #fff4f4 !important;
    }

    .card,
    .login-card-body {
        border-radius: 20px;
    }

    .home-icon {
        position: fixed;
        top: 20px;
        left: 20px;
        font-size: 2em;
        color: green;
        cursor: pointer;
        transition: color 0.3s ease-in-out;
    }

    .home-icon:hover {
        color: #e74c3c;
    }
</style>

<body class="hold-transition login-page">
    <div class="home-icon">
        <a href="../index.php">
            <i class="fas fa-home"></i>
        </a>
    </div>

    <div class="system-logo">
        <img src="../assets/img/zambia.png" alt="System Logo" class="brand-image " style="opacity: .8;width: 5.5rem;height: 5.5rem;max-height: unset; ">
    </div>
    <h3><b>Welcome to<b></h3><br>
    <h3 class=" page-title" style="text-align: center"><?php echo $_SESSION['system']['name'] ?> <br>Monitoring System</h3>
    <h4 class="short-form" style="text-align: center"><b><?php echo $_SESSION['system']['short_form'] ?><b></h4>
    <br>
    <div class="login-box">
        <div class="login-logo">
            <a href="#" class="text-white"></a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <h5 class="login-tag" style="text-align: center">Enter Login Credentials</h5>
                <form action="" id="login-form">
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" name="email" required placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" name="password" required placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Login As</label>
                        <select name="login" id="" class="custom-select custom-select-sm">
                            <option value="0">Staff</option>
                            <option value="1">Admin</option>
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember">
                                <label for="remember">
                                    Remember Me
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-light bg-success btn-block">Login</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div><br><br>
    <center><small> Constituency Development Fund <br> CDF </small></center>
    <!-- /.login-box -->
    <script>
        $(document).ready(function() {
            $('#login-form').submit(function(e) {
                e.preventDefault()
                start_load()
                if ($(this).find('.alert-danger').length > 0)
                    $(this).find('.alert-danger').remove();
                $.ajax({
                    url: 'ajax.php?action=login',
                    method: 'POST',
                    data: $(this).serialize(),
                    error: err => {
                        console.log(err)
                        end_load();

                    },
                    success: function(resp) {
                        if (resp == 1) {
                            location.href = 'index.php?page=home';
                        } else {
                            $('#login-form').prepend('<div class="alert alert-danger">Email or password is incorrect.</div>')
                            end_load();
                        }
                    }
                })
            })
        })
    </script>
    <?php include 'footer.php' ?>

</body>

</html>