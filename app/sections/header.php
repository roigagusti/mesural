<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO RESPONSIVE -->
            <div class="navbar-brand-box" style="z-index:20">
                <a href="//app.mesural.com/" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="img/mesural_light-sm.png" alt="" style="height:40px;margin-left:5px">
                    </span>
                    <span class="logo-lg">
                        <img src="img/logo-light.png" alt="" style="height:25px;">
                    </span>
                </a>

                <a href="//app.mesural.com/" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="img/mesural_light-sm.png" alt="" style="height:40px;margin-left:5px">
                    </span>
                    <span class="logo-lg">
                        <img src="img/logo-light.png" alt="" style="height:25px;">
                    </span>
                </a>
            </div>

            <!-- BARRES RESPONSIVE -->
            <button type="button" class="btn btn-sm px-3 font-size-16 header-item vertical-menu-btn" onclick="changeBlur()" style="z-index:20">
                <i class="fa fa-bars"></i>
            <button type="button" class="btn btn-sm px-3 font-size-16 header-item vertical-menu-btn menuChevron" style="margin-left: 30px;color:#ccc">
                <i class="fas fa-chevron-right"></i>
            </button>
            </button>
            <div class="responsive-blur hidden"></div>
        </div>

        <div class="d-flex">
            <!-- USUARI -->
            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item " id="page-header-user-dropdown"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="bg-soft-primary rounded-circle text-primary" style="
                    width:36px;
                    height:36px;
                    -webkit-box-align: center;
                    -ms-flex-align: center;
                    align-items: center;
                    background-color: #34c38f;
                    color: #fff;
                    display: inline-flex;
                    font-weight: 500;
                    -webkit-box-pack: center;
                    -ms-flex-pack: center;
                    justify-content: center;">
                    <span style="font-size:0.9em;"><?php echo inicialsNom($userName);?></span>
                    </span>
                    <span class="d-none d-xl-inline-block ml-1 font-weight-medium font-size-15"><?php echo $userFirstName;?></span>
                    <i class="uil-angle-down d-none d-xl-inline-block font-size-15"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item d-block" href="config.php"><span class="align-middle">Configuración</span></a>
                    <a class="dropdown-item" href="conexiones/logout.php"><span class="align-middle">Cerrar sesión</span></a>
                </div>
            </div>

        </div>
    </div>
</header>