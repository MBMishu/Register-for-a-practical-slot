<?php

session_start();
if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
    header("location: ./login.php");
}
$name = $_SESSION['name'];
include "./config.php";
error_reporting(0);
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
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.css" />


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
                <a class="nav-item nav-link " href="./">Home </a>
                <a class="nav-item nav-link active" href="./logout.php">Logout<span class="sr-only">(current)</span></a>

            </div>
        </div>
    </nav>

    <section class="container">

        <div class="row">

            <div class="col-lg-5 col-md-5 order-lg-1">
                <h1 class="text-danger mt-2"> COMP207 - Remaining practical slot</h1>
                <table id="table_id_2" class="display mt-3">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Time</th>
                            <th>Seat</th>

                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $sql2 = "SELECT * FROM slot";
                        $result2 = mysqli_query($conn, $sql2);
                        $count = 1;
                        while ($row = $result2->fetch_assoc()) {
                        ?>
                        <tr>
                            <td><?php echo $count; ?></td>
                            <td><?php echo $row['time']; ?></td>
                            <td><?php echo $row['seat']; ?></td>
                        </tr>
                        <?php
                            $count += 1;
                        }
                        ?>
                    </tbody>
                </table>
            </div>

            <div class="col-lg-7 col-md-7">

                <h1 class="text-danger mt-2"> COMP207 - Booked practical slot</h1>

                <table id="table_id" class="display mt-3">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>First Name</th>
                            <th>Student Id</th>
                            <th>Email</th>
                            <th>Time Slot</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql1 = "SELECT * FROM students";
                        $result1 = mysqli_query($conn, $sql1);
                        $count = 1;
                        while ($row = $result1->fetch_assoc()) {
                        ?>
                        <tr>
                            <td><?php echo $count; ?></td>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['first_name']; ?></td>
                            <td><?php echo $row['student_id']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['time_slot']; ?></td>

                        </tr>
                        <?php
                            $count += 1;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>



    </section>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script src="./js/alert.min.js"></script>

    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.js">
    </script>

    <script>
    $(document).ready(function() {
        $("#table_id").DataTable();
        $("#table_id_2").DataTable();
    });
    </script>
</body>

</html>