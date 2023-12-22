<?php
include 'connectdb.php';
include 'sendmail.php';
$conn = connect();
mysqli_set_charset($conn,'utf8');

$sql = "select email from account where id_class = '$idclass' and role = 'giaovien'";
$result = mysqli_query($conn,$sql);
foreach ($result as $row) {
    $emailgiaovien = $row['email'];
    $mailgiaovien = new Mailer();
    $tieude='Alert Message';
    $noidungemailgiaovien = "<p>thư thông báo admin kích hoạt tài khoản sinh viên thuộc lớp quản lý của anh/chị </p>
                   <p>Tên sinh viên: ".$tensinhvien."</p>
                     <p>Email sinh viên: ".$email."</p>
                   <p>mssv: ".$ma." </p>
                   <p>Anh/chị có trách nhiệm nhắc nhở sinh viên ".$tensinhvien." </p>";
    $mailgiaovien->guimailcanhbao($emailgiaovien,$tieude,$noidungemailgiaovien);
}

$noidungemail = "<p>thư thông báo admin kích hoạt tài khoản gửi đến anh/chị: ".$tensinhvien."</p>
                   <p>mssv: ".$ma." </p>
                   <p>Chúc anh chị có một ngày tốt lành</p>";
$mail = new Mailer();
$tieude='Alert Message';

$mail->guimailcanhbao($email,$tieude,$noidungemail);






$vohieutaikhoan = "UPDATE account
            SET state = 'kích hoạt'
            where ms ='$ma'";
$vohieu = mysqli_query($conn,$vohieutaikhoan);
$conn->close();