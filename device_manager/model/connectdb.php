<?php
if(!function_exists('connect')){
    function connect()
    {
        $servername = "localhost";
        $dbusername = "root";
        $dbpassword = "";
        $dbname = "web_dau_mange";

        $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

        // Kiểm tra kết nối
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        return $conn;
    }
}


