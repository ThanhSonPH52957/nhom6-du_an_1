<?php include './views/layout/header.php'; ?>
<!-- Navbar -->
<?php include './views/layout/navbar.php'; ?>
<!-- /.navbar -->
<?php include './views/layout/sidebar.php'; ?>
<!-- Main Sidebar Container -->
<?php include "./views/layout/libs_css.php"; ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Báo cáo thống kê</h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <div class="main-content">

    <div class="page-content">
      <div class="container-fluid">

        <div class="row">
          <div class="col">

            <div class="h-100">
              <div class="row mb-3 pb-1">
                <div class="col-12">
                  <div class="d-flex align-items-lg-center flex-lg-row flex-column">
                    <div class="mt-3 mt-lg-0">
                      <form action="javascript:void(0);">
                        <div class="row g-3 mb-0 align-items-center">

                          <!--end col-->
                          <div class="col-auto">
                            <button type="button" class="btn btn-soft-info btn-icon waves-effect material-shadow-none waves-light layout-rightside-btn"><i class="ri-pulse-line"></i></button>
                          </div>
                          <!--end col-->
                        </div>
                        <!--end row-->
                      </form>
                    </div>
                  </div><!-- end card header -->
                </div>
                <!--end col-->
              </div>
              <!--end row-->

              <div class="row">
                <div class="col-xl-4 col-md-6">
                  <!-- card -->
                  <div class="card card-animate">
                    <div class="card-body">
                      <div class="d-flex align-items-center">
                        <div class="flex-grow-1 overflow-hidden">
                          <p class="text-uppercase fw-medium text-muted text-truncate mb-0"> Tổng Doanh Thu</p>
                        </div>

                      </div>
                      <div class="d-flex align-items-end justify-content-between mt-4">
                        <div>
                          <h4 class="fs-22 fw-semibold ff-secondary mb-4"><?php echo number_format($tongdoanhthu, 0, '.', ','); ?>VND </h4>

                        </div>
                        <div class="avatar-sm flex-shrink-0">
                          <span class="avatar-title bg-success-subtle rounded fs-3">
                            <i class="bx bx-dollar-circle text-success"></i>
                          </span>
                        </div>
                      </div>
                    </div><!-- end card body -->
                  </div><!-- end card -->
                </div><!-- end col -->

                <div class="col-xl-4 col-md-6">
                  <!-- card -->
                  <div class="card card-animate">
                    <div class="card-body">
                      <div class="d-flex align-items-center">
                        <div class="flex-grow-1 overflow-hidden">
                          <p class="text-uppercase fw-medium text-muted text-truncate mb-0">Đơn đặt phòng</p>
                        </div>
                        <div class="flex-shrink-0">

                        </div>
                      </div>
                      <div class="d-flex align-items-end justify-content-between mt-4">
                        <div>
                          <h4 class="fs-22 fw-semibold ff-secondary mb-4"><?php echo $sldondp; ?></h4>

                        </div>
                        <div class="avatar-sm flex-shrink-0">

                          <span class="avatar-title bg-info-subtle rounded fs-3">
                            <i class="bx bx-shopping-bag text-info"></i>
                          </span>
                        </div>
                      </div>
                    </div><!-- end card body -->
                  </div><!-- end card -->
                </div><!-- end col -->

                <div class="col-xl-4 col-md-6">
                  <!-- card -->
                  <div class="card card-animate">
                    <div class="card-body">
                      <div class="d-flex align-items-center">
                        <div class="flex-grow-1 overflow-hidden">
                          <p class="text-uppercase fw-medium text-muted text-truncate mb-0">Thành viên</p>
                        </div>

                      </div>
                      <div class="d-flex align-items-end justify-content-between mt-4">
                        <div>
                          <h4 class="fs-22 fw-semibold ff-secondary mb-4"><?php echo $slthanhvien; ?> </h4>

                        </div>
                        <div class="avatar-sm flex-shrink-0">
                          <span class="avatar-title bg-warning-subtle rounded fs-3">
                            <i class="bx bx-user-circle text-warning"></i>
                          </span>
                        </div>
                      </div>
                    </div><!-- end card body -->
                  </div><!-- end card -->
                </div><!-- end col -->


              </div> <!-- end row-->

              <div class="row">
                <div class="col-xl-8">
                  <div class="card">
                    <div class="card-header border-0 align-items-center d-flex">
                      <h4 class="card-title mb-0 flex-grow-1">Biểu đồ doanh thu theo ngày</h4>
                    </div><!-- end card header -->



                    <div class="card-body p-0 pb-2">
                      <div class="w-100">
                        <div id="revenue_chart" class="apex-charts" dir="ltr"></div>
                      </div>
                    </div><!-- end card body -->
                  </div><!-- end card -->
                </div><!-- end col -->

                <!-- Kết nối thư viện ApexCharts -->
                <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
                <script>
                  document.addEventListener("DOMContentLoaded", function() {
                    // Lấy dữ liệu doanh thu từ PHP
                    var doanhThu = <?php echo json_encode($doanhThuTheoNgay); ?>;

                    var labels = [];
                    var data = [];

                    // Tạo mảng labels và data từ dữ liệu đã lấy ra
                    doanhThu.forEach(function(item) {
                      labels.push(item.date); // Gán ngày vào labels
                      data.push(parseFloat(item.total)); // Gán tổng vào data
                    });

                    var options = {
                      chart: {
                        type: 'bar', // Chọn loại biểu đồ cột
                        height: 350
                      },
                      series: [{
                        name: 'Tổng Doanh Thu',
                        data: data // Dữ liệu tổng doanh thu theo ngày
                      }],
                      xaxis: {
                        categories: labels // Các nhãn trên trục x
                      }
                    };

                    var chart = new ApexCharts(document.querySelector("#revenue_chart"), options);
                    chart.render();
                  });
                </script>

                <div class="col-xl-4">
                  <div class="card card-height-100">
                    <div class="card-header align-items-center d-flex">
                      <h4 class="card-title mb-0 flex-grow-1">Biểu đồ thống kê</h4>

                    </div><!-- end card header -->

                    <div class="card-body">
                      <div id="store-visits-source" class="apex-charts"></div>
                    </div>
                  </div> <!-- .card -->
                </div> <!-- .col -->

                <script>
                  document.addEventListener("DOMContentLoaded", function() {
                    var options = {
                      chart: {
                        type: 'pie' // Chỉnh loại biểu đồ thành pie
                      },
                      series: [

                        <?php echo $sldondp; ?>,
                        <?php echo $slphong; ?>,
                        <?php echo $slthanhvien; ?>
                      ],
                      labels: ['Số Lượng Đơn Đặt Phòng', 'Số Lượng Phòng', 'Số Lượng Thành Viên'],
                      colors: ['#FF4560', '#008FFB', '#00E396', '#775DD0'],
                      title: {
                        text: ''
                      }
                    };

                    var chart = new ApexCharts(document.querySelector("#store-visits-source"), options);
                    chart.render();
                  });
                </script>
                <!-- end col -->
              </div>

              <div class="row">
                <div class="col-xl-6">
                  <div class="card">


                    <div class="card-body">
                      <h5>Danh Sách 5 Phòng Mới Nhất</h5>
                      <div class="table-responsive table-card">
                        <table class="table table-hover table-centered align-middle table-nowrap mb-0">
                          <thead>

                          </thead>
                          <tbody>
                            <br>
                            <?php if (!empty($loadPhong_5)): ?>
                              <?php foreach ($loadPhong_5 as $phong): ?>
                                <tr>
                                  <td><span class="text-muted">Tên</span>
                                    <h5 class="fs-14 my-1 fw-normal"></h5><?php echo htmlspecialchars($phong['ten_phong']); ?>

                                  </td>

                                  <td>
                                    <span class="text-muted">Giá</span>
                                    <h5 class="fs-14 my-1 fw-normal"><?php echo number_format($phong['gia_tien'], 0, ',', '.') . " VNĐ"; ?></h5>
                                  </td>
                                  <td>
                                    <span class="text-muted">Trạng thái</span>
                                    <h5 class="fs-14 my-1 fw-normal"><?php if ($phong['trang_thai'] == 1) {
                                                                                echo "Phòng trống";
                                                                            } elseif ($phong['trang_thai'] == 2) {
                                                                                echo "Đã được đặt";
                                                                            } else {
                                                                                echo "Bảo trì";
                                                                            }
                                                                      ?></h5>

                                  </td>
                                  <td>
                                    <span class="text-muted">Danh mục</span>
                                    <h5 class="fs-14 my-1 fw-normal"><?php echo $phong['ten_danh_muc']?></h5>
                                  </td>
                                </tr>
                              <?php endforeach; ?>
                            <?php else: ?>
                              <tr>
                                <td colspan="6" class="text-center">Không có sản phẩm nào.</td>
                              </tr>
                            <?php endif; ?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-xl-6">
                  <div class="card card-height-100">
                    <div class="card-header align-items-center d-flex">
                      <h4 class="card-title mb-0 flex-grow-1">Top 5 Đơn đặt phòng mới nhất</h4>
                    </div><!-- end card header -->

                    <div class="card-body">
                      <div class="table-responsive table-card">
                        <table class="table table-centered table-hover align-middle table-nowrap mb-0">
                          <thead>
                          </thead>
                          <tbody>
                            <?php if (!empty($loaddp_5)): ?>
                              <?php foreach ($loaddp_5 as $order): ?>
                                <tr>
                                  <td><span class="text-muted">Mã đơn</span>
                                    <h5 class="fs-14 my-1 fw-medium">
                                      <a href="<?= BASE_URL_ADMIN ?>?act=chitietdatphong&id=<?= $order['id'] ?>" class="text-reset"><?= $order['id'] ?></a> <!-- Nếu có trường tên khách hàng -->
                                    </h5>
                                  </td>
                                  <td><span class="text-muted">Ngày đặt</span>
                                  <p class="mb-0"><?= formatDate($order['ngay_dat'])?></p> <!-- Nếu có trường tên sản phẩm -->
                                  </td>
                                  <td><span class="text-muted">Tổng tiền</span>
                                    <p class="mb-0"><?= $order['tong_tien']?> VNĐ</p> <!-- Gắn giá trị số lượng -->
                                  </td>
                                  <td>
                                    <span class="text-muted">Trạng thái</span>
                                    <p class="mb-0"><?= $order['ten_trang_thai']?></p> <!-- Gắn giá trị tổng tiền -->
                                  </td>
                                </tr><!-- end -->
                              <?php endforeach; ?>
                            <?php else: ?>
                              <tr>
                                <td colspan="5" class="text-center">Không có đơn hàng nào.</td>
                              </tr>
                            <?php endif; ?>
                          </tbody>
                        </table><!-- end table -->
                      </div>
                    </div><!-- .card-body-->
                  </div><!-- .card-->
                </div><!-- .col-->
              </div> <!-- end row-->
            </div> <!-- end .h-100-->

          </div> <!-- end col -->
        </div>

      </div>
      <!-- container-fluid -->
    </div>
    <!-- End Page-content -->

  </div>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php include "./views/layout/libs_js.php"; ?>
<?php include './views/layout/footer.php'; ?>

<!-- Code injected by live-server -->

</body>

</html>