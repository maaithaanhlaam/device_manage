<?php
include 'connectdb.php';

function checklogin($email,$pass){
    $conn = connect();
    mysqli_set_charset($conn,'utf8');
    $sql = "select * from account where email = '".$email."' and password = '".$pass."'";
    $result = $conn->query($sql);

    if($result->num_rows > 0){

        $row = $result->fetch_assoc();

        return $row;
    }
    else{
        return false;
    }
    $conn->close();
}