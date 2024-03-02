<ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color: rgb(0, 123, 191);">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-text mx-3">CRCC</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="index.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>

    <li class="nav-item">
        <a class="nav-link" href="memberlayout.php">
            <i class="fas fa-fw fa-user"></i>
            <span>Member</span></a>
    </li>
    <!-- <li class="nav-item">
        <a class="nav-link" href="musiclayout.php">
            <i class="fas fa-fw fa-user"></i>
            <span>Music Team</span></a>
    </li> -->
    <li class="nav-item">
        <a class="nav-link" href="eventlayout.php">
            <i class="fas fa-fw fa-calendar"></i>
            <span>Event</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="calendarlayout.php">
            <i class="fas fa-fw fa-calendar"></i>
            <span>Calendar</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="attendancelayout.php">
        <i class="fas fa-fw fa-calendar-check"></i>
            <span>Attendance</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseemployee"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Report</span>
        </a>
        <div id="collapseemployee" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Member</h6>
                <!-- <a class="collapse-item" href="/employee">Member</a> -->
                <a class="collapse-item" href="ereport.php">Event</a>
                <a class="collapse-item" href="areport.php">Attendance</a>
            </div>
        </div>
    </li>
</ul>