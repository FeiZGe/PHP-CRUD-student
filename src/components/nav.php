<header class="h-24">
    <nav class="fixed inset-x-0 w-full flex justify-center top-5 z-10">
        <ul class="menu menu-horizontal bg-base-200 rounded-full grid-cols-4 gap-2">
            <!-- Home -->
            <li>
                <a class="tooltip tooltip-bottom rounded-full hover:bg-primary-content" data-tip="Home" href="./master.php">
                <i class="fa-solid fa-house fa-lg"></i>
                </a>
            </li>

            <li class="">
                <label class="swap swap-rotate">
                    <!-- this hidden checkbox controls the state -->
                    <input type="checkbox" class="theme-controller" id="theme-toggle" />
                    
                    <!-- sun icon -->
                    <div class="swap-off">
                        <i class="fa-solid fa-sun fa-lg"></i>
                    </div>
                    
                    <!-- moon icon -->
                    <div class="swap-on">
                        <i class="fa-solid fa-moon fa-lg"></i>
                    </div>
                </label>
            </li>

            <!-- Add Student -->
            <li class="col-span-2">
                <a class="tooltip tooltip-bottom rounded-full bg-primary hover:bg-primary-content hover:text-current text-white sm:flex" data-tip="Add Student" onclick="my_modal_insert.showModal()">
                <p class="hidden sm:block">เพิ่มข้อมูล</p>
                <i class="fa-solid fa-user-plus fa-lg"></i>
                </a>
            </li>
        </ul>
    </nav>
</header>
<script>
    // ฟังก์ชันเพื่อตรวจสอบและโหลดธีมที่บันทึกไว้ใน localStorage
    function loadTheme() {
        const savedTheme = localStorage.getItem('theme');
        const themeToggle = document.getElementById('theme-toggle');
        
        if (savedTheme === 'night') {
            document.documentElement.setAttribute('data-theme', 'night');
            themeToggle.checked = true; // ถ้าเป็น night ธีมให้ทำให้ปุ่ม toggle ถูกเลือก
        } else {
            document.documentElement.setAttribute('data-theme', 'winter');
            themeToggle.checked = false; // ถ้าเป็น winter ธีมให้ปุ่ม toggle ไม่ถูกเลือก
        }
    }

    // ฟังก์ชันเพื่อเปลี่ยนธีมและบันทึกค่าลง localStorage
    function changeTheme() {
        const themeToggle = document.getElementById('theme-toggle');
        if (themeToggle.checked) {
            document.documentElement.setAttribute('data-theme', 'night');
            localStorage.setItem('theme', 'night'); // บันทึกธีมเป็น night
        } else {
            document.documentElement.setAttribute('data-theme', 'winter');
            localStorage.setItem('theme', 'winter'); // บันทึกธีมเป็น winter
        }
    }

    // เรียกใช้ฟังก์ชันโหลดธีมเมื่อเปิดหน้า
    document.addEventListener('DOMContentLoaded', loadTheme);

    // เพิ่ม event listener ให้กับปุ่ม toggle
    document.getElementById('theme-toggle').addEventListener('change', changeTheme);
</script>