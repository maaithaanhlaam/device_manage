<?php
$tensinhvien = $_SESSION['name'];
$ma = $_SESSION['account'];
$tongkq = demtracuuyc($noidung,$ngayTimKiem);
$item_per_page = 5;
$currentpage = !empty($_GET['page'])?$_GET['page']:1;
$offset = ($currentpage-1)*$item_per_page;
$sotrang = ceil($tongkq/$item_per_page);
$result = tracuuyc($offset,$noidung,$ngayTimKiem);
?>
<section id="main-content" class="column column-offset-20">
    <h1>
        Danh sách Yêu Cầu Mượn Phòng:
    </h1>
    <form action="index.php?act=lichsuyeucau" method="post">
        <input  class="fa-search " type="text" name="noidungtimkiemlichsu" placeholder="nhập nội dung tìm kiếm" >
        <input type="date" name="ngaytimkiem" >
        <input class="ui-icon-search" type="submit" value="Tìm" name="tim">
    </form>
    <h2>
        Danh sách Phòng:
    </h2>

    <table  class="table" width="100%">
        <thead class="thead-primary">
        <tr>
            <th class="column-10">Mã</th>
            <th class="column-10">Tên Phòng</th>
            <th class="column-10">Mô Tả</th>
            <th class="column-10">Trạng Thái</th>
            <th class="column-10">Ngày Mượn</th>
            <th class="column-10">Sáng</th>
            <th class="column-10">Chiều</th>
            <th class="column-10">Họ Và Tên</th>
            <th class="column-10">Ngày Đăng Ký</th>
        </tr>
        </thead>
        <?php foreach ($result as $each){ ?>
        <tr class="">
            <td ><?php echo $each['id_yeu_cau'] ?></td>
            <td ><?php echo $each['ten_phong'] ?></td>
            <td ><?php echo $each['mo_ta'] ?></td>
            <td ><?php echo $each['trang_thai'] ?></td>
            <td ><?php $ngay_muon_timestamp = strtotime($each['ngay_muon']);
                echo date("d/m/Y",$ngay_muon_timestamp) ?></td>
            <td ><?php if($each['sang'] == 1){
                    echo 'x';
                }
                else{
                    echo '';
                }?></td>
            <td ><?php if($each['chieu'] == 1){
                    echo 'x';
                }
                else{
                    echo '';
                }?></td>
            <td ><?php echo $each['ten_tai_khoan'] .'['.$each['ms'].']'.'['.$each['ten_lop'].']' ?></td>
            <td ><?php $ngay_dang_ky_timestamp = strtotime($each['ngay_dang_ky']);
                echo date("d/m/Y H:i",$ngay_dang_ky_timestamp) ?></td>
        <?php }?>

        </tr>
    </table>
        <?php for($num = 1;$num <= $sotrang;$num++){
                if($currentpage == $num){?>
                    <a class="button" href="index.php?act=lichsuyeucau&page=<?php echo $num?>" style="background-color: #1e7e34"><?php echo $num?></a>
                    <?php }
                else{?>
                    <a class="button" href="index.php?act=lichsuyeucau&page=<?php echo $num?>"><?php echo $num?></a>
                <?php }?>
        <?php }?>

