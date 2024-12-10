<?php include './views/layout/header.php'; ?>
<div class="wrapper">
  <!-- Main content -->
  <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <?php 
                if($onedatphong['trang_thai_id'] == 1 || $onedatphong['trang_thai_id'] == 2) {
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
                    <?php foreach($listdv as $ten){ ?> 
                      <table>
                        <tr>
                          <th></th>
                        </tr>
                        <tr>
                          <td style="margin-right: 5px;"><strong><?= formatDate($ten['ngay_sd'])?></strong>: </td>
                          <td> <?= $ten['ten_dich_vu']?></td>
                        </tr>
                      </table>
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
                        <td><?= number_format($tienphong)?> VNĐ</td>
                      </tr>
                      <tr>
                        <th>Tiền dịch vụ:</th>
                        <td><?= number_format($tongdichvu)?> VNĐ</td>
                      </tr>
                      <tr>
                        <th>Tổng tiền:</th>
                        <td><?= number_format($tongtien) ?> VNĐ</td>
                      </tr>
                    </table>
                  </div>
                  <a href="<?= BASE_URL_ADMIN.'?act=chitiethoadon&id='.$onedatphong['id'] ?>" rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
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
<!-- ./wrapper -->
<!-- Page specific script -->
<script>
  window.addEventListener("load", window.print());
</script>
</body>
</html>
