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
    <div class="row" >
        <div class="column column-30 col-site-title"><a href="?act=" class="site-title float-left" style="color: #e2e3e5"><img id="logo" src="../../img/logo.png"> </a></div>
        <div class="column column-40 col-search">

        </div>
        <div class="column column-30">
            <div class="user-section"><a href="#">
                    <?php
                    echo "<img src='".$anh."'alt='profile photo' class='circle float-left profile-photo' width='50' height='auto'>";
                    ?>
                    <div class="username">
                        <h4><?php echo $name?></h4>
                        <p style="color: #e2e3e5">Sinh viên</p>
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
                case 'showtang':
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
                case 'dkmuonphong':
                    $ma= $_GET['maphong'];
                    $ngaydangky= $_POST['ngaydangky'];
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
                    header('location:index.php?act=danhsachyeucau');
                    break;
                case 'dktraphong':
                    $mamuon=$_GET['mamuon'];
                    $ma= $_POST['idphong'];
                    $tang= $_POST['idtang'];
                    $ngaydangky= $_POST['ngaydangky'];
                    $thoigianmuon = $_POST['thoigianmuon'];
                    $trangthai='đang chờ xác nhận trả';
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
                    require '../../model/dktraphong.php';
                    header('location:index.php?act=danhsachyeucau');
                    break;
                case 'danhsachyeucau':
                    $ms = $_SESSION['account'];
                    require 'nav_mac_dinh.php';
                    require '../../model/danhsachyeucaumuonphongsv.php';
                    require 'danhsachyeucaumuonphong.php';
                    break;
                case 'danhsachmuon':
                    $ms = $_SESSION['account'];
                    require 'nav_mac_dinh.php';
                    require '../../model/danhsachphongdamuon.php';
                    require 'danhsachphongdamuon.php';
                    break;
                case'huyyeucau':
                    $id_yeu_cau = $_GET['mayeucau'];
                    require 'nav_mac_dinh.php';
                    require '../../model/huyyeucau.php';
                    header('location:index.php?act=danhsachyeucau');
                    break;
                case 'changepass':
                    $email=$_SESSION['email'];
                    $img = $_SESSION['img'];
                    require 'nav_mac_dinh.php';
                    require 'changepass.php';
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

