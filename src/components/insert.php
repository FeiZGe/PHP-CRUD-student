<?php
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
?>

<dialog id="my_modal_insert" class="modal">
    <div class="modal-box">
        <form method="dialog">
        <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
        </form>
        <h1 class="text-3xl font-bold">เพิ่มข้อมูล</h1>
        <form action="#">
            <div class="w-4/5 justify-center mx-auto">
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
                <section class="">
                    <h2 class="text-xl font-bold pb-4">ข้อมูลส่วนตัว</h2>

                    <!-- Prefix -->
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
                            <input type="tel" id="phone" name="phone" class="bg-base-200 border border-base-300 text-base-content text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5" min="0000000000" max="999999999" placeholder="0999999999" required />
                        </div>
                    </article>

                    <!-- City -->
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
                        <textarea id="address" name="address" rows="4" class="block bg-base-200 border border-base-300 text-base-content text-sm rounded-lg focus:ring-primary focus:border-primary w-full p-2.5" placeholder="กรอกที่อยู่ของคุณ..."></textarea>
                    </article>

                </section>

                <!-- Hobby -->
                <section class="">
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

                <div class="divider py-4"></div>

                <!-- Study info -->
                <section class="">
                    <h2 class="text-xl font-bold mb-4">การศึกษา</h2>
                    
                    <!-- Year & Department -->
                    <article class="flex flex-col sm:flex-row gap-4 mb-2">

                        <!-- Year -->
                        <div class="w-2/5">
                            <label for="year" class="block mb-1 text-sm font-medium">ชั้นปี</label>
                            <select id="year" name="year" class="select bg-base-200 border border-base-300 text-base-content text-sm rounded-lg focus:ring-primary focus:border-primary block w-full py-1 px-2.5">
                                <option disabled selected>เลือกชั้นปี</option>
                                <?php foreach ($years as $year): ?>
                                    <option value="<?= htmlspecialchars($year['yearID']); ?>">
                                        <?= htmlspecialchars($year['Year']); ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <!-- Department -->
                        <div class="w-full">
                            <label for="department" class="block mb-1 text-sm font-medium">สาขา</label>
                            <select id="department" name="department" class="select bg-base-200 border border-base-300 text-base-content text-sm rounded-lg focus:ring-primary focus:border-primary block w-full py-1 px-2.5">
                                <option disabled selected>เลือกสาขา</option>
                                <?php foreach ($deps as $dep): ?>
                                    <option value="<?= htmlspecialchars($dep['DepID']); ?>">
                                        <?= htmlspecialchars($dep['Department']); ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </article>

                    <!-- Subject -->
                    <article class="w-full mb-7">
                        <label for="subject" class="block mb-1 text-sm font-medium">วิชาที่ลงทะเบียนเรียน</label>
                        <select id="subject" name="subject" class="select bg-base-200 border border-base-300 text-base-content text-sm rounded-lg focus:ring-primary focus:border-primary block w-full py-1 px-2.5">
                            <option disabled selected>เลือกวิชา</option>
                            <?php foreach ($subjects as $subject): ?>
                                <option value="<?= htmlspecialchars($subject['SubjectID']); ?>">
                                    <?= htmlspecialchars($subject['Subject']); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </article>

                </section>

                <section class="flex flex-row justify-center">
                    <input type="submit" value="ยืนยัน" class="btn btn-wide btn-primary transition ease-in-out duration-300 hover:scale-110">
                </section>
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