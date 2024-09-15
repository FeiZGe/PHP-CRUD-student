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
                    <input type="checkbox" class="theme-controller" value="night" />
                    
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
                <a class="tooltip tooltip-bottom rounded-full bg-primary hover:bg-primary-content hover:text-current text-white sm:flex" data-tip="Add Student" onclick="my_modal_sorry.showModal()">
                <p class="hidden sm:block">เพิ่มข้อมูล</p>
                <i class="fa-solid fa-user-plus fa-lg"></i>
                </a>
            </li>
        </ul>
    </nav>
</header>