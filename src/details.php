<?php

require_once "../config/dbconnect.php";

?>
<!DOCTYPE html>
<html lang="en" data-theme="winter">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Details</title>

    <!-- Link -->
    <link rel="stylesheet" href="./styles/output.css">
    <link rel="stylesheet" href="./styles/font.css">

    <!-- CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

</head>
<body class="bg-sky-300/[.06]">
    <div>
        <?php include('./components/nav.php'); ?>
    </div>

    <main class="container px-3 mx-auto">
        <section class="card bg-base-100 shadow-2xl items-center py-8 px-12 sm:mx-28">

            <h1 class="text-4xl font-bold mb-3">
                รายละเอียด
            </h1>

            <?php
                $sid = $_GET['SID'];

                // Prepare and execute the query to fetch student details
                $stmt_student = $conn->prepare("SELECT * FROM view_student_details WHERE SID = :sid");
                $stmt_student->bindParam(':sid', $sid, PDO::PARAM_INT);
                $stmt_student->execute();
                $user = $stmt_student->fetch(PDO::FETCH_ASSOC);

                if (!$user) {
                    echo "ไม่พบข้อมูล";
                } else {
                    // Prepare and execute the query to fetch hobbies
                    $stmt_hobbies = $conn->prepare("
                        SELECT h.HobbyName, h.HobbyNameEng
                        FROM tbl_StudentHobby sh
                        JOIN tbl_hobby h ON sh.HobbyID = h.HobbyID
                        WHERE sh.SID = :sid
                    ");
                    $stmt_hobbies->bindParam(':sid', $sid, PDO::PARAM_INT);
                    $stmt_hobbies->execute();
                    $hobbies = $stmt_hobbies->fetchAll(PDO::FETCH_ASSOC);

                    $hobby_list = "";
                    $hobby_list_eng = "";

                    $counter = 1; // นับลำดับงานอดิเรก

                    foreach ($hobbies as $hobby) {
                        $hobby_list .= "<li>" . $counter . ". " . htmlspecialchars($hobby['HobbyName']) . "</li>";
                        $hobby_list_eng .= "<li>" . $counter . ". " . htmlspecialchars($hobby['HobbyNameEng']) . "</li>";
                        $counter++; // Increment counter
                    }
                    ?>

                    <!-- Avatar -->
                    <article class="avatar mb-5">
                        <div class="w-44 rounded-full hover:ring ring-secondary ring-offset-base-100 ring-offset-2 transition ease-in-out duration-300 hover:animate-spin">
                            <img src="./assets/avatar/<?= htmlspecialchars($user['Avatar']); ?>.jpeg" alt="avatar">
                        </div>
                    </article>

                    <!-- Information -->
                    <article class="grid grid-cols-2 gap-x-3 text-lg">
                        <!-- ชื่อไทย -->
                        <h2 class="font-bold">ชื่อ - สกุล</h2>
                        <div class="flex flex-row text-nowrap">
                            <!-- คำนำหน้า -->
                            <div>
                                <?= htmlspecialchars($user['Prefix']); ?>
                            </div>
                            <!-- ชื่อ -->
                            <div>
                                <?= htmlspecialchars($user['StudentName']); ?>
                            </div>
                            <!-- เว้นวรรค -->
                            <pre> </pre>
                            <!-- นามสกุล -->
                            <div>
                                <?= htmlspecialchars($user['StudentLastname']); ?>
                            </div>
                        </div>

                        <!-- ชื่ออังกฤษ -->
                        <h2 class="font-bold">ชื่อ - สกุล (อังกฤษ)</h2>
                        <div class="flex flex-row text-nowrap">
                            <!-- คำนำหน้า -->
                            <div>
                                <?= htmlspecialchars($user['PrefixEN']); ?>
                            </div>
                            <!-- ชื่อ -->
                            <div>
                                <?= htmlspecialchars($user['StudentNameEN']); ?>
                            </div>
                            <!-- เว้นวรรค -->
                            <pre> </pre>
                            <!-- นามสกุล -->
                            <div>
                                <?= htmlspecialchars($user['StudentLastnameEN']); ?>
                            </div>
                        </div>

                        <!-- อายุ -->
                        <h2 class="font-bold">อายุ</h2>
                        <div class="flex flex-row text-nowrap">
                            <?= htmlspecialchars($user['Age']); ?>
                            <pre> </pre>
                            <p>ปี</p>
                        </div>

                        <!-- สาขา -->
                        <h2 class="font-bold">สาขา</h2>
                        <div class="text-pretty">
                            <?= htmlspecialchars($user['Department']); ?>
                        </div>

                        <!-- วิชาที่ลงทะเบียนเรียน -->
                        <h2 class="font-bold">วิชาที่ลงทะเบียนเรียน</h2>
                        <div class="text-pretty">
                            <?= htmlspecialchars($user['SubjectName']); ?>
                        </div>

                        <!-- เบอร์ -->
                        <h2 class="font-bold">เบอร์โทร</h2>
                        <div class="text-nowrap">
                            <?= htmlspecialchars($user['Telephone']); ?>
                        </div>

                        <!-- งานอดิเรก -->
                        <h2 class="font-bold">งานอดิเรก</h2>
                        <div class="flex flex-col">
                            <ul>
                                <?= $hobby_list; ?>
                            </ul>
                        </div>

                        <!-- งานอดิเรก (อังกฤษ) -->
                        <h2 class="font-bold">งานอดิเรก (อังกฤษ)</h2>
                        <div class="flex flex-col">
                            <ul>
                                <?= $hobby_list_eng; ?>
                            </ul>
                        </div>
                    </article>

            <?php
                }
            ?>
        </section>
    </main>
    
    <!-- Insert Modal -->
    <?php include "./components/insert.php"; ?>

    <div>
        <?php include('./components/footer.php'); ?>
    </div>
</body>
</html>