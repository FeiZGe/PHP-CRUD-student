<?php

require_once "../config/dbconnect.php";

try {
    // จำนวนทั้งหมด
    $stmt_total = $conn->query("SELECT COUNT(*) as total FROM view_student_details");
    $result_total = $stmt_total->fetch(PDO::FETCH_ASSOC);
    $total_students = $result_total['total'];

    // จำนวนเพศชายและเพศหญิง
    $stmt_gender = $conn->query("
        SELECT 
            Prefix,
            COUNT(*) as total
        FROM view_student_details
        GROUP BY Prefix
    ");
    $gender_data = $stmt_gender->fetchAll(PDO::FETCH_ASSOC);
    $total_male = 0;
    $total_female = 0;
    foreach ($gender_data as $gender) {
        if ($gender['Prefix'] === 'นาย') { // คำนำหน้าเพศชาย
            $total_male = $gender['total'];
        } elseif ($gender['Prefix'] === 'นางสาว' || $gender['Prefix'] === 'นาง') { // คำนำหน้าเพศหญิง
            $total_female = $gender['total'];
        }
    }

    // จำนวนตามชั้นปี
    $stmt_years = $conn->query("
        SELECT 
            StudyYear AS Year, 
            COUNT(*) as total
        FROM view_student_details
        GROUP BY StudyYear
        ORDER BY StudyYear ASC
    ");
    $years_data = $stmt_years->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
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
                                <?= number_format($total_students); ?>
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
                                    <?= number_format($total_male); ?>
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
                                    <?= number_format($total_female); ?>
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
                        <?php foreach ($years_data as $year): ?>
                            
                            <article class="card w-full h-20 justify-center bg-base-100 shadow-lg px-4 sm:px-6">
                                <h2 class="absolute top-1 left-3 text-base opacity-60">
                                    ชั้นปีที่ <?= htmlspecialchars($year['Year']); ?>
                                </h2>
                                <div class="flex flex-row gap-4 sm:gap-5 justify-end items-center w-full">
                                    
                                    <!-- Amount -->
                                    <div class="text-4xl sm:text-5xl">
                                        <?= number_format($year['total']); ?>
                                    </div>

                                    <!-- Icon -->
                                    <div class="text-3xl sm:text-4xl">
                                        <i class="fa-solid fa-user"></i>
                                    </div>
                                </div>
                            </article>
                        <?php endforeach; ?>
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
                                <?php
                                    $stmt = $conn->query("SELECT * FROM view_student_details ORDER BY SID ASC");
                                    $stmt->execute();
                                    $users = $stmt->fetchAll();

                                    if (!$users) {
                                        echo "<tr><td class='text-center'>ไม่พบข้อมูล</td></tr>";
                                    } else {
                                        foreach ($users as $user) {
                                ?>
                                <!-- row 1 -->
                                <tr>
                                    <!-- รหัสนักศึกษา -->
                                    <td>
                                        <?= $user['SID']; ?>
                                    </td>

                                    <!-- ชื่อ -->
                                    <td>
                                        <div class="flex items-center gap-3">
                                            <div class="avatar">
                                                <div class="mask mask-squircle h-12 w-12">
                                                <img
                                                    src="./assets/avatar/<?= $user['Avatar']; ?>.jpeg"
                                                    alt="Avatar Macaws" />
                                                </div>
                                            </div>
                                            <div>
                                                <div class="font-bold flex">

                                                    <!-- คำนำหน้า -->
                                                    <div>
                                                        <?= $user['Prefix']; ?>
                                                    </div>

                                                    <!-- ชื่อ -->
                                                    <div>
                                                        <?= $user['StudentName']; ?>
                                                    </div>
                                                    <!-- เว้นวรรค -->
                                                    <pre> </pre>

                                                    <!-- นามสกุล -->
                                                    <div>
                                                        <?= $user['StudentLastname']; ?>
                                                    </div>
                                                </div>

                                                <!-- ENG name -->
                                                <div class="text-sm opacity-50 flex">
                                                    <!-- คำนำหน้า -->
                                                    <div>
                                                        <?= $user['PrefixEN']; ?>
                                                    </div>

                                                    <!-- ชื่อ -->
                                                    <div>
                                                        <?= $user['StudentNameEN']; ?>
                                                    </div>
                                                    <!-- เว้นวรรค -->
                                                    <pre> </pre>

                                                    <!-- นามสกุล -->
                                                    <div>
                                                        <?= $user['StudentLastnameEN']; ?>
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
                                                <?= $user['Domicile']; ?>
                                            </div>

                                            <!-- จังหวัด -->
                                            <div class="badge badge-ghost">
                                                <?= $user['City']; ?>
                                            </div>
                                        </div>
                                    </td>

                                    <!-- สาขาวิชา -->
                                    <td>
                                        <div class="flex flex-col flex-wrap gap-0.5">

                                            <!-- สาขา -->
                                            <div>
                                                <?= $user['Department']; ?>
                                            </div>

                                            <!-- วิชาที่ลงทะเบียนเรียน -->
                                            <div class="badge badge-primary badge-outline text-nowrap">
                                                <?= $user['SubjectName']; ?>
                                            </div>
                                        </div>
                                    </td>

                                    <!-- ชั้นปี -->
                                    <td>
                                        <div class="text-nowrap">
                                            <?= $user['StudyYear']; ?>
                                        </div>
                                    </td>

                                    <!-- เบอร์โทร -->
                                    <td>
                                        <div class="text-nowrap">
                                            <?= $user['Telephone']; ?>
                                        </div>
                                    </td>

                                    <!-- Action -->
                                    <td>
                                        <div class="flex flex-wrap sm:flex-nowrap gap-1">
                                            <a href="./details.php?SID=<?= $user['SID']; ?>" class="btn btn-info btn-square btn-sm text-base-100 text-lg tooltip tooltip-right sm:tooltip-top tooltip-info hover:scale-110" data-tip="รายละเอียด" onclick="my_modal_sorry.showModal()">
                                                <i class="fa-solid fa-circle-info"></i>
                                            </a>
                                            <button class="btn btn-warning btn-square btn-sm text-base-100 text-lg tooltip tooltip-right sm:tooltip-top tooltip-warning hover:scale-110" data-tip="แก้ไขข้อมูล" onclick="my_modal_sorry.showModal()">
                                                <i class="fa-solid fa-pen"></i>
                                            </button>
                                            <button class="btn btn-error btn-square btn-sm text-base-100 text-lg tooltip tooltip-right sm:tooltip-top tooltip-error hover:scale-110" data-tip="ลบข้อมูล" onclick="my_modal_del.showModal()">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <?php
                                    }
                                }
                                ?>
                                <!-- END foreach -->
                                
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


    <!-- Open the modal using ID.showModal() method -->
    <!-- sorry -->
    <dialog id="my_modal_sorry" class="modal modal-bottom sm:modal-middle">
        <div class="modal-box">
            <div class="text-lg font-bold text-yellow-400 flex items-center gap-2">
                <i class="fa-solid fa-triangle-exclamation"></i>
                <h3>ขออภัย!</h3>
            </div>
            <div class="divider divider-warning"></div>
            <div class="py-2">
                <p>ฟีเจอร์นี้ยังไม่พร้อมใช้งานในขณะนี้</p>
                <p>กรุณาลองใหม่ในภายหลัง</p>
            </div>
            <div class="modal-action">
            <form method="dialog">
                <!-- if there is a button in form, it will close the modal -->
                <button class="btn btn-sm">ปิด</button>
            </form>
            </div>
        </div>
    </dialog>

    <!-- Confirm delete -->
    <dialog id="my_modal_del" class="modal modal-bottom sm:modal-middle">
        <div class="modal-box">
            <div class="text-lg font-bold flex items-center gap-2 text-red-500">
                <i class="fa-solid fa-bell"></i>
                <h3>ยืนยันการลบข้อมูล</h3>
            </div>
            <div class="divider divider-error"></div>
            <div class="py-2">
                <p>ต้องการที่จะลบข้อมูลนี้หรือไม่</p>
            </div>
            <div class="modal-action">
            <form method="dialog">
                <!-- if there is a button in form, it will close the modal -->
                <button class="btn btn-sm btn-error">ลบข้อมูล</button>
                <button class="btn btn-sm">ปิด</button>
            </form>
            </div>
        </div>
    </dialog>

    <!--  END Open the modal using ID.showModal() method -->

    <div>
        <?php include('./components/footer.php'); ?>
    </div>
</body>
</html>