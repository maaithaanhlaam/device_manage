

<section id="main-content" class="column column-offset-20">
<?php
    $tensinhvien=$_SESSION['name'];
    $ms=$_SESSION['account'];
    $email=$_SESSION['email'];
    $min = $_SESSION['mindate'];
    $max = $_SESSION['maxdate'];
?>
    <form action="index.php?act=tracuu&ma=<?php echo $ma?> " method="post">
        <h1> Chọn Thời Mốc Thời Gian</h1>
        <a class="close" href="#">&times;</a>
        <input type="date" name="ngay_muon" min="<?php echo $min ?>" max="<?php echo $max ?>" value="<?php echo $ngay?>">
        <input class="submit" type="submit" value="Tìm" name="muon">
    </form>
    <h2>
        Danh Sách Phòng Trống:
    </h2>

    <table  class="table" width="100%">
        <thead class="thead-primary">
        <tr>
            <th class="column-10">Mã</th>
            <th class="column-70">Phòng</th>
            <th class="column-10">Mô Tả</th>
            <th class="column-10">Sáng</th>
            <th class="column-10">Chiều</th>
            <th class="column-10">Mượn</th>
        </tr>
        </thead>
        <?php foreach ($kqtracuulop as $each){ ?>
            <tr class="">
                <td ><?php echo $each['id_phong'] ?></td>
                <td ><?php echo $each['ten_phong'] ?></td>
                <td ><?php echo $each['mo_ta'] ?></td>
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
                <td ><div class="box">
                        <a class="button" href="#popup1&maphong=<?php echo $each['id_phong'] ?>">Mượn</a>
                    </div>
                    <div id="popup1&maphong=<?php echo $each['id_phong']?>" class="overlay">
                        <div class="popup">
                            <?php $ngaydangky = date("Y-m-d");
                            $gio = date("H:i:s");
                            date_default_timezone_set('Asia/Ho_Chi_Minh');
                            $ngaygiodangky = $ngaydangky."T".$gio;?>
                            <form action="index.php?act=dkmuonphong&maphong=<?php echo $each['id_phong']?>" method="post" onsubmit="return validateForm()">
                                <h1> Chọn Thời Mốc Thời Gian</h1>
                                <a class="close" href="#">&times;</a>
                                <label>Phòng: </label>
                                <input type="text" name="tenphong" value="<?php echo $each['ten_phong']?>" readonly>
                                <label>Mô Tả: </label>
                                <input type="text" name="mota" value="<?php echo $each['mo_ta']?>" readonly>
                                <label>người mượn: </label>
                                <input type="text" name="tensinhvien" value="" >
                                <label>MSSV: </label>
                                <input type="text" name="mssv" value="" >
                                <input type="hidden" name="idtang" value="<?php echo $ma?>" >
                                <input type="hidden" name="ngaydangky" value="<?php echo $ngaygiodangky ?>" >
                                <br>
                                <label>Ngày Mượn: </label>
                                <input type="date" id="thoigianmuon" name="thoigianmuon"  value="<?php echo $ngay ?>" readonly>
                                <br>
                                <?php if ($each['sang'] ==1){?>
                                    <input type="checkbox" name="sang" value="1" disabled checked>buổi sáng đã được cho mượn
                                <?php }
                                else{?>
                                    <input type="checkbox" id="sang"  name="sang" value="1">buổi sáng
                                <?php }
                                ?>
                                <?php if ($each['chieu'] == 1){?>
                                    <input type="checkbox" name="chieu" value="1" disabled checked>buổi chiều đã được cho mượn
                                <?php }
                                else{?>
                                    <input type="checkbox" id="chieu" name="chieu" value="1">buổi chiều
                                <?php }
                                ?>
                                <input class="submit" type="submit"  value="Đăng Ký Mượn" name="muon">
                            </form>
                        </div>
                    </div>
                </td>
            </tr>
        <?php } ?>

    </table>
