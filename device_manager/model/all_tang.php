<?php

include 'connectdb.php';
function danhsachtang(){
    $conn = connect();
    mysqli_set_charset($conn,'utf8');
    $sql="select * from tang";
    $result = mysqli_query($conn,$sql);
    return $result;
    $conn->close();
}
function demkqtang(){
    $conn = connect();
    mysqli_set_charset($conn,'utf8');
    $sql="select * from tang";
    $result = mysqli_query($conn,$sql);
    return $result->num_rows;
    $conn->close();
}
function phantrangdanhsachtang($offset){
    $conn = connect();
    mysqli_set_charset($conn,'utf8');
    $sql="select * from tang  order by id_tang desc LIMIT 5 offset ".$offset."" ;
    $result = mysqli_query($conn,$sql);
    return $result;
    $conn->close();
}