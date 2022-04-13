<nav class="sidebar close">
        <header>
            <div class="image-text">
                <span class="image">
                    <img src="img/logo.png" alt="">
                </span>

                <div class="text logo-text">
                    <span class="name">Talent Cloud</span>
                    <span class="profession">by Provenzal</span>
                </div>
            </div>

            <i class='bx bx-chevron-right toggle'></i>
        </header>

        <div class="menu-bar">
            <div class="menu">

                <!-- <li class="search-box">
                    <i class='bx bx-search icon'></i>
                    <input type="text" placeholder="Search...">
                </li> -->
                <li class="<?php if($active==1){echo "mode";} ?>">
                    <a href="dashboard.php">
                        <i class='bx bx-home icon' ></i>
                        <span class="text nav-text">Inicio</span>
                    </a>
                </li>
                <li class="<?php if($active==2){echo "mode";} ?>">
                    <a href="admin.php">
                        <i class='bx bx-user-pin icon' ></i>
                        <span class="text nav-text">Administradores</span>
                    </a>
                </li>

                <li class="<?php if($active==3){echo "mode";} ?>">
                    <a href="#">
                        <i class='bx bx-user icon' ></i>
                        <span class="text nav-text">Empleados</span>
                    </a>
                </li>
                

               
            </div>

            <div class="bottom-content">
                <li class="">
                    <a href="#">
                        <i class='bx bx-log-out icon' ></i>
                        <span class="text nav-text">Logout</span>
                    </a>
                </li>

                <!-- <li class="mode">
                    <div class="sun-moon">
                        <i class='bx bx-moon icon moon'></i>
                        <i class='bx bx-sun icon sun'></i>
                    </div>
                    <span class="mode-text text">Dark mode</span>

                    <div class="toggle-switch">
                        <span class="switch"></span>
                    </div>
                </li> -->
                
            </div>
        </div>

    </nav>