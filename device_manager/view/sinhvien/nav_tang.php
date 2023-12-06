<?php
    $result=danhsachtang();
?>
<div id="sidebar" class="column">

    <ul>
        <li><h1><a href="index.php?act="> <em class="fa fa-return"></em>Trở về</a></h1></li>
        <?php foreach ($result as $each){
            $id_tang = $each['id_tang'];
            $ten_tang= $each['ten_tang'];
            $phong_trong = demtang($id_tang, $ngay);
            ?>
            <li><a href="index.php?act=showtang&ma=<?php echo $id_tang?>"> <em class="fa fa-home"></em><?php echo $ten_tang ." : ". $phong_trong." đang phòng trống" ?></a></li>
        <?php } ?>
    </ul>
</div>