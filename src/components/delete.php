<?php
session_start();
require_once "../../config/dbconnect.php";

if (isset($_POST['sid'])) {
    $sid = $_POST['sid'];

    try {
        // เริ่มต้น Transaction
        $conn->beginTransaction();

        // ลบข้อมูลใน tbl_StudentHobby ที่มี SID ตรงกัน
        $sql_hobby = $conn->prepare("DELETE FROM tbl_StudentHobby WHERE SID = :sid");
        $sql_hobby->bindParam(":sid", $sid);
        $sql_hobby->execute();

        // ลบข้อมูลใน tbl_student
        $sql_student = $conn->prepare("DELETE FROM tbl_student WHERE SID = :sid");
        $sql_student->bindParam(":sid", $sid);
        $sql_student->execute();

        // ยืนยันการทำงานของ Transaction
        $conn->commit();

        $_SESSION['success'] = "ลบข้อมูลเสร็จสิ้น";
        header("Location: ../master.php");
        exit();
    } catch (PDOException $e) {
        // ยกเลิกการทำงานของ Transaction หากเกิดข้อผิดพลาด
        $conn->rollBack();
        $_SESSION['error'] = "ลบข้อมูลไม่สำเร็จ: " . $e->getMessage();
        header("Location: ../master.php");
        exit();
    }
} else {
    $_SESSION['error'] = "ไม่มี SID สำหรับลบข้อมูล";
    header("Location: ../master.php");
    exit();
}
?>
