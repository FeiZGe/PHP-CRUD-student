<?php

    require_once '../config/dbconnect.php';

    class Database extends Config {

        // แสดงข้อมูลในหน้า master
        public function showMaster() {
            $sql = "SELECT * FROM view_student_details ORDER BY SID DESC";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll();
            return $result;
        }
    }
?>