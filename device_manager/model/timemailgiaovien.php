<?php
include 'connectdb.php';

function timemailgiaovien($idclass)
{
    $conn = connect();
    mysqli_set_charset($conn,'utf8');

    $sql = "select email from account where id_class = '$idclass' and role = 'giaovien'";
    $result = mysqli_query($conn,$sql);
    while ($row = $result->fetch_assoc()) {
        $emailgiaovien = $row['email'];
    }
    return $emailgiaovien;
    $conn->close();
}