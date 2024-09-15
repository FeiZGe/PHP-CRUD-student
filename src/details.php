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
            
            <!-- Avatar -->
            <article class="avatar mb-5">
                <div class="w-44 rounded-full hover:ring ring-secondary ring-offset-base-100 ring-offset-2 transition ease-in-out duration-300 hover:animate-spin">
                    <img src="./assets/avatar/avatar2.jpeg" alt="avatar">
                </div>
            </article>

            <!-- Information -->
            <article class="grid grid-cols-2 gap-x-3 text-lg">

                <!-- ชื่อไทย -->
                <h2 class="font-bold">ชื่อ - สกุล</h2>
                <div class="flex flex-row text-nowrap">
                    <!-- คำนำหน้า -->
                    <div>
                        นาย
                    </div>

                    <!-- ชื่อ -->
                    <div>
                        ธนกร
                    </div>
                    <!-- เว้นวรรค -->
                    <pre> </pre>

                    <!-- นามสกุล -->
                    <div>
                        ทิตภาพงศ์
                    </div>
                </div>

                <!-- ชื่ออังฤษ -->
                <h2 class="font-bold">ชื่อ - สกุล (อังกฤษ)</h2>
                <div class="flex flex-row text-nowrap">
                    <!-- คำนำหน้า -->
                    <div>
                        Mr.
                    </div>

                    <!-- ชื่อ -->
                    <div>
                        Somchai
                    </div>
                    <!-- เว้นวรรค -->
                    <pre> </pre>

                    <!-- นามสกุล -->
                    <div>
                        Jaidee
                    </div>
                </div>

                <!-- อายุ -->
                <h2 class="font-bold">อายุ</h2>
                <div class="flex flex-row text-nowrap">
                    2000
                    <pre> </pre>
                    <p>ปี</p>
                </div>

                <!-- สาขา -->
                <h2 class="font-bold">สาขา</h2>
                <div class="text-pretty">
                    สาขาวิทยาการคอมพิวเตอร์
                </div>

                <!-- วิชาที่ลงทะเบียนเรียน -->
                <h2 class="font-bold">วิชาที่ลงทะเบียนเรียน</h2>
                <div class="text-pretty">
                    การพัฒนาเว็บแอปพลิเคชัน
                </div>

                <!-- เบอร์ -->
                <h2 class="font-bold">เบอร์โทร</h2>
                <div class="text-nowrap">
                    099-999-9999
                </div>

                <!-- Hobby -->
                <h2 class="font-bold">งานอดิเรก</h2>
                <div class="flex flex-col">
                    <ul>
                        <li>ดูหนัง</li>
                        <li>ฟังเพลง</li>
                        <li>นอน</li>
                    </ul>
                </div>

                <!-- Hobby ENG-->
                <h2 class="font-bold">งานอดิเรก (อังกฤษ)</h2>
                <div class="flex flex-col">
                    <ul>
                        <li>Watching movie</li>
                        <li>Listening music</li>
                        <li>Sleeping</li>
                    </ul>
                </div>
            </article>
        </section>
    </main>

    <div>
        <?php include('./components/footer.php'); ?>
    </div>
</body>
</html>