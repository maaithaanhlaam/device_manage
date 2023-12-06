<?php
    $tensinhvien = $_SESSION['name'];
    $ma = $_SESSION['account'];
    $tongkq = demkqtracuutra();
    $item_per_page = 5;
    $currentpage = !empty($_GET['page'])?$_GET['page']:1;
    $offset = ($currentpage-1)*$item_per_page;
    $sotrang = ceil($tongkq/$item_per_page);
    $result = tracuuyctraphong($offset);
?>
<section id="main-content" class="column column-offset-20">
<h1>
    Danh sách Yêu Cầu Trả Phòng:
</h1>
<br>
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
        <th class="column-10">Xác Nhận</th>
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
            <td ><div class="box">
                    <a class="button" href="#popup1&mayeucau=<?php echo $each['id_yeu_cau'] ?>">Xác Nhận</a>
                </div>
                <div id="popup1&mayeucau=<?php echo $each['id_yeu_cau'] ?>" class="overlay">
                    <div class="popup">
                        <form action="index.php?act=xacnhantraphong&mayeucau=<?php echo $each['id_yeu_cau'] ?>" method="post">
                            <h1> Chọn Thời Mốc Thời Gian</h1>
                            <a class="close" href="#">&times;</a>
                            <label>Phòng: </label>
                            <input type="text" name="tenphong" value="<?php echo $each['ten_phong']?>" readonly>
                            <label>Mô Tả: </label>
                            <input type="text" name="mota" value="<?php echo $each['mo_ta']?>" readonly>
                            <label>người mượn: </label>
                            <input type="text" name="tensinhvien" value="<?php echo $each['ten_tai_khoan']?>" readonly>
                            <label>MSSV: </label>
                            <input type="text" name="mssv" value="<?php echo $each['ms']?>" readonly>
                            <input type="hidden" name="idtang" value="<?php echo $each['id_tang']?>" >
                            <input type="hidden" name="idphong" value="<?php echo $each['id_phong']?>" >
                            <input type="hidden" name="idmuon" value="<?php echo $each['id_muon']?>" >
                            <br>
                            <label>Ngày Mượn: </label>
                            <input type="date" id="thoigianmuon" name="thoigianmuon"  value="<?php echo $each['ngay_muon'] ?>" readonly>
                            <br>
                            <?php if ($each['sang'] ==1){?>
                                <input type="checkbox" name="sang" value="1" disabled checked>buổi sáng
                                <input type="hidden" name="sang" value=1 >
                            <?php }
                            else{?>
                                <input type="checkbox"  name="sang" value="1" disabled>buổi sáng
                                <input type="hidden" name="sang" value=0 >
                            <?php }
                            ?>
                            <?php if ($each['chieu'] == 1){?>
                                <input type="checkbox" name="chieu" value="1"disabled checked>buổi chiều
                                <input type="hidden" name="chieu" value="1" >
                            <?php }
                            else{?>
                                <input type="checkbox" name="chieu" value="1" disabled >buổi chiều
                                <input type="hidden" name="chieu" value="0" >
                            <?php }
                            ?>
                            <input class="submit" type="submit" value="Xác Nhận Cho Trả" name="tra">
                        </form>
                    </div>
                </div>
            </td>
        </tr>
    <?php } ?>
</table>
    <?php for($num = 1;$num <= $sotrang;$num++){
        if($currentpage == $num){?>
            <a class="button" href="index.php?act=danhsachyeucautraphong&page=<?php echo $num?>" style="background-color: #1e7e34"><?php echo $num?></a>
        <?php }
        else{?>
            <a class="button" href="index.php?act=danhsachyeucautraphong&page=<?php echo $num?>"><?php echo $num?></a>
        <?php }?>
    <?php }?>
