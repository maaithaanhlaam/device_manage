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
        <div class="column column-30 col-site-title"><a href="?act=" class="site-title float-left" style="color: #e2e3e5"><img id="logo" src="../../img/logo.png"> </a></div>

        <div class="column column-30">
            <div class="user-section"><a href="#">
                    <?php
                    echo "<img src='".$anh."'alt='profile photo' class='circle float-left profile-photo' width='50' height='auto'>";
                    ?>
                    <div class="username">
                        <h4><?php echo $name?></h4>
                        <p style="color: #e2e3e5">Admin</p>
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
            $mssv = $_SESSION['account'];
            require 'nav_mac_dinh.php';
            require '../../model/profileuser.php';
            require '../profileuser.php';
            break;
        case 'signout':
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
        case 'changepass':
            $email=$_SESSION['email'];
            $img = $_SESSION['img'];
            require 'nav_mac_dinh.php';
            require 'changepass.php';
            break;
        case 'danhsachphong':
            require 'nav_mac_dinh.php';
            require '../../model/all_tang.php';
            require '../../model/quanlyphonghoc.php';
            require 'quanlyphonghoc.php';
            break;
        case 'capnhatthongtinphong':
            $tenphong = $_POST['tenphong'];
            $mota = $_POST['mota'];
            $idtang = $_POST['tang'];
            $ma = $_GET['maphong'];
            require '../../model/capnhatthongtinphong.php';
            header('location:index.php?act=danhsachphong');
            break;
        case 'xoaphong':
            $ma = $_GET['maphong'];
            require '../../model/xoaphong.php';
            header('location:index.php?act=danhsachphong');
            break;
        case 'themphong':
            require '../../model/all_tang.php';
            require 'themphong.php';
            break;
        case 'themphonghoc':
            $tenphong = $_POST['tenphong'];
            $mota = $_POST['mota'];
            $idtang= $_POST['tang'];
            require '../../model/themphong.php';
            header('location:index.php?act=danhsachphong');
            break;
        case 'danhsachtang':
            require 'nav_mac_dinh.php';
            require '../../model/all_tang.php';
            require 'quanlytang.php';
            break;
        case 'capnhatthongtintang':
            $tentang = $_POST['tentang'];
            $ma = $_GET['matang'];
            require '../../model/capnhatthongtintang.php';
            header('location:index.php?act=danhsachtang');
            break;
        case 'themtang':
            require '../../model/all_tang.php';
            require 'nav_mac_dinh.php';
            require 'themtang.php';
            break;
        case 'themtanghoc':
            $tentang = $_POST['tentang'];
            require '../../model/themtang.php';
            header('location:index.php?act=danhsachtang');
            break;
        case 'xoatang':
            $ma = $_GET['matang'];
            require '../../model/xoatang.php';
            header('location:index.php?act=danhsachtang');
            break;
        case 'danhsachtaikhoan':
            require 'nav_mac_dinh.php';
            require '../../model/danhsachtaikhoan.php';
            require '../../model/demlop.php';
            require 'quanlytaikhoan.php';
            break;
        case 'capnhatthongtintaikhoan':
            $tentaikhoan = $_POST['tentaikhoan'];
            $pass = $_POST['pass'];
            $email = $_POST['email'];
            $role = $_POST['role'];
            $idlop = $_POST['lop'];
            $img = $_POST['img'];
            $state = $_POST['state'];
            $ngaysinh = $_POST['ngaysinh'];
            $gioitinh = $_POST['gioitinh'];
            $diachi = $_POST['diachi'];
            $sdt = $_POST['sdt'];
            $ma = $_GET['mataikhoan'];
            require '../../model/capnhatthongtintaikhoan.php';
            header('location:index.php?act=danhsachtaikhoan');
            break;
        case 'themtaikhoan':
            require '../../model/demlop.php';
            require 'nav_mac_dinh.php';
            require 'themtaikhoan.php';
            break;
        case 'addaccount':
            $tentaikhoan = $_POST['tentaikhoan'];
            $pass = md5($_POST['pass']);
            $email = $_POST['email'];
            $role = $_POST['role'];
            $idlop = $_POST['lop'];
            $img = $_POST['img'];
            $state = $_POST['state'];
            $ngaysinh = $_POST['ngaysinh'];
            $gioitinh = $_POST['gioitinh'];
            $diachi = $_POST['diachi'];
            $sdt = $_POST['sdt'];
            $ma = $_POST['ms'];
            require '../../model/themtaikhoan.php';
            header('location:index.php?act=danhsachtaikhoan');
            break;
        case 'vohieuhoa':
            $tensinhvien = $_POST['tentaikhoan'];
            $email = $_POST['email'];
            $idclass = $_POST['idclass'];
            $ma = $_GET['mataikhoan'];
            require '../../model/adminvohieutaikhoan.php';
            header('location:index.php?act=danhsachtaikhoan');
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

