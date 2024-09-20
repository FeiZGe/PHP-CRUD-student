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
                                            <a href="./details.php?SID=<?= $user['SID']; ?>" class="btn btn-info btn-square btn-sm text-base-100 text-lg tooltip tooltip-right sm:tooltip-top tooltip-info hover:scale-110" data-tip="รายละเอียด">
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

    <!-- Insert Modal -->
    <dialog id="my_modal_insert" class="modal">
            <div class="modal-box">
                <form method="dialog">
                <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                </form>
                <h1 class="text-3xl font-bold">เพิ่มข้อมูล</h1>
                <form action="#">
                    <div>
                        <!-- avatar -->
                        <section class="flex flex-col items-center mb-8">
                            <h2 class="text-xl font-bold text-center py-4">เลือกอวตาร์</h2>
                            
                            <!-- Avatar Display -->
                            <div class="w-2/5 mb-2">
                                <img id="avatarPreview" src="./assets/avatar/avatar1.jpeg" class="w-full h-full rounded-full object-cover transition-opacity duration-300 ease-in-out" alt="Avatar Preview" />
                            </div>
                    
                            <!-- Avatar Toggle Button -->
                            <div class="flex w-full justify-center gap-2 py-2">
                                <label>
                                    <input type="radio" id="avatar1" name="avatar" value="1" class="hidden peer" required checked />
                                    <span class="btn btn-sm peer-checked:border-2 peer-checked:border-primary transition-all duration-300 ease-in-out">1</span>
                                </label>
                    
                                <label>
                                    <input type="radio" id="avatar2" name="avatar" value="2" class="hidden peer" required />
                                    <span class="btn btn-sm peer-checked:border-2 peer-checked:border-primary transition-all duration-300 ease-in-out">2</span>
                                </label>
                    
                                <label>
                                    <input type="radio" id="avatar3" name="avatar" value="3" class="hidden peer" required />
                                    <span class="btn btn-sm peer-checked:border-2 peer-checked:border-primary transition-all duration-300 ease-in-out">3</span>
                                </label>
                    
                                <label>
                                    <input type="radio" id="avatar4" name="avatar" value="4" class="hidden peer" required />
                                    <span class="btn btn-sm peer-checked:border-2 peer-checked:border-primary transition-all duration-300 ease-in-out">4</span>
                                </label>
                    
                                <label>
                                    <input type="radio" id="avatar5" name="avatar" value="5" class="hidden peer" required />
                                    <span class="btn btn-sm peer-checked:border-2 peer-checked:border-primary transition-all duration-300 ease-in-out">5</span>
                                </label>
                            </div>
                        </section>

                        <!-- Information -->
                        <section class="w-4/5 justify-center mx-auto">
                            <h2 class="text-xl font-bold pb-4">ข้อมูลส่วนตัว</h2>

                            <!-- Prefix -->
                            <?php
                                try {
                                    // ดึงข้อมูลคำนำหน้าจาก tbl_prefixes
                                    $stmt_prefix = $conn->query("SELECT PrefixID, PrefixTH FROM tbl_prefixes ORDER BY PrefixID ASC");
                                    $prefixes = $stmt_prefix->fetchAll(PDO::FETCH_ASSOC);
                                
                                } catch (PDOException $e) {
                                    echo "Select prefix error: " . $e->getMessage();
                                }
                            ?>

                            <article class="w-2/5 mb-2">
                                <label for="prefix" class="block mb-1 text-sm font-medium">คำนำหน้า</label>
                                <select id="prefix" name="prefix" class="select bg-base-200 border border-base-300 text-base-content text-sm rounded-lg focus:ring-primary focus:border-primary block w-full py-1 px-2.5">
                                    <option disabled selected>เลือกคำนำหน้า</option>
                                    <?php foreach ($prefixes as $prefix): ?>
                                        <option value="<?= htmlspecialchars($prefix['PrefixID']); ?>">
                                            <?= htmlspecialchars($prefix['PrefixTH']); ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </article>

                            <!-- Thai name -->
                            <article class="flex flex-col sm:flex-row gap-4 mb-2">
                                <div class="w-full sm:w-1/2">
                                    <label for="first_name" class="block mb-1 text-sm font-medium">ชื่อจริง</label>
                                    <input type="text" id="first_name" name="first_name" class="bg-base-200 border border-base-300 text-base-content text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5" placeholder="ชื่อจริง" required />
                                </div>
                                <div class="w-full sm:w-1/2">
                                    <label for="last_name" class="block mb-1 text-sm font-medium">นามสกุล</label>
                                    <input type="text" id="last_name" name="last_name" class="bg-base-200 border border-base-300 text-base-content text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5" placeholder="นามสกุล" required />
                                </div>
                            </article>

                            <!-- Eng name -->
                            <article class="flex flex-col sm:flex-row gap-4 mb-2">
                                <div class="w-full sm:w-1/2">
                                    <label for="first_name_en" class="block mb-1 text-sm font-medium">ชื่อจริง (EN)</label>
                                    <input type="text" id="first_name_en" name="first_name_en" class="bg-base-200 border border-base-300 text-base-content text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5" placeholder="First name" required />
                                </div>
                                <div class="w-full sm:w-1/2">
                                    <label for="last_name_en" class="block mb-1 text-sm font-medium">นามสกุล (EN)</label>
                                    <input type="text" id="last_name_en" name="last_name_en" class="bg-base-200 border border-base-300 text-base-content text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5" placeholder="Last name" required />
                                </div>
                            </article>
                              
                            <!-- Age Tel -->
                            <article class="flex flex-col sm:flex-row gap-4 mb-2">
                                <div class="w-2/5">
                                    <label for="age" class="block mb-1 text-sm font-medium">อายุ</label>
                                    <input type="number" id="age" name="age" class="bg-base-200 border border-base-300 text-base-content text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5" min="1" max="100" placeholder="1" required />
                                </div>
                                <div class="w-full">
                                    <label for="phone" class="block mb-1 text-sm font-medium">เบอร์โทร</label>
                                    <input type="tel" id="phone" name="phone" class="bg-base-200 border border-base-300 text-base-content text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-base-100" min="0000000000" max="999999999" placeholder="0999999999" required />
                                </div>
                            </article>

                            <!-- City -->
                            <?php
                                try {
                                    // ดึงข้อมูลจังหวัดจาก tbl_city
                                    $stmt_city = $conn->query("SELECT CityID, CityName FROM tbl_city ORDER BY CityName ASC");
                                    $cities = $stmt_city->fetchAll(PDO::FETCH_ASSOC);
                                
                                } catch (PDOException $e) {
                                    echo "Select city error: " . $e->getMessage();
                                }
                            ?>

                            <article class="w-2/5 mb-2">
                                <label for="city" class="block mb-1 text-sm font-medium">จังหวัด</label>
                                <select id="city" name="city" class="select bg-base-200 border border-base-300 text-base-content text-sm rounded-lg focus:ring-primary focus:border-primary block w-full py-1 px-2.5">
                                    <option disabled selected>เลือกจังหวัด</option>
                                    <?php foreach ($cities as $city): ?>
                                        <option value="<?= htmlspecialchars($city['CityID']); ?>">
                                            <?= htmlspecialchars($city['CityName']); ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </article>

                            <!-- Adress -->
                            <article class="w-full mb-2">
                                <label for="address" class="block mb-2 text-sm font-medium">ที่อยู่</label>
                                <textarea id="address" name="address" rows="4" class="block bg-base-200 border border-base-300 text-base-content text-sm rounded-lg focus:ring-primary focus:border-primary w-full p-2.5" placeholder="Write your thoughts here..."></textarea>
                            </article>

                        </section>

                        <!-- Hobby -->
                        <?php
                            try {
                                // ดึงข้อมูลงานอิเรกจาก tbl_hobby
                                $stmt_hobby = $conn->query("SELECT HobbyID, HobbyName FROM tbl_hobby ORDER BY HobbyID ASC");
                                $hobbys = $stmt_hobby->fetchAll(PDO::FETCH_ASSOC);
                            
                            } catch (PDOException $e) {
                                echo "Select prefix error: " . $e->getMessage();
                            }
                        ?>

                        <section class="w-4/5 justify-center mx-auto">
                            <h2 class="divider divider-start text-xl font-bold py-4">งานอดิเรก</h2>

                            <article class="grid grid-cols-2 sm:grid-cols-3 text-sm gap-3">

                                <?php foreach ($hobbys as $hobby): ?>
                                <label class="flex flex-row gap-2 cursor-pointer" id="hobby">
                                    <input type="checkbox" id="hobby" name="hobby" value="<?= htmlspecialchars($hobby['HobbyID']); ?>" class="checkbox checkbox-sm checkbox-primary border border-base-content" />
                                    <span class=""><?= htmlspecialchars($hobby['HobbyName']); ?></span>
                                </label>
                                <?php endforeach; ?>
                            </article>
                        </section>

                        <input type="submit" value="หน้าถัดไป" class="btn btn-sm">
                    </div>
                </form>
            </div>

            <script>
                // การเชื่อมโยง Avatar และ Input
                const avatarPreview = document.getElementById('avatarPreview');
                const avatarInputs = document.querySelectorAll('input[name="avatar"]');

                avatarInputs.forEach(input => {
                input.addEventListener('change', () => {
                    const avatarNumber = input.value;

                    // ลดความโปร่งใสของภาพเพื่อให้เกิดแอนิเมชันจางหาย
                    avatarPreview.classList.add('opacity-10');

                    // รอจนกว่าภาพจะจางหายก่อนที่จะเปลี่ยนภาพ
                    setTimeout(() => {
                    avatarPreview.src = `./assets/avatar/avatar${avatarNumber}.jpeg`;
                    // เปลี่ยนภาพเสร็จแล้วค่อยๆ เพิ่มความโปร่งใสกลับมา
                    avatarPreview.classList.remove('opacity-10');
                    }, 150); // 150ms เท่ากับระยะเวลาใน transition-opacity
                });
                });
            </script>

        </dialog>
    </div>

    <!--  END Open the modal using ID.showModal() method -->

    <div>
        <?php include('./components/footer.php'); ?>
    </div>
</body>
</html>