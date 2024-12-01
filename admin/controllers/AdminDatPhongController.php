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

            $startDate = new DateTime($onedatphong['check_in']);
            $endDate = new DateTime($onedatphong['check_out']);
            $tinhsongay = $startDate->diff($endDate);
            $songay = $tinhsongay->days;

            $tienphong = $onedatphong['gia_tien']*($songay + 1);
            
            $tiendichvu = 0;
            foreach($dichvu as $dv) {
                $tiendichvu += $dv['gia_dich_vu'];
            }
            $tongdichvu = $tiendichvu * ($songay + 1);

            $tongtien = $tienphong + $tiendichvu;

            // $listTrangThai = $this -> modelDatPhong -> getAllTrangThai();
            require_once './views/datphong/detailDatPhong.php';
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