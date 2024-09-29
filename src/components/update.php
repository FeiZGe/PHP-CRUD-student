<?php
session_start();
require_once "../../config/dbconnect.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $sid = $_POST['sid'];
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $first_name_en = $_POST['first_name_en'];
        $last_name_en = $_POST['last_name_en'];
        $age = $_POST['age'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $prefix = $_POST['prefix'];
        $city = $_POST['city'];
        $avatar = $_POST['avatar'];
        $hobby = isset($_POST['hobby']) ? $_POST['hobby'] : [];
        $department = $_POST['department'];
        $subject = $_POST['subject'];
        $year = $_POST['year'];

        // อัปเดตข้อมูลผู้ใช้
        $stmt = $conn->prepare("UPDATE tbl_student SET PrefixID = ?, StudentName = ?, StudentLastname = ?, StudentNameEN = ?, StudentLastnameEN = ?, Age = ?, DepID = ?, yearID = ?, Address = ?, Domicile = ?, Telephone = ?, SubjectID = ?, CityID = ?, AvaID = ? WHERE SID = ?");
        $stmt->execute([$prefix, $first_name, $last_name, $first_name_en, $last_name_en, $age, $department, $year, $address, $address, $phone, $subject, $city, $avatar, $sid]);

        // อัปเดตข้อมูล Hobby
        $stmt = $conn->prepare("DELETE FROM tbl_StudentHobby WHERE SID = ?");
        $stmt->execute([$sid]);

        foreach ($hobby as $hobbyID) {
            $stmt = $conn->prepare("INSERT INTO tbl_StudentHobby (SID, HobbyID) VALUES (?, ?)");
            $stmt->execute([$sid, $hobbyID]);
        }

        // รีไดเรกต์ไปยังหน้าที่ต้องการ
        $_SESSION['success'] = "แก้ข้อมูลเสร็จสิ้น";
        header("Location: ../master.php");
        exit();
    } catch (PDOException $e) {
        
        $_SESSION['error'] = "แก้ไขข้อมูลไม่สำเร็จ: " . $e->getMessage();
        header("Location: ../master.php");
        exit();
    }
    
}
?>
