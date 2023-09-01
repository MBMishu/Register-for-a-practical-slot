<?php
require_once "./config.php";

$response = array();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = trim($_POST['name']);
    $password1 = trim($_POST['password']);




    $sql = "SELECT * FROM  user";
    $result = mysqli_query($conn, $sql);
    $flag = 0;
    while ($row = $result->fetch_assoc()) {

        $user_name = $row['user_name'];
        $password = $row['password'];
        $id = $row['id'];
        if ($name == $user_name) {
            if ($password1 == $password) {

                $flag = 1;
                break;
            } else {
                $response['error'] = true;
                $response['msg']   = "Password is Wrong!";
            }
        } else {
            $response['error'] = true;
            $response['msg']   = "User does not Exit!";
        }
    }

    if ($flag == 1) {
        $response['error'] = false;
        $response['msg']   = "Log In Successfull";
        session_start();
        $_SESSION["name"] = $user_name;
        $_SESSION["admin"] = true;
        $_SESSION["id"] = $id;
    }
    echo json_encode($response);
}
