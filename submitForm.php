<?php
require_once "./config.php";
$response = array();


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = trim($_POST['name']);
    $first_name = trim($_POST['first_name']);
    $sid = trim($_POST['sid']);
    $email = trim($_POST['email']);
    $time_slot = trim($_POST['time_slot']);




    $check_query = "SELECT * FROM students WHERE student_id='$sid'";
    $check_result = $conn->query($check_query);


    if ($check_result->num_rows > 0) {
        $response['error'] = true;
        $response['msg']   = "You are already registered!";
    } else {


        $slot = "SELECT * FROM slot WHERE time ='$time_slot'";
        $result = mysqli_query($conn, $slot);
        $row = $result->fetch_assoc();

        if ($row['seat'] > 0) {
            $sql1 = "INSERT INTO students(name, student_id, email, first_name, time_slot)
            VALUES ('$name', '$sid', '$email','$first_name', '$time_slot')";

            $sql2 = "UPDATE slot SET seat = seat-1 WHERE time ='$time_slot'";
            mysqli_query($conn, $sql2);

            if (!mysqli_query($conn, $sql1)) {
                $response['error'] = true;
                $response['msg']   = "Connection Failed! Try Again!";;
            } else {
                $response['error'] = false;
                $response['msg']   = "Slot Booked";
            }
        } else {
            $response['error'] = true;
            $response['msg']   = "All Slot are Booked.Try Another Slot.";
        }
    }






    echo json_encode($response);
}
