<?php
session_start();
$name=$_SESSION['name'];
$anh =$_SESSION['img'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>HTML5 Admin Template</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700" rel="stylesheet">

    <!-- Template Styles -->
    <link rel="stylesheet" href="../../css/font-awesome.min.css">

    <!-- CSS Reset -->
    <link rel="stylesheet" href="../../css/normalize.css">

    <!-- Milligram CSS minified -->
    <link rel="stylesheet" href="../../css/milligram.min.css">

    <!-- Main Styles -->
    <link rel="stylesheet" href="../../css/styles.css">
    <link rel="stylesheet" href="../../css/jquery-ui.theme.min.css">
    <link rel="stylesheet" href="../../css/jquery-ui.min.css">
    <link rel="stylesheet" href="../../css/jquery-ui.structure.css">
    <link rel="stylesheet" href="../../css/jquery-ui.structure.min.css">

    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>

<body>
<div class="navbar" style="background-color: #4e555b">
    <div class="row">
        <div class="column column-30 col-site-title"><a href="?act=" class="site-title float-left" style="color: #e2e3e5"><img id="logo" src="../../img/logo.png"></a></div>
        <div class="column column-40 col-search">

        </div>
        <div class="column column-30">
            <div class="user-section"><a href="#">
                    <?php
                   echo "<img src='".$anh."'alt='profile photo' class='circle float-left profile-photo' width='50' height='auto'>";
                    ?>
                    <div class="username">
                        <h4><?php echo $name?></h4>
                        <p style="color: #e2e3e5">Nhân Viên Quản Lý</p>
                    </div>
                </a></div>
        </div>
    </div>
</div>
<div class="row">

        <?php
            $act='';
            if(isset($_GET['act'])){
                $act = $_GET['act'];
            }
            switch ($act){
                case '':
                    unset($_SESSION['noidungtimkiemyeucaumuonphongphong']);
                    unset($_SESSION['ngaytimkiemyeucaumuonphongphong']);
                    unset($_SESSION['noidungtimkiemyeucautraphong']);
                    unset($_SESSION['ngaytimkiemyeucautraphong']);
                    unset( $_SESSION['noidungtimkiemtrehan']);
                    unset($_SESSION['noidungtimkiemtaikhoanluuy']);
                    unset($_SESSION['noidungtimkiemlichsu']);
                    unset($_SESSION['ngaytimkiemlichsu']);
                    $mssv = $_SESSION['account'];
                    require 'nav_mac_dinh.php';
                    require '../../model/profileuser.php';
                    require '../profileuser.php';
                    break;
                case 'signout':
                    unset($_SESSION['noidungtimkiemyeucaumuonphongphong']);
                    unset($_SESSION['ngaytimkiemyeucaumuonphongphong']);
                    unset($_SESSION['noidungtimkiemyeucautraphong']);
                    unset($_SESSION['ngaytimkiemyeucautraphong']);
                    unset( $_SESSION['noidungtimkiemtrehan']);
                    unset($_SESSION['noidungtimkiemtaikhoanluuy']);
                    unset($_SESSION['noidungtimkiemlichsu']);
                    unset($_SESSION['ngaytimkiemlichsu']);
                    unset($_SESSION['name']);
                    unset($_SESSION['account']);
                    unset($_SESSION['email']);
                    unset($_SESSION['pass']);
                    unset($_SESSION['img']);
                    unset($_SESSION['thoigiantu']);
                    unset($_SESSION['thoihan']);
                    unset( $_SESSION['mindate']);
                    unset( $_SESSION['maxdate']);
                    unset($_SESSION['ngaymuon']);
                    header('location: ../../index.php');
                    break;
                case 'showtang':
                    unset($_SESSION['noidungtimkiemyeucaumuonphongphong']);
                    unset($_SESSION['ngaytimkiemyeucaumuonphongphong']);
                    unset($_SESSION['noidungtimkiemyeucautraphong']);
                    unset($_SESSION['ngaytimkiemyeucautraphong']);
                    unset( $_SESSION['noidungtimkiemtrehan']);
                    unset($_SESSION['noidungtimkiemtaikhoanluuy']);
                    unset($_SESSION['noidungtimkiemlichsu']);
                    unset($_SESSION['ngaytimkiemlichsu']);
                    $ngay = isset($_SESSION['ngaymuon']) ? $_SESSION['ngaymuon'] : date('Y-m-d') ;
                    $ma = isset($_GET['ma'])?$_GET['ma']:1 ;
                    require '../../model/all_tang.php';
                    require '../../model/demtang.php';
                    require '../../model/tracuulop.php';
                    require 'nav_tang.php';
                    require 'allphongtrong.php';
                    break;
                case 'tracuu':
                    $ma= $_GET['ma'];
                    $ngay = $_POST['ngay_muon'];
                    $_SESSION['ngaymuon']=$ngay;
                    require '../../model/all_tang.php';
                    require '../../model/demtang.php';
                    require '../../model/tracuulop.php';
                    require 'nav_tang.php';
                    require 'allphongtrong.php';
                    break;

                case 'danhsachyeucaumuonphong':
                    unset($_SESSION['noidungtimkiemyeucautraphong']);
                    unset($_SESSION['ngaytimkiemyeucautraphong']);
                    unset( $_SESSION['noidungtimkiemtrehan']);
                    unset($_SESSION['noidungtimkiemtaikhoanluuy']);
                    unset($_SESSION['noidungtimkiemlichsu']);
                    unset($_SESSION['ngaytimkiemlichsu']);
                    if(!isset($_SESSION['noidungtimkiemyeucaumuonphong'])&& !isset($_SESSION['ngaytimkiemyeucaumuonphong'])){
                        $noidung = 'phòng ';
                        $ngayTimKiem ='2023';
                    }
                    if(isset($_SESSION['noidungtimkiemyeucaumuonphong'])&& isset($_SESSION['ngaytimkiemyeucaumuonphong'])){
                        $noidung = $_SESSION['noidungtimkiemyeucaumuonphong'];
                        $ngayTimKiem = $_SESSION['ngaytimkiemyeucaumuonphong'];
                    }
                    if(isset($_POST['noidungtimkiemyeucaumuonphong'])) {
                        $ngayTimKiem = $_POST['ngaytimkiem'];
                        $noidung = $_POST['noidungtimkiemyeucaumuonphong'];
                        $_SESSION['noidungtimkiemyeucaumuonphong'] = $noidung;
                        $_SESSION['ngaytimkiemyeucaumuonphong'] = $ngayTimKiem;
                    }
                    require 'nav_mac_dinh.php';
                    require '../../model/danhsachyeucaumuonphong.php';
                    require 'danhsachyeucaumuonphong.php';
                    break;
                case 'danhsachyeucautraphong':
                    unset($_SESSION['noidungtimkiemyeucaumuonphongphong']);
                    unset($_SESSION['ngaytimkiemyeucaumuonphongphong']);
                    unset( $_SESSION['noidungtimkiemtrehan']);
                    unset($_SESSION['noidungtimkiemtaikhoanluuy']);
                    unset($_SESSION['noidungtimkiemlichsu']);
                    unset($_SESSION['ngaytimkiemlichsu']);
                    if(!isset($_SESSION['noidungtimkiemyeucautraphong'])&& !isset($_SESSION['ngaytimkiemyeucautraphong'])){
                        $noidung = 'phòng ';
                        $ngayTimKiem ='2023';
                    }
                    if(isset($_SESSION['noidungtimkiemyeucautraphong'])&& isset($_SESSION['ngaytimkiemyeucautraphong'])){
                        $noidung = $_SESSION['noidungtimkiemyeucautraphong'];
                        $ngayTimKiem = $_SESSION['ngaytimkiemyeucautraphong'];
                    }
                    if(isset($_POST['noidungtimkiemyeucautraphong'])) {
                        $ngayTimKiem = $_POST['ngaytimkiem'];
                        $noidung = $_POST['noidungtimkiemyeucautraphong'];
                        $_SESSION['noidungtimkiemyeucautraphong'] = $noidung;
                        $_SESSION['ngaytimkiemyeucautraphong'] = $ngayTimKiem;
                    }
                    require 'nav_mac_dinh.php';
                    require '../../model/danhsachyeucautraphong.php';
                    require 'danhsachyeucautraphong.php';
                    break;
                case 'xacnhanmuonphong':
                    $id_yeu_cau = $_GET['mayeucau'];
                    $ma = $_POST['idphong'];
                    $tang =  $_POST['idtang'];
                    $id_account= $_POST['mssv'];
                    $thoigianmuon = $_POST['thoigianmuon'];
                    $sang= $_POST['sang'];
                    $chieu= $_POST['chieu'];
                    require 'nav_mac_dinh.php';
                    require '../../model/xacnhanmuonphong.php';
                    header('location:index.php?act=danhsachyeucaumuonphong');
                    break;
                case 'huymuonphong':
                    $id_yeu_cau = $_GET['mayeucau'];
                    require 'nav_mac_dinh.php';
                    require '../../model/huymuonphong.php';
                    header('location:index.php?act=danhsachyeucaumuonphong');
                    break;
                case 'xacnhantraphong':
                    $id_yeu_cau = $_GET['mayeucau'];
                    $idmuon = $_POST['idmuon'];
                    echo $idmuon;
                    $thoigianmuon = $_POST['thoigianmuon'];
                    $idphong = $_POST['idphong'];
                    require 'nav_mac_dinh.php';
                    require '../../model/xacnhantraphong.php';
/*                    header('location:index.php?act=danhsachyeucautraphong');*/
                    break;
                case 'danhsachtrehan':
                    unset($_SESSION['noidungtimkiemyeucaumuonphongphong']);
                    unset($_SESSION['ngaytimkiemyeucaumuonphongphong']);
                    unset($_SESSION['noidungtimkiemyeucautraphong']);
                    unset($_SESSION['ngaytimkiemyeucautraphong']);
                    unset($_SESSION['ngaytimkiemlichsu']);
                    unset($_SESSION['noidungtimkiemtaikhoanluuy']);
                    unset($_SESSION['noidungtimkiemlichsu']);
                    $ngaymuon = date('Y-m-d');
                    if(!isset($_SESSION['noidungtimkiemtrehan'])){
                        $noidung = '2023';
                    }
                    if(isset($_SESSION['noidungtimkiemtrehan'])){
                        $noidung = $_SESSION['noidungtimkiemtrehan'];
                    }
                    if(isset($_POST['noidungtimkiemtrehan'])) {
                        $noidung = $_POST['noidungtimkiemtrehan'];
                        $_SESSION['noidungtimkiemtrehan'] = $noidung;
                    }
                    require 'nav_mac_dinh.php';
                    require '../../model/danhsachtrehan.php';
                    require 'danhsachtrehan.php';
                    break;
                case 'dkmuonphong':
                    $ma= $_GET['maphong'];
                    $tang= $_POST['idtang'];
                    $thoigianmuon = $_POST['thoigianmuon'];
                    $trangthai='đang chờ xác nhận mượn';
                    if(isset($_POST['sang'])){
                        $sang = $_POST['sang'];
                    }
                    else{
                        $sang = 0;
                    }
                    if(isset($_POST['chieu'])){
                        $chieu = $_POST['chieu'];
                    }
                    else{
                        $chieu = 0;
                    }
                    $id_account = $_POST['mssv'];
                    require '../../model/dkmuon.php';
                    header('location:index.php?act=danhsachyeucaumuonphong');
                    break;
                case 'guimailcanhcao':
                    $email= $_POST['email'];
                    $idmuon = $_GET['mamuon'];
                    $tenphong = $_POST['tenphong'];
                    $tensinhvien = $_POST['tensinhvien'];
                    $mssv = $_POST['mssv'];
                    $ngaymuon = $_POST['thoigianmuon'];
                    $sang = $_POST['sang'];
                    $chieu= $_POST['chieu'];
                    require '../../model/guimail.php';
                    header('location:index.php?act=danhsachtrehan');
                    break;
                case 'danhsachtaikhoanluuy':
                    unset($_SESSION['noidungtimkiemyeucaumuonphongphong']);
                    unset($_SESSION['ngaytimkiemyeucaumuonphongphong']);
                    unset($_SESSION['noidungtimkiemyeucautraphong']);
                    unset($_SESSION['ngaytimkiemyeucautraphong']);
                    unset( $_SESSION['noidungtimkiemtrehan']);
                    unset($_SESSION['noidungtimkiemlichsu']);
                    unset($_SESSION['ngaytimkiemlichsu']);
                    if(!isset($_SESSION['noidungtimkiemtaikhoanluuy'])){
                        $noidung = '1';
                    }
                    if(isset($_SESSION['noidungtimkiemtaikhoanluuy'])){
                        $noidung = $_SESSION['noidungtimkiemtaikhoanluuy'];
                    }
                    if(isset($_POST['noidungtimkiemtaikhoanluuy'])) {
                        $noidung = $_POST['noidungtimkiemtaikhoanluuy'];
                        $_SESSION['noidungtimkiemtaikhoanluuy'] = $noidung;
                    }
                    require 'nav_mac_dinh.php';
                    require '../../model/danhsachtaikhoanluuy.php';
                    require 'danhsachtaikhoanluuy.php';
                    break;
                case 'vohieuhoataikhoan':
                    $mssv = $_POST['mssv'];
                    $tenphong = $_POST['tenphong'];
                    $tensinhvien = $_POST['tensinhvien'];
                    $ngaymuon = $_POST['thoigianmuon'];
                    $email= $_POST['email'];
                    $idclass = $_POST['idclass'];
                    $idmuon = $_POST['mamuon'];
                    require '../../model/vohieuhoataikhoan.php';
                    header('location:index.php?act=danhsachtaikhoanluuy');
                    break;
                case 'kichhoattaikhoan':
                    $idluuy=$_GET['maluuy'];
                    $mssv = $_POST['mssv'];
                    $tensinhvien = $_POST['tensinhvien'];
                    $email= $_POST['email'];
                    $idclass = $_POST['idclass'];
                    $idmuon = $_POST['mamuon'];
                    require '../../model/kichhoattaikhoan.php';
                    header('location:index.php?act=danhsachtaikhoanluuy');
                    break;
                case 'changepass':
                    unset($_SESSION['noidungtimkiemyeucaumuonphongphong']);
                    unset($_SESSION['ngaytimkiemyeucaumuonphongphong']);
                    unset($_SESSION['noidungtimkiemyeucautraphong']);
                    unset($_SESSION['ngaytimkiemyeucautraphong']);
                    unset( $_SESSION['noidungtimkiemtrehan']);
                    unset($_SESSION['noidungtimkiemtaikhoanluuy']);
                    unset($_SESSION['noidungtimkiemlichsu']);
                    unset($_SESSION['ngaytimkiemlichsu']);
                    $img=$_SESSION['img'];
                    $email = $_SESSION['email'];
                    require 'nav_mac_dinh.php';
                    require 'changepass.php';
                    break;
                case 'lichsuyeucau':
                    unset($_SESSION['noidungtimkiemyeucaumuonphongphong']);
                    unset($_SESSION['ngaytimkiemyeucaumuonphongphong']);
                    unset($_SESSION['noidungtimkiemyeucautraphong']);
                    unset($_SESSION['ngaytimkiemyeucautraphong']);
                    unset( $_SESSION['noidungtimkiemtrehan']);
                    unset($_SESSION['noidungtimkiemtaikhoanluuy']);
                    if(!isset($_SESSION['noidungtimkiemlichsu'])&& !isset($_SESSION['ngaytimkiemlichsu'])){
                        $noidung = 'phòng ';
                        $ngayTimKiem ='2023';
                    }
                    if(isset($_SESSION['noidungtimkiemlichsu'])&& isset($_SESSION['ngaytimkiemlichsu'])){
                        $noidung = $_SESSION['noidungtimkiemlichsu'];
                        $ngayTimKiem = $_SESSION['ngaytimkiemlichsu'];
                    }
                    if(isset($_POST['noidungtimkiemlichsu'])) {
                        $ngayTimKiem = $_POST['ngaytimkiem'];
                        $noidung = $_POST['noidungtimkiemlichsu'];
                        $_SESSION['noidungtimkiemlichsu'] = $noidung;
                        $_SESSION['ngaytimkiemlichsu'] = $ngayTimKiem;
                    }
                    require 'nav_mac_dinh.php';
                    require '../../model/lichsuyeucau.php';
                    require 'lichsuyeucau.php';
                    break;
                case 'xemprofile':
                    $mssv = $_GET['mssv'];
                    $ngaymuon = date('Y-m-d');
                    require '../../model/profileuser.php';
                    require '../../model/thongtinsinhvien.php';
                    require 'nav_mac_dinh.php';
                    require 'xemprofile.php';
                    break;
            }
        ?>
    </section>
</div>
<script>
    document.getElementById('hienthimatkhau').addEventListener('change', function() {
        var matkhaucu = document.getElementsByName('matkhaucu')[0];
        var matkhaumoi = document.getElementsByName('matkhaumoi')[0];
        var xacnhanlaimatkhau = document.getElementsByName('matkhaumoi2')[0];

        if (this.checked) {
            matkhaucu.type = 'text';
            matkhaumoi.type = 'text';
            xacnhanlaimatkhau.type = 'text';
        } else {
            matkhaucu.type = 'password';
            matkhaumoi.type = 'password';
            xacnhanlaimatkhau.type = 'password';
        }
    });

</script>

</body>
</html>

