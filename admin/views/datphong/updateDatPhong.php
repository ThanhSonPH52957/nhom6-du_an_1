<?php include './views/layout/header.php'; ?>
<!-- Navbar -->
<?php include './views/layout/navbar.php'; ?>
<!-- /.navbar -->
<?php include './views/layout/sidebar.php'; ?>
<!-- Main Sidebar Container -->


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Cập nhật thông tin đặt phòng - ID: <?= $datphong['id'] ?></h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Cập nhật trạng thái đặt phòng</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="<?= BASE_URL_ADMIN . '?act=updatedatphong&id=' . $datphong['id'] ?>" method="post">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Tên người nhận</label>
                                    <input type="text" class="form-control" name="ten_nguoi_nhan" value="<?= $datphong['ho_ten'] ?>" readonly>
                                </div>

                                <div class="form-group">
                                    <label>Tên phòng</label>
                                    <input type="text" class="form-control" name="sdt_nguoi_nhan" value="<?= $datphong['ten_phong'] ?>" readonly>
                                </div>

                                <div class="form-group">
                                    <label>Checkin</label>
                                    <input type="text" class="form-control" name="email_nguoi_nhan" value="<?= formatDate($datphong['check_in']) ?>" readonly>
                                </div>

                                <div class="form-group">
                                    <label>Checkout</label>
                                    <input type="text" class="form-control" name="dia_chi_nguoi_nhan" value="<?= formatDate($datphong['check_out']) ?>" readonly>
                                </div>

                                <div class="form-group">
                                    <label>Tổng tiền</label>
                                    <input type="text" class="form-control" name="" value="<?= number_format($datphong['tong_tien']) ?> VNĐ" readonly>
                                </div>

                                <div class="form-group">
                                    <label for="">Trạng thái đơn hàng</label>
                                    <select name="trang_thai_id" id="trang_thai" class="form-control">
                                        <?php foreach ($listTrangThai as $key => $trangThai) {
                                            $isSelected = $trangThai['id'] == $datphong['trang_thai_id'];
                                            $isDisabled = $trangThai['id'] < $datphong['trang_thai_id']
                                                || $datphong['trang_thai_id'] == 3
                                                || $datphong['trang_thai_id'] == 4;
                                        ?>
                                            <option value="<?= $trangThai['id'] ?>" <?= $isSelected ? 'selected' : '' ?> <?= $isDisabled && !$isSelected ? 'disabled' : '' ?>>
                                                <?= $trangThai['ten_trang_thai'] ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary" name="updateCate">Submit</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php include './views/layout/footer.php'; ?>
<!-- Code injected by live-server -->

</body>

</html>