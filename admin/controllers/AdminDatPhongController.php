<?php
    class AdminDatPhongController {
        public $modelDatPhong;

        function __construct() {
            $this -> modelDatPhong = new AdminDatPhong();
        }

        public function danhSachDatPhong() {
            $alldatphong = $this -> modelDatPhong -> getAllDatPhong();
            require_once './views/datphong/listDatPhong.php';
        }

        function chiTietDatPhong($id) {
            $onedatphong = $this -> modelDatPhong -> getOneDatPhong($id);
            $dichvu = $this -> modelDatPhong -> getDichVuFromId($id);
            $listdv = $this -> modelDatPhong -> getDichVu($id);

            $tienphong = $onedatphong['tong_tien'];
            
            $tiendichvu = 0;
            $tinhdv = $this -> modelDatPhong -> getTienDichVu($id);
            
            foreach($tinhdv as $dv) {
                $tiendichvu += $dv['tien_dich_vu'];
            }
            $tongdichvu = $tiendichvu;

            $tongtien = $tienphong + $tongdichvu;

            // $listTrangThai = $this -> modelDatPhong -> getAllTrangThai();
            require_once './views/datphong/detailDatPhong.php';
        }

        function chiTietHoaDon($id) {
            $onedatphong = $this -> modelDatPhong -> getOneDatPhong($id);
            $dichvu = $this -> modelDatPhong -> getDichVuFromId($id);
            $listdv = $this -> modelDatPhong -> getDichVu($id);

            $tienphong = $onedatphong['tong_tien'];
            
            $tiendichvu = 0;
            $tinhdv = $this -> modelDatPhong -> getTienDichVu($id);
            
            foreach($tinhdv as $dv) {
                $tiendichvu += $dv['tien_dich_vu'];
            }
            $tongdichvu = $tiendichvu;

            $tongtien = $tienphong + $tongdichvu;

            // $listTrangThai = $this -> modelDatPhong -> getAllTrangThai();
            require_once './views/datphong/invoice-print.php';
        }

        function formUpdateDatPhong($id) {
            $datphong = $this -> modelDatPhong -> getOneDatPhong($id);
            $listTrangThai = $this -> modelDatPhong-> getAllTrangThai();

            if ($datphong) {
                require_once './views/datphong/updateDatPhong.php';
                deleteSessionError();
            } else {
                header("location:".BASE_URL_ADMIN.'?act=formupdatedatphong&id='.$donHang['id']);
                exit();
            }
        }

        function updateDatPhong($id) {
            if($_SERVER['REQUEST_METHOD'] == 'POST') {

                $trang_thai_id = $_POST['trang_thai_id'] ?? '';

                if(empty($errors)) {
                    $this -> modelDatPhong -> UpdateDatPhong($id, $trang_thai_id);
                    
                    header("location:".BASE_URL_ADMIN.'?act=datphong');
                    exit();
                } else {
                    $_SESSION['flash'] = true;

                    header("location:".BASE_URL_ADMIN.'?act=formupdatedatphong&id='.$id);
                    exit();
                }
            }
        }
    }
?>