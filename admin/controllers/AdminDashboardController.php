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
            
            $tongdoanhthu = $this -> modelDatPhong -> getDoanhThuTong();

            $sldondp = $this -> modelDatPhong -> getSlDatPhong();
            $slthanhvien = $this -> modelTaiKhoan -> getSlThanhVien();
            $slphong = $this -> modelPhong -> getSlPhong();

            $doanhThuTheoNgay = $this->modelDatPhong->getDoanhThuTheoNgay();

            $loadPhong_5 = $this-> modelPhong -> loadPhong_5();
            $loaddp_5 = $this->modelDatPhong->loadDatPhong_5();
            
            require_once './views/home.php';
        }
    }
?>