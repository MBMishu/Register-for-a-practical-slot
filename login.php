<?php

session_start();

if (isset($_SESSION['admin'])) {
    header("location: ./home.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>practical slot Booking</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- style css -->
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>

    <section>
        <div class="row my-3">
            <!-- form area -->
            <div class="col-lg-4 col-md-4 col-sm-12 form-area mx-auto">
                <div class="card">
                    <div class="card-body shadow-lg">
                        <form action="" method="POST" class="login-form">
                            <div class="form-group">
                                <label for="exampleInputPassword1"> Username -</label>
                                <div class="input-group-prepend">

                                    <input type="text" class="form-control" id="name" name="name" placeholder="username" required="">
                                </div>
                                <label for="exampleInputPassword1"> Password -</label>
                                <div class="input-group-prepend">
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter Your Password" required="">
                                </div>


                            </div>
                            <div class="text-center">
                                <button class="btn btn-warning text-uppercase" type="button" name="sendmsg" id="registerButton">sign in
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script src="./js/alert.min.js"></script>

    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.js">
    </script>

    <Script>
        $("#registerButton").click(function() {

            var name = $("#name").val();
            var password = $("#password").val();

            if (name == "" || password == "") {
                swal.fire("Error!", "Info Missing", "error");
            } else {
                swal.fire("Processing", "", "warning");

                $.ajax({
                    type: "POST",
                    url: 'loginFrom.php',
                    data: $('.login-form').serialize(),
                    dataType: "JSON",
                    success: function(data) {
                        if (data.error) {
                            swal.fire("Error!", data.msg, "error");
                        } else {

                            window.location.replace("./home.php");


                        }
                    }

                });
            }
        });
    </Script>
</body>

</html>