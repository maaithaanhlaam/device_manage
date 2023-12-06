<?php
include 'connectdb.php';

function danhsachlop(){
    $conn = connect();
    mysqli_set_charset($conn,'utf8');

    $sql = "select * from class";
    $result  = mysqli_query($conn,$sql);

    return $result;
}
