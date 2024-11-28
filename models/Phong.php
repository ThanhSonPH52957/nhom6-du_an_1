<?php
class Phong
{
    public $conn;

    function __construct()
    {
        $this->conn = connectDB();
    }
    public function album($id_phong)
    {
        $sql = "SELECT * FROM album_anh_phongs WHERE phong_id = :id_phong";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':id_phong' => $id_phong]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function layDanhSachHinhAnhTheoPhong($id)
    {
        $sql = 'SELECT * FROM album_anh_phongs WHERE phong_id = :id';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function layDanhSachPhongTheoDanhMuc($idDanhMuc)
    {
        $sql = 'SELECT phongs.*, danh_muc_phongs.ten_danh_muc 
                FROM phongs 
                INNER JOIN danh_muc_phongs ON phongs.danh_muc_id = danh_muc_phongs.id 
                WHERE danh_muc_id = :idDanhMuc';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':idDanhMuc' => $idDanhMuc]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function layChiTietPhong($id)
    {
        $sql = 'SELECT phongs.*, danh_muc_phongs.ten_danh_muc 
                FROM phongs 
                INNER JOIN danh_muc_phongs ON phongs.danh_muc_id = danh_muc_phongs.id 
                WHERE phongs.id = :id';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function layPhongLienQuan($id, $idhientai)
    {
        $sql = 'SELECT phongs.*, danh_muc_phongs.ten_danh_muc 
                FROM phongs 
                INNER JOIN danh_muc_phongs ON phongs.danh_muc_id = danh_muc_phongs.id 
                WHERE phongs.danh_muc_id = :id and  phongs.id != :idhientai';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':id' => $id, ':idhientai' => $idhientai]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function layPhongTotNhat($idhientai)
    {
        $sql = 'SELECT phongs.*, danh_muc_phongs.ten_danh_muc 
                FROM phongs 
                INNER JOIN danh_muc_phongs ON phongs.danh_muc_id = danh_muc_phongs.id 
                WHERE phongs.danh_muc_id = 4 and  phongs.id != :idhientai
                ORDER BY phongs.id DESC LIMIT 4';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':idhientai' => $idhientai]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function layDanhSachBinhLuanTheoPhong($idPhong)
    {
        $sql = 'SELECT binh_luans.*, tai_khoans.ho_ten 
                FROM binh_luans 
                INNER JOIN tai_khoans ON binh_luans.tai_khoan_id = tai_khoans.id 
                WHERE binh_luans.phong_id = :idPhong';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':idPhong' => $idPhong]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function AddPhong()
    {
        $sql = 'SELECT phongs.* , danh_muc_phongs.ten_danh_muc 
                FROM phongs 
                INNER JOIN danh_muc_phongs ON phongs.danh_muc_id = danh_muc_phongs.id';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function layPhongDon()
    {
        $sql = 'SELECT phongs.*, danh_muc_phongs.ten_danh_muc 
                FROM phongs 
                INNER JOIN danh_muc_phongs ON phongs.danh_muc_id = danh_muc_phongs.id
                WHERE danh_muc_id = 1
                ORDER BY danh_muc_id  DESC LIMIT 4';
        $stmt = $this->conn->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function layPhongDoi()
    {
        $sql = 'SELECT phongs.*, danh_muc_phongs.ten_danh_muc 
                FROM phongs 
                INNER JOIN danh_muc_phongs ON phongs.danh_muc_id = danh_muc_phongs.id
                WHERE danh_muc_id = 2
                ORDER BY danh_muc_id  DESC LIMIT 4';
        $stmt = $this->conn->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function layPhongVip()
    {
        $sql = 'SELECT phongs.*, danh_muc_phongs.ten_danh_muc 
                FROM phongs 
                INNER JOIN danh_muc_phongs ON phongs.danh_muc_id = danh_muc_phongs.id
                WHERE danh_muc_id = 4
                ORDER BY danh_muc_id  DESC LIMIT 4';
        $stmt = $this->conn->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function timKiemPhong($tuKhoa)
    {
        $sql = 'SELECT phongs.*, danh_muc_phongs.ten_danh_muc 
                FROM phongs 
                INNER JOIN danh_muc_phongs ON phongs.danh_muc_id = danh_muc_phongs.id 
                WHERE phongs.ten_phong LIKE :tuKhoa OR danh_muc_phongs.ten_danh_muc LIKE :tuKhoa';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':tuKhoa' => '%' . $tuKhoa . '%']);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function addBinhluan($noidung, $id_phong, $id_tai_khoan)
    {
        $sql = "INSERT INTO binhluan (id_phong,id_tai_khoan,noidung)
        VALUES (:id_phong,:id_tai_khoan,:noidung)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            ':id_phong' => $id_phong ?? null,
            ':id_tai_khoan' => $id_tai_khoan ?? null,
            ':noidung' => $noidung ?? null,
        ]);
    }
    public function listBinhluan($id_phong)
    {
        $sql = "
                SELECT * FROM binhluan
                INNER JOIN phongs ON phongs.id = binhluan.id_phong
                INNER JOIN tai_khoans ON tai_khoans.id = binhluan.id_tai_khoan 
                WHERE binhluan.id_phong = :id_phong ;
        ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':id_phong' => $id_phong]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getBinhLuanChiTiet($id_phong)
    {
        $sql = 'SELECT binhluan.noidung, tai_khoans.ho_ten 
            FROM binhluan
            INNER JOIN tai_khoans ON binhluan.id_tai_khoan = tai_khoans.id 
            WHERE binhluan.id_phong = :id_phong
            ';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':id_phong' => $id_phong]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function all()
    {
        $sql = "SELECT * FROM binhluan";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
