<?php
include 'connectdb.php';

$conn = connect();
mysqli_set_charset($conn,'utf8');

$sql = "UPDATE account
            SET password = '$matkhaumoi'
            where email ='$email' ";
$result = mysqli_query($conn,$sql);