<?php

require_once "../config/dbconnect.php";

?>
<!DOCTYPE html>
<html lang="en" data-theme="winter">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Master</title>

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
        <div>
            <!-- Dashboard -->
            <section>
                <h1 class="divider divider-start text-3xl sm:text-6xl font-bold mb-7">
                    Dashboard
                </h1>
            </section>

            <section>
                <div class="grid grid-rows-2 sm:grid-rows-1 sm:grid-cols-3 gap-3 h-48">

                    <!-- Show Student member -->
                    <article class="card sm:col-span-2 h-full bg-base-100 shadow-xl justify-center px-4 sm:px-8">
                        <h2 class="absolute top-1 sm:top-2 left-3 sm:left-4 text-xl sm:text-2xl opacity-60">
                            จำนวนนักศึกษา
                        </h2>
                        <div class="flex flex-row gap-10 md:gap-16 justify-end items-center">
                            
                            <!-- Student member -->
                            <div class="text-6xl sm:text-7xl md:text-8xl text-secondary">
                                187,298
                            </div>

                            <!-- Icon -->
                            <div class="text-4xl sm:text-7xl md:text-8xl">
                                <i class="fa-solid fa-user-graduate"></i>
                            </div>
                        </div>
                    </article>

                    <!-- Gender -->
                    <div class="col-span-1 h-full flex flex-row sm:flex-col gap-3">
                        <!-- Male -->
                        <article class="card h-full sm:h-1/2 w-full bg-base-100 shadow-xl justify-center px-4 sm:px-6">
                            <h2 class="absolute top-0.5 left-3 text-base opacity-60">
                                จำนวนนักศึกษาเพศชาย
                            </h2>
                            <div class="flex flex-row gap-4 sm:gap-6 justify-end items-center">
                                
                                <!-- Male amount -->
                                <div class="text-5xl sm:text-6xl text-blue-600">
                                    768
                                </div>
    
                                <!-- Icon -->
                                <div class="text-4xl sm:text-5xl">
                                    <i class="fa-solid fa-person"></i>
                                </div>
                            </div>
                        </article>

                        <!-- Female -->
                        <article class="card h-full sm:h-1/2 w-full bg-base-100 shadow-xl justify-center px-4 sm:px-6">
                            <h2 class="absolute top-0.5 left-3 text-base opacity-60">
                                จำนวนนักศึกษาเพศหญิง
                            </h2>
                            <div class="flex flex-row gap-4 sm:gap-6 justify-end items-center">
                                
                                <!-- Female amount -->
                                <div class="text-5xl sm:text-6xl text-fuchsia-600">
                                    392
                                </div>
    
                                <!-- Icon -->
                                <div class="text-4xl sm:text-5xl">
                                    <i class="fa-solid fa-person-dress"></i>
                                </div>
                            </div>
                        </article>
                    </div>
                </div>

                <!-- Year -->
                <div>
                    <div class="grid grid-cols-2 sm:grid-cols-4 gap-3 mt-3">

                        <!-- Year 1 -->
                        <article class="card w-full h-20 justify-center bg-base-100 shadow-lg px-4 sm:px-6">
                            <h2 class="absolute top-1 left-3 text-base opacity-60">
                                ชั้นปีที่ 1
                            </h2>
                            <div class="flex flex-row gap-4 sm:gap-5 justify-end items-center w-full">
                                
                                <!-- Female amount -->
                                <div class="text-4xl sm:text-5xl">
                                    32
                                </div>
    
                                <!-- Icon -->
                                <div class="text-3xl sm:text-4xl">
                                    <i class="fa-solid fa-user"></i>
                                </div>
                            </div>
                        </article>

                        <!-- Year 2 -->
                        <article class="card w-full h-20 items-center justify-center bg-base-100 shadow-lg px-4 sm:px-6">
                            <h2 class="absolute top-1 left-3 text-base opacity-60">
                                ชั้นปีที่ 2
                            </h2>
                            <div class="flex flex-row gap-4 sm:gap-5 items-center justify-end w-full">
                                
                                <!-- Female amount -->
                                <div class="text-4xl sm:text-5xl">
                                    32
                                </div>
    
                                <!-- Icon -->
                                <div class="text-3xl sm:text-4xl">
                                    <i class="fa-solid fa-user"></i>
                                </div>
                            </div>
                        </article>

                        <!-- Year 3 -->
                        <article class="card w-full h-20 items-center justify-center bg-base-100 shadow-lg px-4 sm:px-6">
                            <h2 class="absolute top-1 left-3 text-base opacity-60">
                                ชั้นปีที่ 3
                            </h2>
                            <div class="flex flex-row gap-4 sm:gap-5 justify-end items-center w-full">
                                
                                <!-- Female amount -->
                                <div class="text-4xl sm:text-5xl">
                                    32
                                </div>
    
                                <!-- Icon -->
                                <div class="text-3xl sm:text-4xl">
                                    <i class="fa-solid fa-user"></i>
                                </div>
                            </div>
                        </article>

                        <!-- Year 4 -->
                        <article class="card w-full h-20 items-center justify-center bg-base-100 shadow-lg px-4 sm:px-6">
                            <h2 class="absolute top-1 left-3 text-base opacity-60">
                                ชั้นปีที่ 4
                            </h2>
                            <div class="flex flex-row gap-4 sm:gap-5 items-center justify-end w-full">
                                
                                <!-- Female amount -->
                                <div class="text-4xl sm:text-5xl">
                                    32
                                </div>
    
                                <!-- Icon -->
                                <div class="text-3xl sm:text-4xl">
                                    <i class="fa-solid fa-user"></i>
                                </div>
                            </div>
                        </article>
                    </div>
                </div>
            </section>

            <div class="divider divider-neutral my-7"></div>

            <!-- Table -->
            <section>

                <h1 class="text-3xl sm:text-5xl font-bold mb-3">
                    รายชื่อนักศึกษา
                </h1>

                <div class="card bg-base-100 shadow-xl p-10">

                    <!-- Table Start -->
                    <div class="overflow-x-auto">
                        <table class="table">
                          <!-- head -->
                            <thead>
                                <tr>
                                    <th>รหัสนักศึกษา</th>
                                    <th>ชื่อ - นามสกุล</th>
                                    <th>ภูมิลำเนา</th>
                                    <th>สาขาวิชา</th>
                                    <th>ชั้นปี</th>
                                    <th>เบอร์โทร</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- row 1 -->
                                <tr>
                                    <!-- รหัสนักศึกษา -->
                                    <td>
                                        1
                                    </td>

                                    <!-- ชื่อ -->
                                    <td>
                                        <div class="flex items-center gap-3">
                                            <div class="avatar">
                                                <div class="mask mask-squircle h-12 w-12">
                                                <img
                                                    src="./assets/avatar/avatar1.jpeg"
                                                    alt="Avatar Macaws" />
                                                </div>
                                            </div>
                                            <div>
                                                <div class="font-bold flex">

                                                    <!-- คำนำหน้า -->
                                                    <div>
                                                        นาย
                                                    </div>

                                                    <!-- ชื่อ -->
                                                    <div>
                                                        สมชาย
                                                    </div>
                                                    <!-- เว้นวรรค -->
                                                    <pre> </pre>

                                                    <!-- นามสกุล -->
                                                     <div>
                                                        ใจดี
                                                     </div>
                                                </div>

                                                <!-- ENG name -->
                                                <div class="text-sm opacity-50 flex">
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
                                            </div>
                                        </div>
                                    </td>

                                    <!-- ภูมิลำเนา -->
                                    <td>
                                        <div class="flex flex-col flex-wrap gap-0.5">

                                            <!-- ที่อยู่ -->
                                            <div>
                                                211/22 หมู่ 1 ต.ใจใหญ่ อ.น้อยหน่า
                                            </div>

                                            <!-- จังหวัด -->
                                            <div class="badge badge-ghost">
                                                กรุงเทพ
                                            </div>
                                        </div>
                                    </td>

                                    <!-- สาขาวิชา -->
                                    <td>
                                        <div class="flex flex-col flex-wrap gap-0.5">

                                            <!-- สาขา -->
                                            <div>
                                                สาขาวิทยาการคอมพิวเตอร์
                                            </div>

                                            <!-- วิชาที่ลงทะเบียนเรียน -->
                                            <div class="badge badge-primary badge-outline text-nowrap">
                                                การพัฒนาเว็บแอปพลิเคชัน
                                            </div>
                                        </div>
                                    </td>

                                    <!-- ชั้นปี -->
                                    <td>
                                        <div class="text-nowrap">
                                            ปี 7
                                        </div>
                                    </td>

                                    <!-- เบอร์โทร -->
                                    <td>
                                        <div class="text-nowrap">
                                            0999999999
                                        </div>
                                    </td>

                                    <!-- Action -->
                                    <td>
                                        <div class="flex flex-wrap sm:flex-nowrap gap-1">
                                            <a href="./detail.html" class="btn btn-info btn-square btn-sm text-base-100 text-lg tooltip tooltip-right sm:tooltip-top tooltip-info hover:scale-110" data-tip="รายละเอียด" onclick="my_modal_sorry.showModal()">
                                                <i class="fa-solid fa-circle-info"></i>
                                            </a>
                                            <button class="btn btn-warning btn-square btn-sm text-base-100 text-lg tooltip tooltip-right sm:tooltip-top tooltip-warning hover:scale-110" data-tip="แก้ไขข้อมูล" onclick="my_modal_sorry.showModal()">
                                                <i class="fa-solid fa-pen"></i>
                                            </button>
                                            <button class="btn btn-error btn-square btn-sm text-base-100 text-lg tooltip tooltip-right sm:tooltip-top tooltip-error hover:scale-110" data-tip="ลบข้อมูล" onclick="my_modal_sorry.showModal()">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                
                                
                                
                            </tbody>
                            <!-- foot -->
                            <tfoot>
                                <tr>
                                    <th>รหัสนักศึกษา</th>
                                    <th>ชื่อ - นามสกุล</th>
                                    <th>ภูมิลำเนา</th>
                                    <th>สาขาวิชา</th>
                                    <th>ชั้นปี</th>
                                    <th>เบอร์โทร</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- Table End -->

                </div>
            </section>
        </div>
    </main>

    <div>
        <?php include('./components/footer.php'); ?>
    </div>
</body>
</html>