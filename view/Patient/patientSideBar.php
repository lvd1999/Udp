<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="patient_home.php">
        <div class="sidebar-brand-icon">
            <img src="../../content/img/logo.png" alt="logo" style="width: 40px;"/>
        </div>
        <div class="sidebar-brand-text mx-3">Dr.Book</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <li class="nav-item active">
        <a class="nav-link" href="patient_home.php">
            <i class="fas fa-home"></i>
            <span>Home</span></a>
    </li>
    <!-- Heading -->

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-calendar-alt"></i>
            <span>Appointments</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">

                <a class="collapse-item" href="upcoming_appointments.php">Upcoming</a>
                <a class="collapse-item" href="past_appointments.php">Past</a>
            </div>
        </div>
    </li>

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->