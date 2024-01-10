
<?php 
session_start();
ob_start();
include "DAO/DAO.php";
include "DAO/PDO.php";
// Hàm để xử lý điều hướng hành động
function xuLyHanhDong($hanhDong) {
    switch ($hanhDong) {
        case 'taochuyende':
            themMoiChuyenDe();
            break;
        case 'chuyende': 
            hienThiChuyenDe();
            break;
        case 'chitietchuyende':
            hienThiChiTietChuyenDe();
            break;
        case 'cauhoi':
            hienThiCauHoi();
            break;
        case 'themcauhoi':
            themMoiCauHoi();
            break;
        case 'chitietcauhoi':
            hienThiChiTietCauHoi();
            break;
        case 'danhsachthisinh':
            hienThiDanhSachThiSinh();
            break;
        case 'chitietthisinh':
            hienThiChiTietThiSinh();
            break;
        case 'lichthi':
            hienThiLichThi();
            break;
        case 'taolichthi':
            themMoiLichThi();
            break;
        case 'chitietlichthi':
            hienThiChiTietLichThi();
            break;
        case 'chitietbaithi':
            hienThiBaiThi();
            break;
        case 'danhsachbaithi':
            hienThiDanhSachBaiThi();
            break;
        case 'dangxuat':
            dangXuatNguoiDung();
            break;
        case 'trangcanhan':
            chiTietTaiKhoan();
            break;
        case 'dangnhap':
            dangNhapNguoiDung();
            break;
        case 'dangky':
            dangKyNNguoiDung();
            break;
        case 'quenmatkhau':
            quenMatKhau();
            break;
        default:
            hienThiTrangChu();
            break;
    }
}

// Quản lý lịch thi
function hienThiLichThi() {

    include "admin/view/LichThi/LichThi.All.php";
}

// Tạo lịch thi
function themMoiLichThi() {

    include "admin/view/LichThi/LichThi.Add.php";
}

// Chi tiết lịch thi
function hienThiChiTietLichThi() {
    
    include "admin/view/LichThi/LichThi.Detail.php";
}

// Danh sách thí sinh
function hienThiDanhSachThiSinh() {
    
    include "admin/view/ThiSinh/ThiSinh.All.php";
}

// Chi tiết thí sinh
function hienThiChiTietThiSinh() {

    include "admin/view/ThiSinh/ThiSinh.Detail.php";
}

// Show câu hỏi
function hienThiCauHoi() {

    include "admin/view/CauHoi/CauHoi.All.php";
}

// Tạo câu hỏi
function themMoiCauHoi() {

    include "admin/view/CauHoi/CauHoi.Add.php";
}

// Chi tiết câu hỏi
function hienThiChiTietCauHoi() {

    include "admin/view/CauHoi/CauHoi.Detail.php";
}

// Tạo chuyên đề
function themMoiChuyenDe() {

    include "admin/view/ChuyenDe/ChuyenDe.Add.php";
}

// Show chuyên đề
function hienThiChuyenDe() {

    include "admin/view/ChuyenDe/ChuyenDe.All.php";
}

// Chi tiết chuyên đề
function hienThiChiTietChuyenDe() {

    include "admin/view/ChuyenDe/ChuyenDe.Detail.php";
}

// Trang chủ
function hienThiTrangChu() {
    include "user/view/TrangChu/TrangChu.php";
}

// Đăng nhập
function dangNhapNguoiDung() {

    include "user/view/TaiKhoan/TaiKhoan.Login.php";
}

// Chi tiết tài khoản
function chiTietTaiKhoan() {

    include "user/view/TaiKhoan/TaiKhoan.Profile.php";
}

// Đăng ký tài khoản
function dangKyNNguoiDung() {
        if (isset($_POST["submit"])) {
        $register_email = $_POST["email"];
        $register_password = $_POST['password'];
        $register_dob = $_POST['dob'];
        $register_gender = $_POST['gender'];
    
        // Xử lý đăng ảnh
        $imagePath = "assests/upload/";
        $upload_file = $imagePath . basename($_FILES['profile_image']['name']);
    
        if (move_uploaded_file($_FILES['profile_image']['tmp_name'], $upload_file)) {
            // Khi đăng ảnh thành công thì sẽ khởi tạo tài khoản mới
            register_user($register_email, $register_password, $register_dob, $register_gender, $upload_file);
            echo "Đăng ký thành công";
        } else {
            echo "Lỗi: Đăng ảnh không thành công.";
        }
    }
    include "user/view/TaiKhoan/TaiKhoan.Register.php";
}

// Đăng xuất
function dangXuatNguoiDung() {
    // session_unset['normal-user'];
    // header('Location: index.php');
}

// Hiển thị danh sách bài thi
function hienThiDanhSachBaiThi() {
    
    include "user/view/BaiThi.All.php";
}

// Hiển thị bài thi
function hienThiBaiThi() {

    include "user/view/BaiThi.View.php";
}

// Quên mật khẩu
function quenMatKhau() {

    include "user/view/TaiKhoan/TaiKhoan.Forgot.php";
}

function capNhatThongTinCaNhan() {
    // Triển khai logic cập nhật thông tin cá nhân
}


// Static webpage section. Not touch this part.
function aboutUs() {
    include "user/view/TrangChu/TrangChu.Aboutus.php";
}

function infor() {
    include "user/view/TrangChu/TrangChu.Infor.php";
}


function rule() {
    include "user/view/TrangChu/TrangChu.Rule.php";
}

function baiViet() {
    include "user/view/TrangChu/TrangChu.BaiViet.php";
}

function gioiThieu() {
    include "user/view/TrangChu/TrangChu.GioiThieu.php";
}

?>
<?php
// Phần hiển thị HTML luôn nhớ phải dùng requrire_once. Dùng include sẽ bị vướng cho header() không thể send request với file header.
include "user/view/head.php";
?>
<body>
<?php 

// Header trang bao gồm thanh nav với vài thứ linh tinh
require_once "user/view/header.php";

// Phần điều hướng chính
if (isset($_GET['act'])) {
    $hanhDong = $_GET['act'];
    xuLyHanhDong($hanhDong);
} else {
    hienThiTrangChu();
}

// Bao gồm phần cuối trang
require_once "user/view/footer.php";
require_once "user/view/hidden.php";
?>
</body>