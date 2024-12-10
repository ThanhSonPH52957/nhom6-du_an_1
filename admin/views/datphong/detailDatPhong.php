<?php include './views/layout/header.php'; ?>
<!-- Navbar -->
<?php include './views/layout/navbar.php'; ?>
<!-- /.navbar -->
<?php include './views/layout/sidebar.php'; ?>
<!-- Main Sidebar Container -->
<style>
  /* Chỉ áp dụng khi in */
  @media print {

    /* Ẩn mọi thành phần không cần thiết */
    .btn-default,
    .navbar,
    .sidebar,
    .alert {
      display: none !important;
    }

    /* Tùy chỉnh giao diện bản in */
    body {
      margin: 0;
      font-size: 12pt;
      color: #000;
    }

    .content-wrapper {
      margin: 0;
      padding: 0;
    }
  }
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-10">
          <h1>Quản lý chi tiết thông tin đặt phòng - Id: <?= $onedatphong['id'] ?></h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <?php
          if ($onedatphong['trang_thai_id'] == 1 || $onedatphong['trang_thai_id'] == 2) {
            $colorAlerts = 'primary';
          } elseif ($onedatphong['trang_thai_id'] == 3) {
            $colorAlerts = 'success';
          } else {
            $colorAlerts = 'danger';
          }
          ?>
          <div class="alert alert-<?= $colorAlerts ?>" role="alert">
            Trạng thái: <?= $onedatphong['ten_trang_thai'] ?>
          </div>
          <div class="invoice p-3 mb-3">
            <!-- title row -->
            <div class="row">
              <div class="col-12">
                <h4>
                  <i class="far fa-file-alt"></i> Thông tin chi tiết
                  <small class="float-right">Ngày đặt: <?= formatDate($onedatphong['ngay_dat']) ?></small>
                </h4>
              </div>
              <!-- /.col -->
            </div>

            <!-- info row -->
            <div class="row invoice-info">
              <div class="col-sm-4 invoice-col">
                Thông tin người đặt:
                <address>
                  <strong><?= $onedatphong['ho_ten'] ?></strong><br>
                  Email: <strong><?= $onedatphong['email'] ?></strong><br>
                  Số điện thoại: <strong><?= $onedatphong['so_dien_thoai'] ?></strong><br>
                </address>
              </div>
              <!-- /.col -->
              <!-- /.col -->
              <div class="col-sm-4 invoice-col">
                Thông tin đặt phòng:
                <address>
                  Tên phòng: <strong><?= $onedatphong['ten_phong'] ?></strong><br>
                  Giá tiền: <strong><?= $onedatphong['gia_tien'] ?> đ/h</strong><br>
                  Ngày check in: <strong><?= formatDate($onedatphong['check_in']) ?></strong><br>
                  Ngày check out: <strong><?= formatDate($onedatphong['check_out']) ?></strong><br>
                </address>
              </div>
              <div class="col-sm-4 invoice-col">
                Thông tin dịch vụ:
                <address>
                  <?php if (!empty($listdv)) { ?>
                    <table>
                      <?php foreach ($listdv as $ten) { ?>
                        <tr>
                          <td style="margin-right: 5px;"><strong><?= formatDate($ten['ngay_sd']) ?></strong>: </td>
                          <td> <?= $ten['ten_dich_vu'] ?></td>
                        </tr>
                      <?php } ?>
                    </table>
                  <?php } else { ?>
                    <p><em>Không có dịch vụ nào được thêm</em></p>
                  <?php } ?>
                </address>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->

            <!-- Table row -->
            <!-- /.row -->

            <div class="row">
              <!-- accepted payments column -->
              <!-- /.col -->
              <div class="col-6">

                <div class="table-responsive">
                  <table class="table">
                    <tr>
                      <th style="width:50%">Tiền phòng:</th>
                      <td><?= number_format($tienphong) ?> VNĐ</td>
                    </tr>
                    <tr>
                      <th>Tiền dịch vụ:</th>
                      <td><?= number_format($tongdichvu) ?> VNĐ</td>
                    </tr>
                    <tr>
                      <th>Tổng tiền:</th>
                      <td><?= number_format($tongtien) ?> VNĐ</td>
                    </tr>
                  </table>
                </div>
                <a href="<?= BASE_URL_ADMIN . '?act=chitiethoadon&id=' . $onedatphong['id'] ?>" rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> In hóa đơn</a>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->

            <!-- this row will not appear when printing -->

          </div>
          <!-- /.invoice -->
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>

<!-- /.content-wrapper -->
<?php include './views/layout/footer.php'; ?>
<script>
  $(function() {
    $("#example1").DataTable({
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });

  document.querySelector('.btn-default').addEventListener('click', function(e) {
    e.preventDefault(); // Ngăn chặn hành động mặc định của liên kết
    window.print();
  });
</script>
<!-- Code injected by live-server -->

</body>

</html>