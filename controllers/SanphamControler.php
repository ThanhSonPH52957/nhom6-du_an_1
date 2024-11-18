<?php
class SanphamController
{
    public $modelSanPham;
    public $modelTaiKhoan;
    public $modelGioHang;

    function __construct()
    {
        $this->modelSanPham = new SanPham();
        $this->modelTaiKhoan = new TaiKhoan();
        $this->modelGioHang = new GioHang();
    }
    public function search()
    {
        $search = isset($_POST['search']) ? trim($_POST['search']) : '';
        
        if (!empty($search)) {
            $products = $this->modelSanPham->search($search);
        }
        
        require_once './views/timphong.php';
    }
}
