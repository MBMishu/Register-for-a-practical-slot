<?php

require_once "./config.php";

$slot1 = "SELECT * FROM slot WHERE time ='Monday 15:00-17:00'";
$result = mysqli_query($conn, $slot1);
$row = $result->fetch_assoc();
$seat1 = $row['seat'];

$slot2 = "SELECT * FROM slot WHERE time ='Tuesday 14:00-16:00'";
$result2 = mysqli_query($conn, $slot2);
$row2 = $result2->fetch_assoc();
$seat2 = $row2['seat'];


$slot3 = "SELECT * FROM slot WHERE time ='Thursday 11:00-13:00'";
$result3 = mysqli_query($conn, $slot3);
$row3 = $result3->fetch_assoc();
$seat3 = $row3['seat'];



$slot4 = "SELECT * FROM slot WHERE time ='Friday 10:00-12:00'";
$result4 = mysqli_query($conn, $slot4);
$row4 = $result4->fetch_assoc();
$seat4 = $row4['seat'];

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>practical slot Booking</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- style css -->
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Slot Booking</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse " id="navbarNavAltMarkup">
            <div class="navbar-nav ml-auto">
                <a class="nav-item nav-link active" href="./index.php">Home <span class="sr-only">(current)</span></a>
                <a class="nav-item nav-link" href="./login.php">login</a>

            </div>
        </div>
    </nav>

    <section class="container">
        <h1 class="text-danger mt-2"> COMP207 - Register here for a practical slot</h1>
        <p class="text-capitalize">
            <strong>
                register only if you know what you are doing.
            </strong>
        </p>
        <ul class="text-capitalize">

            <li>
                please enter all information and select your desired day.please enter a correct SID number!
            </li>
            <li>
                please check the number of available seats before submitting.

            </li>
            <li>
                register only one slot.
            </li>
            <li>
                Any problems? write a message to <a href="mailto:weberb@csc.liv.ac.uk"
                    class="text-danger">weberb@csc.liv.ac.uk</a>
            </li>
        </ul>
        <form action="" method="POST" class="slot-form">

            <div class="row mt-3">
                <div class="col-3">
                    <label for="exampleInputPassword1"> Name</label>
                    <div class="input-group-prepend">

                        <input type="text" class="form-control" id="name" name="name" placeholder="name" required="">
                    </div>
                </div>
                <div class="col-3">
                    <label for="exampleInputPassword1">Firstname</label>
                    <div class="input-group-prepend">

                        <input type="text" class="form-control" id="first_name" name="first_name"
                            placeholder="first_name" required>
                    </div>
                </div>
                <div class="col-3">
                    <label for="exampleInputPassword1"> SID -</label>
                    <div class="input-group-prepend">

                        <input type="number" class="form-control" id="sid" name="sid" placeholder="your sid" required>
                    </div>
                </div>
                <div class="col-3">
                    <label for="exampleInputPassword1"> Email -</label>
                    <div class="input-group-prepend">

                        <input type="email" class="form-control" id="email" name="email" placeholder="email@gmail.com"
                            required>
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-3 mx-auto my-auto ">
                    <label for="exampleInputPassword1"> Select the practical slot -</label>

                </div>
                <div class="col-9">
                    <select multiple class="form-control" name="time_slot" required>
                        <option value="Monday 15:00-17:00">Monday 15:00-17:00 &emsp; <?php echo $seat1 ?> seats
                            remaining
                        </option>
                        <option value="Tuesday 14:00-16:00">Tuesday 14:00-16:00 &emsp; <?php echo $seat2 ?> seats
                            remaining
                        </option>
                        <option value="Thursday 11:00-13:00">Thursday 11:00-13:00 &emsp; <?php echo $seat3 ?> seats
                            remaining
                        </option>
                        <option value="Friday 10:00-12:00">Friday 10:00-12:00 &emsp; <?php echo $seat4 ?> seats
                            remaining
                        </option>

                    </select>

                </div>
            </div>





            <div class="text-center mt-4">
                <button class="btn btn-success text-uppercase" type="button" name="sendmsg" id="registerButton">Register
                </button>
                <button class="btn btn-danger text-uppercase" type="button" name="clear" id="clearButton">clear
                </button>

            </div>
        </form>
    </section>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script src="./js/alert.min.js"></script>
    <script>
    $("#registerButton").click(function() {
        var name = $("#name").val();
        var first_name = $("#first_name").val();
        var sid = $("#sid").val();
        var email = $("#email").val();

        if (email == "" || name == "" || first_name == "") {
            swal.fire("Error!", "Info Missing", "error");
        } else {
            swal.fire("Processing", "", "warning");

            $.ajax({
                type: "POST",
                url: 'submitForm.php',
                data: $('.slot-form').serialize(),
                dataType: "JSON",
                success: function(data) {
                    if (data.error) {
                        swal.fire("Error!", data.msg, "error");
                    } else {

                        swal.fire("success!", data.msg, "success").then(okay => {
                            if (okay) {
                                window.location.replace("./");
                            }
                        });

                        // window.location.replace("dashboard.php")

                    }
                }

            });
        }
    });
    </script>

</body>

</html>