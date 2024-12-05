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
        inner join phuong_thuc_thanh_toans on dat_phongs.phuong_thuc_thanh_toan_id = phuong_thuc_thanh_toans.id order by dat_phongs.id desc';
        $stmt = $this -> conn -> prepare($sql);
        $stmt -> execute();
        return $stmt->fetchAll();
    }

    function getDichVuFromId($id) {
        $sql = 'select chi_tiet_hoa_dons.*, dich_vus.ten_dich_vu, dich_vus.gia_dich_vu
        from chi_tiet_hoa_dons
        inner join dich_vus on chi_tiet_hoa_dons.dich_vu_id = dich_vus.id
        where chi_tiet_hoa_dons.dat_phong_id = :id group by ngay_sd';
        $stmt = $this -> conn -> prepare($sql);
        $stmt -> execute([
            ':id' => $id
        ]);
        return $stmt->fetchAll();
    }

    function getDichVu ($id) {
        $sql = "SELECT 
    chi_tiet_hoa_dons.ngay_sd,
    GROUP_CONCAT(dich_vus.ten_dich_vu SEPARATOR ', ') AS ten_dich_vu
FROM chi_tiet_hoa_dons
INNER JOIN dich_vus ON chi_tiet_hoa_dons.dich_vu_id = dich_vus.id
WHERE chi_tiet_hoa_dons.dat_phong_id = :id
GROUP BY chi_tiet_hoa_dons.ngay_sd;
";
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

    function getTienDichVu($id) {
        $sql = 'select chi_tiet_hoa_dons.*, dat_phongs.id
        from chi_tiet_hoa_dons 
        inner join dat_phongs on dat_phongs.id = chi_tiet_hoa_dons.dat_phong_id 
        where dat_phongs.id = :id';
        $stmt = $this -> conn -> prepare($sql);
        $stmt -> execute([
            ':id' => $id
        ]);
        return $stmt->fetchAll();
    }

    // function getListSpDonHang($id) {
    //     $sql = 'select chi_tiet_don_hangs.*, san_phams.ten_san_pham from chi_tiet_don_hangs inner join san_phams on chi_tiet_don_hangs.san_pham_id = san_phams.id where chi_tiet_don_hangs.don_hang_id = :id';
    //     $stmt = $this -> conn -> prepare($sql);
    //     $stmt -> execute([
    //         ':id' => $id
    //     ]);
    //     return $stmt->fetchAll();
    // }

    function UpdateDatPhong($id, $trang_thai_id){
        $sql = "update dat_phongs set trang_thai_id = :trang_thai_id where id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            ':trang_thai_id' => $trang_thai_id,
            'id' => $id
        ]);

        return true;
    }

    // function getOneDonHangFromKhachHang($id) {
    //     $sql = 'select * from trang_thai_don_hangs inner join don_hangs on don_hangs.trang_thai_id = trang_thai_don_hangs.id where don_hangs.tai_khoan_id = :id';
    //     $stmt = $this -> conn -> prepare($sql);
    //     $stmt -> execute([
    //         ':id' => $id
    //     ]);
    //     return $stmt->fetchAll();
    // }

    function getAllTrangThai() {
        $sql = 'select * from trang_thai_dat_phongs';
        $stmt = $this -> conn -> prepare($sql);
        $stmt -> execute();
        return $stmt->fetchAll();
    }

    public function getDoanhThuTheoNgay() {
        try {
            // Thay 'ngay_dat' bằng tên cột chứa ngày của bạn
            $sql = "SELECT DATE(ngay_dat) AS `date`, SUM(tong_tien) AS total 
            FROM dat_phongs 
            WHERE trang_thai_id = 3 GROUP BY DATE(ngay_dat) ORDER BY DATE(ngay_dat);";
    
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo "Database query failed: " . $e->getMessage();
            return [];
        }
    }

    public function getDoanhThuDVTheoNgay() {
        try {
            // Sử dụng DATE(ngay_sd) trong GROUP BY để đảm bảo truy vấn hợp lệ với chế độ ONLY_FULL_GROUP_BY
            $sql = "SELECT DATE(chi_tiet_hoa_dons.ngay_sd) AS `date`, SUM(chi_tiet_hoa_dons.tien_dich_vu) AS total, dat_phongs.trang_thai_id 
                    FROM chi_tiet_hoa_dons
                    INNER JOIN dat_phongs ON chi_tiet_hoa_dons.dat_phong_id = dat_phongs.id
                    WHERE dat_phongs.trang_thai_id = 3 
                    GROUP BY DATE(chi_tiet_hoa_dons.ngay_sd) 
                    ORDER BY DATE(chi_tiet_hoa_dons.ngay_sd);";
        
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo "Database query failed: " . $e->getMessage();
            return [];
        }
    }

    function getSLDatPhong() {
        $sql = 'SELECT COUNT(*) FROM dat_phongs';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchColumn(); // fetchColumn() lấy giá trị duy nhất từ COUNT(*)
        return strval($result); // Chuyển thành chuỗi
    }
    
    public function loadDatPhong_5() {
        $sql = "SELECT dat_phongs.*, phuong_thuc_thanh_toans.ten_phuong_thuc, trang_thai_dat_phongs.ten_trang_thai 
        FROM dat_phongs 
        inner join trang_thai_dat_phongs on dat_phongs.trang_thai_id = trang_thai_dat_phongs.id 
        inner join phuong_thuc_thanh_toans on dat_phongs.phuong_thuc_thanh_toan_id = phuong_thuc_thanh_toans.id
        ORDER BY dat_phongs.id DESC LIMIT 5"; // Hoặc thay 'id' bằng trường phù hợp
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function getDoanhThuTongPhong() {
        $sql = "SELECT SUM(tong_tien) FROM dat_phongs WHERE trang_thai_id = 3;";
        $stmt = $this -> conn->prepare($sql);
        $stmt->execute();
        $totalDoanhThu = $stmt->fetchColumn(); // Lấy giá trị duy nhất
        return $totalDoanhThu ?? 0;
    }

    function getDoanhThuTongDV() {
        $sql = "SELECT chi_tiet_hoa_dons.*, dat_phongs.id, dat_phongs.trang_thai_id 
                FROM chi_tiet_hoa_dons
                INNER JOIN dat_phongs ON chi_tiet_hoa_dons.dat_phong_id = dat_phongs.id
                WHERE dat_phongs.trang_thai_id = 3;";
        $stmt = $this -> conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}