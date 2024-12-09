<?php
    class AdminDashboardController {
        public $modelDatPhong;
        public $modelDashboard;
        public $modelTaiKhoan;
        public $modelPhong;

        function __construct() {
            $this -> modelDatPhong = new AdminDatPhong();
            $this -> modelDashboard = new AdminDashboard();
            $this -> modelTaiKhoan = new AdminTaiKhoan();
            $this -> modelPhong = new AdminPhong();
        }
        function home() {
            $alldatphong = $this -> modelDatPhong -> getAllDatPhong();
            
            $tongdoanhthuphong = $this -> modelDatPhong -> getDoanhThuTongPhong();
            $tongdoanhthuphong = (float)$tongdoanhthuphong;
            // var_dump($tongdoanhthuphong);die;
            $dondatphong = $this -> modelDatPhong -> getDoanhThuTongDV();
            // var_dump($tongdoanhthuphong ,$dondatphong);die;
            $total = 0;
            foreach ($dondatphong as $service) {
                $total += $service['tien_dich_vu']; // Tính tổng tiền từ giá dịch vụ
            }
            // var_dump($total, $tongdoanhthuphong);die;
            $tongdoanhthu = $tongdoanhthuphong + $total;
            // var_dump($tongdoanhthu);die;
            $sldondp = $this -> modelDatPhong -> getSlDatPhong();
            $slthanhvien = $this -> modelTaiKhoan -> getSlThanhVien();
            $slphong = $this -> modelPhong -> getSlPhong();

            $doanhThuTheoNgay = $this->modelDatPhong->getDoanhThuTheoNgay();
            // var_dump($doanhThuTheoNgay);die;
            $doanhThuDVTheoNgay = $this->modelDatPhong->getDoanhThuDVTheoNgay();

            $loadPhong_5 = $this-> modelPhong -> loadPhong_5();
            $loaddp_5 = $this->modelDatPhong->loadDatPhong_5();
            
            require_once './views/home.php';
        }
    }
?>