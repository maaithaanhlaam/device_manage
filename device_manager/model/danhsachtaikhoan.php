<?php
include 'connectdb.php';
function danhsachtaikhoan($offset){
    $conn = connect();
    mysqli_set_charset($conn,'utf8');

    $sql = "select * from account
         left join class on account.id_class = class.id_class
         order by ms asc LIMIT 5 offset ".$offset." ";
    $result = mysqli_query($conn, $sql);

    return $result;
    $conn->close();
}
function demtaikhoan(){
    $conn = connect();
    mysqli_set_charset($conn,'utf8');

    $sql = "select * from account order by ms asc  ";
    $result = mysqli_query($conn, $sql);

    return $result->num_rows;
    $conn->close();
}