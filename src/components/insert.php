<?php
session_start();
require_once "../../config/dbconnect.php";

if (isset($_POST['submit'])) {
    try {
        // เริ่มต้น Transaction
        $conn->beginTransaction();

        // เพิ่มข้อมูลลงในตาราง tbl_student
        $prefix = $_POST['prefix'];
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $first_name_en = $_POST['first_name_en'];
        $last_name_en = $_POST['last_name_en'];
        $age = $_POST['age'];
        $phone = $_POST['phone'];
        $city = $_POST['city'];
        $address = $_POST['address'];
        $year = $_POST['year'];
        $department = $_POST['department'];
        $subject = $_POST['subject'];
        $avatar = $_POST['avatar'];
        $hobby = $_POST['hobby'];

        // เตรียมและรันคำสั่ง SQL สำหรับเพิ่มข้อมูลใน tbl_student
        $sql = $conn->prepare("INSERT INTO tbl_student (PrefixID, StudentName, StudentLastname, StudentNameEN, StudentLastnameEN, Age, DepID, yearID, Address, Domicile, Telephone, SubjectID, CityID, AvaID) 
                               VALUES (:prefix, :first_name, :last_name, :first_name_en, :last_name_en, :age, :department, :year, :address, :address, :phone, :subject, :city, :avatar)");
        $sql->bindParam(":prefix", $prefix);
        $sql->bindParam(":first_name", $first_name);
        $sql->bindParam(":last_name", $last_name);
        $sql->bindParam(":first_name_en", $first_name_en);
        $sql->bindParam(":last_name_en", $last_name_en);
        $sql->bindParam(":age", $age);
        $sql->bindParam(":department", $department);
        $sql->bindParam(":year", $year);
        $sql->bindParam(":address", $address);
        $sql->bindParam(":phone", $phone);
        $sql->bindParam(":subject", $subject);
        $sql->bindParam(":city", $city);
        $sql->bindParam(":avatar", $avatar);
        $sql->execute();

        // ดึงค่า Student ID ที่ถูกเพิ่มล่าสุด
        $student_id = $conn->lastInsertId();

        // แทรกข้อมูลงานอดิเรกลงใน tbl_StudentHobby
        // ตรวจสอบว่ามีงานอดิเรกมากกว่าหนึ่งหรือไม่ (กรณีเป็น array)
        if (isset($hobby) && !empty($hobby)) {
            if (is_array($hobby)) {
                foreach ($hobby as $hobby_item) {
                    // ตรวจสอบว่าค่า hobby_item ไม่เป็น null
                    if (!empty($hobby_item)) {
                        $sql_hobby = $conn->prepare("INSERT INTO tbl_StudentHobby(SID, HobbyID) VALUES(:student_id, :hobby)");
                        $sql_hobby->bindParam(":student_id", $student_id);
                        $sql_hobby->bindParam(":hobby", $hobby_item);
                        $sql_hobby->execute();
                    }
                }
            } else {
                // กรณีที่ hobby ไม่ใช่ array และไม่เป็นค่าว่าง
                if (!empty($hobby)) {
                    $sql_hobby = $conn->prepare("INSERT INTO tbl_StudentHobby(SID, HobbyID) VALUES(:student_id, :hobby)");
                    $sql_hobby->bindParam(":student_id", $student_id);
                    $sql_hobby->bindParam(":hobby", $hobby);
                    $sql_hobby->execute();
                }
            }
        }

        // ยืนยันการทำงานของ Transaction
        $conn->commit();

        $_SESSION['success'] = "เพิ่มข้อมูลเสร็จสิ้น";
        header("Location: ../master.php");
        exit();
    } catch (PDOException $e) {
        // ยกเลิกการทำงานของ Transaction หากเกิดข้อผิดพลาด
        $conn->rollBack();
        $_SESSION['error'] = "เพิ่มข้อมูลไม่สำเร็จ: " . $e->getMessage();
        header("Location: ../master.php");
        exit();
    }
}
?>
