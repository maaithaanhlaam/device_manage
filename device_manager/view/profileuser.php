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
                    <hr>

                </div>
            </div>
<?php }?>