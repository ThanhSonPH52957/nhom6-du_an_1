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

            $tienphong = $onedatphong['gia_tien']*$songay;
            
            $tiendichvu = 0;
            foreach($dichvu as $dv) {
                $tiendichvu += $dv['gia_dich_vu'];
            }

            $tongtien = $tienphong + $tiendichvu;

            // $listTrangThai = $this -> modelDatPhong -> getAllTrangThai();
            require_once './views/datphong/detailDatPhong.php';
        }

        // function formUpdateDonHang($id) {
        //     $donHang = $this -> modelDonHang -> getOneDonHang($id);
        //     $listTrangThai = $this -> modelDonHang -> getAllTrangThai();

        //     if ($donHang) {
        //         require_once './views/donhang/updateDonHang.php';
        //         deleteSessionError();
        //     } else {
        //         header("location:".BASE_URL_ADMIN.'?act=formupdatedonhang&id_don_hang='.$donHang['id']);
        //         exit();
        //     }
        // }

        // function updateDonHang($id) {
        //     if($_SERVER['REQUEST_METHOD'] == 'POST') {

        //         $ten_nguoi_nhan = $_POST['ten_nguoi_nhan'] ?? '';
        //         $sdt_nguoi_nhan = $_POST['sdt_nguoi_nhan'] ?? '';
        //         $email_nguoi_nhan = $_POST['email_nguoi_nhan'] ?? '';
        //         $dia_chi_nguoi_nhan = $_POST['dia_chi_nguoi_nhan'] ?? '';
        //         $ghi_chu = $_POST['ghi_chu'] ?? '';
        //         $trang_thai_id = $_POST['trang_thai_id'] ?? '';
                
        //         $errors = [];
        //         if(empty($ten_nguoi_nhan)) {
        //             $errors['ten_nguoi_nhan'] = 'Tên người nhận không được để trống';
        //         }
        //         if(empty($sdt_nguoi_nhan)) {
        //             $errors['sdt_nguoi_nhan'] = 'Sđt người nhận không được để trống';
        //         }
        //         if(empty($email_nguoi_nhan)) {
        //             $errors['email_nguoi_nhan'] = 'Email không được để trống';
        //         }
        //         if(empty($dia_chi_nguoi_nhan)) {
        //             $errors['dia_chi_nguoi_nhan'] = 'Địa chỉ không được để trống';
        //         }
        //         if(empty($trang_thai_id)) {
        //             $errors['trang_thai_id'] = 'Trạng thái đơn hàng không được để trống';
        //         }

        //         if(empty($errors)) {
        //             $this -> modelDonHang -> UpdateDonHang($id, $ten_nguoi_nhan, $sdt_nguoi_nhan, $email_nguoi_nhan, $dia_chi_nguoi_nhan, $ghi_chu, $trang_thai_id);
                    
        //             header("location:".BASE_URL_ADMIN.'?act=donhang');
        //             exit();
        //         } else {
        //             $_SESSION['flash'] = true;

        //             header("location:".BASE_URL_ADMIN.'?act=formupdatedonhang&id_don_hang='.$id);
        //             exit();
        //         }
        //     }
        // }
    }
?>