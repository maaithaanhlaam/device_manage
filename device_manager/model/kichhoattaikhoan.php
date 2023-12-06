<?php
include 'connectdb.php';
include 'sendmail.php';

$conn = connect();
mysqli_set_charset($conn,'utf8');

$sql = "select email from account where id_class = '$idclass' and role = 'giaovien'";
$result = mysqli_query($conn,$sql);
while ($row = $result->fetch_assoc()) {
    $emailgiaovien = $row['email'];
}

$noidungemail = "<p>thư thông báo kích hoạt lại tài khoản gửi đến anh/chị: ".$tensinhvien."</p>
                   <p>mssv: ".$mssv." </p>
                   <p>Cảm ơn anh/chị đã hợp tác, hi vọng sẽ không có tình huống tương tự xảy ra. Anh chị nên có trách nhiệm hơn trong việc bảo quản thiết bị của nhà trường</p>";
$mail = new Mailer();
$tieude='Alert Message';

$mail->guimailcanhbao($email,$tieude,$noidungemail);

$mailgiaovien = new Mailer();
$noidungemailgiaovien = "<p>thư thông báo đã kích hoạt lại tài khoản sinh viên thuộc lớp quản lý của anh/chị </p>
                    <p>Tên sinh viên: ".$tensinhvien."</p>
                     <p>Email sinh viên: ".$email."</p>
                   <p>mssv: ".$mssv." </p>
                   <p>Anh/chị có trách nhiệm nhắc nhở sinh viên ".$tensinhvien." chú ý hơn trong công việc bảo quản trang thiết bị của trường</p>";
$mailgiaovien->guimailcanhbao($emailgiaovien,$tieude,$noidungemailgiaovien);

$xoakhoidanhsachchuy="delete from danh_sach_luu_y
                      where id_account  = '$mssv'";
$truyvanxoakhoidanhsachchuy = mysqli_query($conn,$xoakhoidanhsachchuy);

$setdanhsachmuonphong = "update danh_sach_muon_phong
                         set sang = '0', chieu = '0'
                         where id_muon = '$idmuon'";
$truyvansetdanhsachmuonphong = mysqli_query($conn,$setdanhsachmuonphong);

$kichhoattaikhoan = "UPDATE account
            SET state = 'kích hoạt'
            where ms ='$mssv'";
$kichhoat = mysqli_query($conn,$kichhoattaikhoan);
$conn->close();