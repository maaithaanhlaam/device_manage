<?php
    $tensinhvien = $_SESSION['name'];
    $ma = $_SESSION['account'];
    $tongkq = demkqtracuumuon($ms);
    $item_per_page = 5;
    $currentpage = !empty($_GET['page'])?$_GET['page']:1;
    $offset = ($currentpage-1)*$item_per_page;
    $sotrang = ceil($tongkq/$item_per_page);
    $result = tracuuycmuonphongsv($ma,$offset);
?>
<section id="main-content" class="column column-offset-20">
<h1>
    Danh sách Yêu Cầu Của Bạn:
</h1>
<br>
<h2>
    Danh sách Phòng:
</h2>

<table  class="table" width="100%">
    <thead class="thead-primary">
    <tr>
        <th class="column-10">Mã</th>
        <th class="column-70">Tên Phòng</th>
        <th class="column-10">Mô Tả</th>
        <th class="column-10">Trạng Thái</th>
        <th class="column-10">Ngày Mượn</th>
        <th class="column-10">Sáng</th>
        <th class="column-10">Chiều</th>
        <th class="column-10">Hủy</th>
    </tr>
    </thead>
    <?php foreach ($result as $each){
        if ($each['trang_thai'] == 'đang chờ xác nhận mượn'||$each['trang_thai'] == 'đang chờ xác nhận trả'){
        ?>
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
            <td><a class="button" href="index.php?act=huyyeucau&mayeucau=<?php echo $each['id_yeu_cau']?>" style="background-color: #bd2130"> Hủy</a></td>
        </tr>
        <?php } ?>
        <?php if ($each['trang_thai'] == 'đã xác nhận mượn'|| $each['trang_thai'] == 'đã xác nhận trả'||$each['trang_thai'] == 'hủy yêu cầu mượn'){?>
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
                <td><a class="button" href="index.php?act=huyyeucau&mayeucau=<?php $each['id_yeu_cau']?>" disabled> Hủy</a></td>
            </tr>
        <?php } ?>
    <?php } ?>
</table>
    <?php for($num = 1;$num <= $sotrang;$num++){
        if($currentpage == $num){?>
            <a class="button" href="index.php?act=danhsachyeucau&page=<?php echo $num?>" style="background-color: #1e7e34"><?php echo $num?></a>
        <?php }
        else{?>
            <a class="button" href="index.php?act=danhsachyeucau&page=<?php echo $num?>"><?php echo $num?></a>
        <?php }?>
    <?php }?>

