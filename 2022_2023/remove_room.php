<?php
// Kết nối cơ sở dữ liệu
include "connect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy dữ liệu từ yêu cầu POST
    $maHoaDon = $_POST["maHoaDon"];
    $maPhong = $_POST["maPhong"];

    // Kiểm tra sự tồn tại của hóa đơn và phòng
    $query = "SELECT * FROM hoadon WHERE mahd = '$maHoaDon'";
    $result = $connect->query($query);
    if ($result->num_rows == 0) {
        $response = array("status" => "error", "message" => "Hóa đơn không tồn tại");
        echo json_encode($response);
        exit();
    }

    $query = "SELECT * FROM phong WHERE ma_phong = '$maPhong'";
    $result = $connect->query($query);
    if ($result->num_rows == 0) {
        $response = array("status" => "error", "message" => "Phòng không tồn tại");
        echo json_encode($response);
        exit();
    }

    // Xóa phòng khỏi hóa đơn
    // $query = "DELETE FROM chitiet_hoadon WHERE mahd = '$maHoaDon' AND ma_phong = '$maPhong'";
    // if ($connect->query($query) === TRUE) {
    //     $response = array("status" => "success", "message" => "Xóa phòng thành công");
    // } else {
    //     $response = array("status" => "error", "message" => "Xóa phòng thất bại: " . $connect->error);
    // }

    // Trả về kết quả dưới dạng JSON
    echo json_encode($response);
}
?>