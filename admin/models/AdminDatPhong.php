<?php 

class AdminDatPhong
{
    public $conn;

    function __construct() {
        $this -> conn = connectDB();
    }

    function getAllDatPhong() {
        $sql = 'select dat_phongs.*, trang_thai_dat_phongs.ten_trang_thai, tai_khoans.ho_ten, phongs.ten_phong, phuong_thuc_thanh_toans.ten_phuong_thuc
        from dat_phongs
        inner join trang_thai_dat_phongs on dat_phongs.trang_thai_id = trang_thai_dat_phongs.id
        inner join tai_khoans on dat_phongs.tai_khoan_id = tai_khoans.id
        inner join phongs on dat_phongs.phong_id = phongs.id
        inner join phuong_thuc_thanh_toans on dat_phongs.phuong_thuc_thanh_toan_id = phuong_thuc_thanh_toans.id';
        $stmt = $this -> conn -> prepare($sql);
        $stmt -> execute();
        return $stmt->fetchAll();
    }

    function getDichVuFromId($id) {
        $sql = 'select chi_tiet_hoa_dons.*, dich_vus.ten_dich_vu, dich_vus.gia_dich_vu
        from chi_tiet_hoa_dons
        inner join dich_vus on chi_tiet_hoa_dons.dich_vu_id = dich_vus.id
        where chi_tiet_hoa_dons.dat_phong_id = :id';
        $stmt = $this -> conn -> prepare($sql);
        $stmt -> execute([
            ':id' => $id
        ]);
        return $stmt->fetchAll();
    }

    function getOneDatPhong($id) {
        $sql = 'select dat_phongs.*, phuong_thuc_thanh_toans.ten_phuong_thuc, trang_thai_dat_phongs.ten_trang_thai, tai_khoans.ho_ten, tai_khoans.email, tai_khoans.so_dien_thoai, phongs.ten_phong, phongs.gia_tien
        from dat_phongs 
        inner join trang_thai_dat_phongs on dat_phongs.trang_thai_id = trang_thai_dat_phongs.id 
        inner join tai_khoans on dat_phongs.tai_khoan_id = tai_khoans.id 
        inner join phuong_thuc_thanh_toans on dat_phongs.phuong_thuc_thanh_toan_id = phuong_thuc_thanh_toans.id
        inner join phongs on phongs.id = dat_phongs.phong_id
        where dat_phongs.id = :id';
        $stmt = $this -> conn -> prepare($sql);
        $stmt -> execute([
            ':id' => $id
        ]);
        return $stmt->fetch();
    }

    function getListSpDonHang($id) {
        $sql = 'select chi_tiet_don_hangs.*, san_phams.ten_san_pham from chi_tiet_don_hangs inner join san_phams on chi_tiet_don_hangs.san_pham_id = san_phams.id where chi_tiet_don_hangs.don_hang_id = :id';
        $stmt = $this -> conn -> prepare($sql);
        $stmt -> execute([
            ':id' => $id
        ]);
        return $stmt->fetchAll();
    }

    function UpdateDonHang($id, $ten_nguoi_nhan, $sdt_nguoi_nhan, $email_nguoi_nhan, $dia_chi_nguoi_nhan, $ghi_chu, $trang_thai_id){
        $sql = "update don_hangs set ten_nguoi_nhan = :ten_nguoi_nhan, sdt_nguoi_nhan = :sdt_nguoi_nhan, email_nguoi_nhan = :email_nguoi_nhan, dia_chi_nguoi_nhan = :dia_chi_nguoi_nhan, ghi_chu = :ghi_chu, trang_thai_id = :trang_thai_id where id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            ':ten_nguoi_nhan' => $ten_nguoi_nhan,
            ':sdt_nguoi_nhan' => $sdt_nguoi_nhan,
            ':email_nguoi_nhan' => $email_nguoi_nhan,
            ':dia_chi_nguoi_nhan' => $dia_chi_nguoi_nhan,
            ':ghi_chu' => $ghi_chu,
            ':trang_thai_id' => $trang_thai_id,
            'id' => $id
        ]);

        return true;
    }

    function getOneDonHangFromKhachHang($id) {
        $sql = 'select * from trang_thai_don_hangs inner join don_hangs on don_hangs.trang_thai_id = trang_thai_don_hangs.id where don_hangs.tai_khoan_id = :id';
        $stmt = $this -> conn -> prepare($sql);
        $stmt -> execute([
            ':id' => $id
        ]);
        return $stmt->fetchAll();
    }
}