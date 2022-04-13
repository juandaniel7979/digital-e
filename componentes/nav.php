<nav class="sidebar close">
        <header>
            <div class="image-text">
                <span class="image">
                    <img src="logo/azulsinnombre.png" alt="">
                </span>

                <div class="text logo-text">
                    <span class="name">Digital</span>
                    <span class="name">Entrepreneurs</span>
                </div>
            </div>

            <i class='bx bx-chevron-right toggle'></i>
        </header>

        <div class="menu-bar">
            <div class="menu">

            
                <li class="<?php if($active==1){echo "mode";} ?>">
                    <a href="dashboard.php">
                        <i class='bx bx-home icon' ></i>
                        <span class="text nav-text">Inicio</span>
                    </a>
                </li>
                
                <li class="<?php if($active==2){echo "mode";} ?>">
                    <a href="cursos.php">
                        <i class='bx bx-tv icon' ></i>
                        <span class="text nav-text">Cursos</span>
                    </a>
                </li>

                <li class="<?php if($active==3){echo "mode";} ?>">
                    <a href="#">
                        <i class='bx bxs-user-badge icon' ></i>
                        <span class="text nav-text">Profesores</span>
                    </a>
                </li>

                <li class="<?php if($active==4){echo "mode";} ?>">
                    <a href="#">
                        <i class='bx bx-envelope icon' ></i>
                        <span class="text nav-text">Contáctenos</span>
                    </a>
                </li>

                <li class="<?php if($active==5){echo "mode";} ?>">
                    <a href="dashboard/legal/TERMINOSYCONDICIONES.pdf">
                        <i class='bx bx-shield-quarter icon' ></i>
                        <span class="text nav-text">Términos y <br>condiciones </span>
                    </a>
                </li>

                <li class="<?php if($active==6){echo "mode";} ?>">
                    <a href="dashboard/legal/HABEASDATA.pdf">
                        <i class='bx bx-task icon' ></i>
                        <span class="text nav-text">Habeas data</span>
                    </a>
                </li>
                

               
            </div>

            <div class="bottom-content">
                <li class="">
                    <a href="scripts/logout.php">
                        <i class='bx bx-log-out icon' ></i>
                        <span class="text nav-text">Cerrar sesión</span>
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