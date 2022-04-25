<div class="vertical-menu">
    <!-- Logo -->
    <div class="navbar-brand-box">
        <a href="//app.mesural.com/" class="logo logo-dark">
            <span class="logo-sm">
                <img src="img/mesural_light-sm.png" alt="" style="height:40px;margin-left:5px">
            </span>
            <span class="logo-lg">
                <img src="img/mesural_light.png" alt="" style="height:25px;">
            </span>
        </a>

        <a href="//app.mesural.com/" class="logo logo-light">
            <span class="logo-sm">
                <img src="img/mesural_light-sm.png" alt="" style="height:40px;margin-left:5px">
            </span>
            <span class="logo-lg">
                <img src="img/mesural_light.png" alt="" style="height:25px;">
            </span>
        </a>
    </div>

    <button type="button" class="btn btn-sm px-3 font-size-16 header-item vertical-menu-btn" style="color:#ccc">
        <i class="fas fa-chevron-left"></i>
    </button>

    <div data-simplebar class="sidebar-menu-scroll">
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menú</li>
                <li>
                    <a href="index.php">
                        <svg class="nav-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24.75 24.75" fill="currentColor" fill-opacity="0" stroke="currentColor" stroke-width="2" focusable="false" aria-hidden="true" role="presentation" stroke-linecap="round" stroke-linejoin="round">
                          <g id="Capa_2" data-name="Capa 2"><g id="Capa_1-2" data-name="Capa 1"><rect class="cls-1" x="0.38" y="0.38" width="24" height="24" rx="6.86"></rect><circle class="cls-1" cx="12.38" cy="12.38" r="6.06" transform="translate(-3.79 19.07) rotate(-67.5)"></circle></g></g>
                        </svg>
                        <!--<i class="uil-folder"></i>-->
                        <span>Cápsulas</span>
                    </a>
                </li>
                <li>
                    <a href="analytics.php">
                        <svg width="24" aria-hidden="true" focusable="false" data-prefix="far" data-icon="chart-bar" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="nav-icon"><path fill="currentColor" d="M396.8 352h22.4c6.4 0 12.8-6.4 12.8-12.8V108.8c0-6.4-6.4-12.8-12.8-12.8h-22.4c-6.4 0-12.8 6.4-12.8 12.8v230.4c0 6.4 6.4 12.8 12.8 12.8zm-192 0h22.4c6.4 0 12.8-6.4 12.8-12.8V140.8c0-6.4-6.4-12.8-12.8-12.8h-22.4c-6.4 0-12.8 6.4-12.8 12.8v198.4c0 6.4 6.4 12.8 12.8 12.8zm96 0h22.4c6.4 0 12.8-6.4 12.8-12.8V204.8c0-6.4-6.4-12.8-12.8-12.8h-22.4c-6.4 0-12.8 6.4-12.8 12.8v134.4c0 6.4 6.4 12.8 12.8 12.8zM496 400H48V80c0-8.84-7.16-16-16-16H16C7.16 64 0 71.16 0 80v336c0 17.67 14.33 32 32 32h464c8.84 0 16-7.16 16-16v-16c0-8.84-7.16-16-16-16zm-387.2-48h22.4c6.4 0 12.8-6.4 12.8-12.8v-70.4c0-6.4-6.4-12.8-12.8-12.8h-22.4c-6.4 0-12.8 6.4-12.8 12.8v70.4c0 6.4 6.4 12.8 12.8 12.8z" class=""></path></svg>
                        <span>Analíticas</span>
                    </a>
                </li>
                <?php if($accountType==0){?>
                <li>
                    <a href="admin.php">
                        <svg width="24" aria-hidden="true" focusable="false" data-prefix="fal" data-icon="cog" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg-inline--fa fa-tools fa-w-16"><path fill="currentColor" d="M502.6 389.5L378.2 265c-15.6-15.6-36.1-23.4-56.6-23.4-15.4 0-30.8 4.4-44.1 13.3L192 169.4V96L64 0 0 64l96 128h73.4l85.5 85.5c-20.6 31.1-17.2 73.3 10.2 100.7l124.5 124.5c6.2 6.2 14.4 9.4 22.6 9.4 8.2 0 16.4-3.1 22.6-9.4l67.9-67.9c12.4-12.6 12.4-32.8-.1-45.3zM160 158.1v1.9h-48L42.3 67 67 42.3l93 69.7v46.1zM412.1 480L287.7 355.5c-9.1-9.1-14.1-21.1-14.1-33.9 0-12.8 5-24.9 14.1-33.9 9.1-9.1 21.1-14.1 33.9-14.1 12.8 0 24.9 5 33.9 14.1L480 412.1 412.1 480zM64 432c0 8.8 7.2 16 16 16s16-7.2 16-16-7.2-16-16-16-16 7.2-16 16zM276.8 66.9C299.5 44.2 329.4 32 360.6 32c6.9 0 13.8.6 20.7 1.8L312 103.2l13.8 83 83.1 13.8 69.3-69.3c6.7 38.2-5.3 76.8-33.1 104.5-8.9 8.9-19.1 16-30 21.5l23.6 23.6c10.4-6.2 20.2-13.6 29-22.5 37.8-37.8 52.7-91.4 39.7-143.3-2.3-9.5-9.7-17-19.1-19.6-9.5-2.6-19.7 0-26.7 7l-63.9 63.9-44.2-7.4-7.4-44.2L410 50.3c6.9-6.9 9.6-17.1 7-26.5-2.6-9.5-10.2-16.8-19.7-19.2C345.6-8.3 292 6.5 254.1 44.3c-12.9 12.9-22.9 27.9-30.1 44v67.8l22.1 22.1c-9.6-40.4 1.6-82.2 30.7-111.3zM107 467.1c-16.6 16.6-45.6 16.6-62.2 0-17.1-17.1-17.1-45.1 0-62.2l146.1-146.1-22.6-22.6L22.2 382.3c-29.6 29.6-29.6 77.8 0 107.5C36.5 504.1 55.6 512 75.9 512c20.3 0 39.4-7.9 53.7-22.3L231.4 388c-6.7-9.2-11.8-19.3-15.5-29.8L107 467.1z" class=""></path></svg>
                        <span>Administración</span>
                    </a>
                </li>
                <li>
                    <a href="omega.php">
                        <svg width="24" aria-hidden="true" focusable="false" data-prefix="fal" data-icon="cog" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg-inline--fa fa-omega fa-w-14"><path fill="currentColor" d="M360.62 432c63.3-49.55 99.85-131.8 81.75-222.07-17.42-86.85-87.35-156.72-174.13-173.58C125.19 8.56 0 117.63 0 256c0 71.72 34.05 135.04 86.38 176H15.96C7.15 432 0 439.16 0 448v16c0 8.84 7.15 16 15.96 16h127.71c8.82 0 15.96-7.16 15.96-16v-22.99c0-11.82-5.98-23.28-16.45-28.7-66.69-34.53-108.68-110.48-91.4-193.8 13.81-66.57 67.39-120.48 133.77-134.49C298.88 60.09 399.11 146.53 399.11 256c0 68.22-38.99 127.37-95.76 156.54-10.16 5.22-15.99 16.28-15.99 27.72V464c0 8.84 7.15 16 15.96 16h127.71c8.82 0 15.96-7.16 15.96-16v-16c0-8.84-7.15-16-15.96-16h-70.41z" class=""></path></svg>
                        <span>Omega</span>
                    </a>
                </li>
            <?php } ?>
            </ul>
        </div>
    </div>
</div>