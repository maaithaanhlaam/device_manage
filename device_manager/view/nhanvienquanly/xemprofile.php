<?php foreach ($result as $each){?>
    <section id="main-content" class="column column-offset-20">
    <div class="">
        <div class="card user-card">
            <div class="card-header">
                <h5>Profile</h5>
            </div>
            <div class="card-block">
                <div class="user-image">
                    <img src="<?php echo $each['img']?>" class="img-radius" alt="User-Profile-Image">
                </div>
                <h6 class="f-w-600 m-t-25 m-b-10"><?php echo $each['ten_tai_khoan']?></h6>
                <p class="text-muted"><?php echo $each['state']?> | <?php echo $each['gioi_tinh']?> | <?php $ngay_sinh_timestamp = strtotime($each['ngay_sinh']);
                    echo date("d/m/Y",$ngay_sinh_timestamp) ?></p>
                <hr>
                <ul class="list-unstyled activity-leval">
                    <li class="active"></li>
                    <li class="active"></li>
                    <li class="active"></li>
                    <li class="active"></li>
                    <li class="active"></li>
                </ul>
                <div class="bg-c-blue counter-block m-t-10 p-20">
                    <div class="row">
                        <div class="col-4">
                            <div class="card-header">
                                <h5>Khoa</h5>
                            </div>
                            <p><?php echo $each['ten_khoa']?></p>
                        </div>
                        <div class="col-4">
                            <div class="card-header">
                                <h5>Lớp</h5>
                            </div>
                            <p><?php echo $each['ten_lop']?></p>
                        </div>
                        <div class="col-4">
                            <div class="card-header">
                                <h5>MSSV</h5>
                            </div>
                            <p><?php echo $each['ms']?></p>
                        </div>
                    </div>
                </div>
                <hr>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card mb-3">
            <div class="card-body">
                <div class="card-header">
                    <h5>Thông Tin Liên Lạc:</h5>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Full Name</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <?php echo $each['ten_tai_khoan']?>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Email</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <?php echo $each['email']?>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Phone</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <?php echo $each['sdt']?>
                    </div>
                </div>

                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Address</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <?php echo $each['dia_chi']?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php }?>
<div class="card">
    <div class="card mb-3">
        <h1>
            Danh sách mượn đã trễ hạn:
        </h1>
        <table  class="table" width="100%">
            <thead class="thead-primary">
            <tr>
                <th class="column-10">Mã</th>
                <th class="column-10">Tên Phòng</th>
                <th class="column-10">Mô Tả</th>
                <th class="column-10">Ngày Mượn</th>
                <th class="column-10">Sáng</th>
                <th class="column-10">Chiều</th>
                <th class="column-10">Họ Và Tên</th>
            </tr>
            </thead>
            <?php foreach ($danhsachtrehan as $row){ ?>
            <tr class="">
                <td ><?php echo $row['id_phong'] ?></td>
                <td ><?php echo $row['ten_phong'] ?></td>
                <td ><?php echo $row['mo_ta'] ?></td>
                <td ><?php $ngay_muon_timestamp = strtotime($row['ngay_muon']);
                    echo date("d/m/Y",$ngay_muon_timestamp) ?></td>
                <td ><?php if($row['sang'] == 1){
                        echo 'x';
                    }
                    else{
                        echo '';
                    }?></td>
                <td ><?php if($row['chieu'] == 1){
                        echo 'x';
                    }
                    else{
                        echo '';
                    }?></td>
                <td ><?php echo $row['ten_tai_khoan'] .'['.$row['ms'].']' ?></td>
            <?php }?>
            </tr>
        </table>
    </div>
</div>
        <div class="card">
            <div class="card mb-3">
                <h1>
                    Danh sách các thiết bị đang mượn:
                </h1>
                <table  class="table" width="100%">
                    <thead class="thead-primary">
                    <tr>
                        <th class="column-10">Mã</th>
                        <th class="column-70">Tên Phòng</th>
                        <th class="column-10">Tầng</th>
                        <th class="column-10">Mô Tả</th>
                        <th class="column-10">Thời Gian</th>
                        <th class="column-10">Sáng</th>
                        <th class="column-10">Chiều</th>
                        <th class="column-10">Họ Và Tên</th>
                    </tr>
                    </thead>
                    <?php foreach ($danhsachphongdamuon as $hang){ ?>
                    <tr class="">
                        <td ><?php echo $hang['id_muon'] ?></td>
                        <td ><?php echo $hang['ten_phong'] ?></td>
                        <td ><?php echo $hang['ten_tang'] ?></td>
                        <td ><?php echo $hang['mo_ta'] ?></td>
                        <td ><?php $ngay_muon_timestamp = strtotime($hang['ngay_muon']);
                            echo date("d/m/Y",$ngay_muon_timestamp) ?></td>
                        <td ><?php if($hang['sang'] == 1){
                                echo 'x';
                            }
                            else{
                                echo '';
                            }?></td>
                        <td ><?php if($hang['chieu'] == 1){
                                echo 'x';
                            }
                            else{
                                echo '';
                            }?></td>
                        <td ><?php echo $hang['ten_tai_khoan'] .'['.$hang['ms'].']' ?></td>
                    </tr>
                    <?php }?>
                </table>
            </div>
        </div>
