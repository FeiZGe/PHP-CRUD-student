<?php
session_start();
require_once "../config/dbconnect.php";

// เริ่มการแสดงข้อผิดพลาด
error_reporting(E_ALL);
ini_set('display_errors', 1);

    // ตรวจสอบว่าได้รับ SID มาหรือไม่
    if (isset($_GET['EditSID'])) {
        $sid = $_GET['EditSID'];

        // ดึงข้อมูลผู้ใช้
        $stmt = $conn->prepare("SELECT * FROM tbl_student WHERE SID = :sid");
        $stmt->execute(['sid' => $sid]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // ดึงข้อมูล Hobby ที่เลือก
        $hobbyStmt = $conn->prepare("SELECT HobbyID FROM tbl_StudentHobby WHERE SID = :sid");
        $hobbyStmt->execute(['sid' => $sid]);
        $selectedHobbies = $hobbyStmt->fetchAll(PDO::FETCH_COLUMN);

        // ตัวอย่างข้อมูล
        // ดึงข้อมูลงานอิเรกจาก tbl_hobby
        $stmt_hobby = $conn->query("SELECT HobbyID, HobbyName FROM tbl_hobby ORDER BY HobbyID ASC");
        $hobbys = $stmt_hobby->fetchAll(PDO::FETCH_ASSOC);

        // ดึงข้อมูลคำนำหน้าจาก tbl_prefixes
        $stmt_prefix = $conn->query("SELECT PrefixID, PrefixTH FROM tbl_prefixes ORDER BY PrefixID ASC");
        $prefixes = $stmt_prefix->fetchAll(PDO::FETCH_ASSOC);

        // ดึงข้อมูลจังหวัดจาก tbl_city
        $stmt_city = $conn->query("SELECT CityID, CityName FROM tbl_city ORDER BY CityName ASC");
        $cities = $stmt_city->fetchAll(PDO::FETCH_ASSOC);

        // ดึงข้อมูลชั้นปีจาก tbl_year
        $stmt_year = $conn->query("SELECT yearID, Year FROM tbl_year ORDER BY yearID ASC");
        $years = $stmt_year->fetchAll(PDO::FETCH_ASSOC);

        // ดึงข้อมูลสาขาจาก tbl_department
        $stmt_dep = $conn->query("SELECT DepID, Department FROM tbl_department ORDER BY DepID ASC");
        $deps = $stmt_dep->fetchAll(PDO::FETCH_ASSOC);

        // ดึงข้อมูลวิชาจาก tbl_subject
        $stmt_subj = $conn->query("SELECT SubjectID, Subject FROM tbl_subject ORDER BY SubjectID ASC");
        $subjects = $stmt_subj->fetchAll(PDO::FETCH_ASSOC);
    } else {
        echo "ไม่พบข้อมูล";
    }
    
?>
<!DOCTYPE html>
<html lang="en" data-theme="winter">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>

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
    <div class="container px-3 mx-auto">
        <div class="card">
            <section class="card-content bg-base-100 pt-7 px-4 rounded-xl">
                <h1 class="text-3xl font-bold">แก้ไขข้อมูล</h1>
                <form action="./components/update.php" method="post">
                    <div class="w-4/5 justify-center mx-auto">
                        <!-- Avatar Selection -->
                        <section class="flex flex-col items-center mb-8">
                            <h2 class="text-xl font-bold text-center py-4">เลือกอวตาร์</h2>
                            <div class="w-2/5 mb-2">
                                <img id="avatarPreview" src="./assets/avatar/avatar<?= $user['AvaID']; ?>.jpeg" class="w-full h-full rounded-full object-cover" alt="Avatar Preview" />
                            </div>
                            <div class="flex w-full justify-center gap-2 py-2">
                                <?php for ($i = 1; $i <= 5; $i++): ?>
                                    <label>
                                        <input type="radio" id="avatar<?= $i ?>" name="avatar" value="<?= $i ?>" class="hidden peer" required <?= $user['AvaID'] == $i ? 'checked' : '' ?> />
                                        <span class="btn btn-sm peer-checked:border-2 peer-checked:border-primary transition-all duration-300 ease-in-out"><?= $i ?></span>
                                    </label>
                                <?php endfor; ?>
                            </div>
                        </section>

                        <!-- Personal Information -->
                        <section>
                            <h2 class="text-xl font-bold pb-4">ข้อมูลส่วนตัว</h2>
                            <input type="hidden" name="sid" value="<?= $user['SID']; ?>">
                            <article class="w-2/5 mb-2">
                                <label for="prefix" class="block mb-1 text-sm font-medium">คำนำหน้า</label>
                                <select id="prefix" name="prefix" class="select bg-base-200">
                                    <option disabled>เลือกคำนำหน้า</option>
                                    <?php foreach ($prefixes as $prefix): ?>
                                        <option value="<?= htmlspecialchars($prefix['PrefixID']); ?>" <?= $user['PrefixID'] == $prefix['PrefixID'] ? 'selected' : '' ?>>
                                            <?= htmlspecialchars($prefix['PrefixTH']); ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </article>
                            <article class="flex flex-col sm:flex-row gap-4 mb-2">
                                <div class="w-full sm:w-1/2">
                                    <label for="first_name" class="block mb-1 text-sm font-medium">ชื่อจริง</label>
                                    <input type="text" id="first_name" name="first_name" class="input bg-base-200 focus:input-primary" value="<?= htmlspecialchars($user['StudentName']); ?>" required />
                                </div>
                                <div class="w-full sm:w-1/2">
                                    <label for="last_name" class="block mb-1 text-sm font-medium">นามสกุล</label>
                                    <input type="text" id="last_name" name="last_name" class="input bg-base-200 focus:input-primary" value="<?= htmlspecialchars($user['StudentLastname']); ?>" required />
                                </div>
                            </article>
                            <article class="flex flex-col sm:flex-row gap-4 mb-2">
                                <div class="w-full sm:w-1/2">
                                    <label for="first_name_en" class="block mb-1 text-sm font-medium">ชื่อจริง (EN)</label>
                                    <input type="text" id="first_name_en" name="first_name_en" class="input bg-base-200 focus:input-primary" value="<?= htmlspecialchars($user['StudentNameEN']); ?>" required />
                                </div>
                                <div class="w-full sm:w-1/2">
                                    <label for="last_name_en" class="block mb-1 text-sm font-medium">นามสกุล (EN)</label>
                                    <input type="text" id="last_name_en" name="last_name_en" class="input bg-base-200 focus:input-primary" value="<?= htmlspecialchars($user['StudentLastnameEN']); ?>" required />
                                </div>
                            </article>
                            <article class="flex flex-col sm:flex-row gap-4 mb-2">
                                <div class="w-2/5">
                                    <label for="age" class="block mb-1 text-sm font-medium">อายุ</label>
                                    <input type="number" id="age" name="age" class="input bg-base-200 focus:input-primary" min="1" max="100" value="<?= htmlspecialchars($user['Age']); ?>" required />
                                </div>
                                <div class="w-full">
                                    <label for="phone" class="block mb-1 text-sm font-medium">เบอร์โทร</label>
                                    <input type="tel" id="phone" name="phone" class="input bg-base-200 focus:input-primary" value="<?= htmlspecialchars($user['Telephone']); ?>" required />
                                </div>
                            </article>
                            <article class="w-2/5 mb-2">
                                <label for="city" class="block mb-1 text-sm font-medium">จังหวัด</label>
                                <select id="city" name="city" class="select bg-base-200">
                                    <option disabled>เลือกจังหวัด</option>
                                    <?php foreach ($cities as $city): ?>
                                        <option value="<?= htmlspecialchars($city['CityID']); ?>" <?= $user['CityID'] == $city['CityID'] ? 'selected' : '' ?>>
                                            <?= htmlspecialchars($city['CityName']); ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </article>
                            <article class="w-full mb-2">
                                <label for="address" class="block mb-2 text-sm font-medium">ที่อยู่</label>
                                <textarea id="address" name="address" rows="4" class="input bg-base-200 focus:input-primary"><?= htmlspecialchars($user['Address']); ?></textarea>
                            </article>
                        </section>

                        <!-- Hobby -->
                        <section>
                            <h2 class="divider divider-start text-xl font-bold py-4">งานอดิเรก</h2>
                            <article class="grid grid-cols-2 sm:grid-cols-3 text-sm gap-3">
                                <?php foreach ($hobbys as $hobby): ?>
                                    <label class="flex flex-row gap-2 cursor-pointer">
                                        <input type="checkbox" name="hobby[]" value="<?= htmlspecialchars($hobby['HobbyID']); ?>" 
                                            class="checkbox checkbox-sm checkbox-primary border border-base-content" 
                                            <?php if (in_array($hobby['HobbyID'], $selectedHobbies)) echo 'checked'; ?> />
                                        <span class=""><?= htmlspecialchars($hobby['HobbyName']); ?></span>
                                    </label>
                                <?php endforeach; ?>
                            </article>
                        </section>

                        <div class="divider py-4"></div>

                        <!-- Education Information -->
                        <section>
                            <h2 class="text-xl font-bold pb-4">ข้อมูลการศึกษา</h2>
                            <article class="flex flex-col sm:flex-row gap-4 mb-2">
                                <div class="w-2/5">
                                    <label for="year" class="block mb-1 text-sm font-medium">ปีการศึกษา</label>
                                    <select id="year" name="year" class="select bg-base-200">
                                        <option disabled>เลือกปีการศึกษา</option>
                                        <?php foreach ($years as $year): ?>
                                            <option value="<?= htmlspecialchars($year['yearID']); ?>" <?= $user['yearID'] == $year['yearID'] ? 'selected' : '' ?>>
                                                <?= htmlspecialchars($year['Year']); ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="w-full">
                                    <label for="department" class="block mb-1 text-sm font-medium">แผนก</label>
                                    <select id="department" name="department" class="select bg-base-200">
                                        <option disabled>เลือกแผนก</option>
                                        <?php foreach ($deps as $dep): ?>
                                            <option value="<?= htmlspecialchars($dep['DepID']); ?>" <?= $user['DepID'] == $dep['DepID'] ? 'selected' : '' ?>>
                                                <?= htmlspecialchars($dep['Department']); ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </article>

                            <article class="w-full mb-7">
                                <label for="subject" class="block mb-1 text-sm font-medium">วิชา</label>
                                <select id="subject" name="subject" class="select bg-base-200">
                                    <option disabled>เลือกวิชา</option>
                                    <?php foreach ($subjects as $subject): ?>
                                        <option value="<?= htmlspecialchars($subject['SubjectID']); ?>" <?= $user['SubjectID'] == $subject['SubjectID'] ? 'selected' : '' ?>>
                                            <?= htmlspecialchars($subject['Subject']); ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </article>
                        </section>

                        
                        <div class="mb-6">
                            <button type="submit" name="update" class="btn btn-primary">บันทึก</button>
                        </div>
                    </div>
                </form>
            </section>
        </div>
        
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

    <div>
        <?php include('./components/footer.php'); ?>
    </div>
</body>
</html>