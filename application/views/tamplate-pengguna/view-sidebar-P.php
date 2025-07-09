<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center 
justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-book"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Pengaduan Siswa</div>
    </a>
    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Looping Menu-->
    <!-- Heading -->
    <div class="sidebar-heading">
        Home
    </div>
    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link pb-0" href="<?=
                                        base_url('Pengguna/dashbroadP'); ?>">
            <i class="fa fa-fw fa book"></i>
            <span>Dashboard</span></a>
    </li>
    <hr class="sidebar-divider mt-3">
    <!-- Heading -->
    <div class="sidebar-heading">
        PENGADUAN
    </div>
    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link pb-0" href="<?=
                                        base_url('Pengguna/pengaduanP'); ?>">
            <i class="fa fa-fw fa book"></i>
            <span>Buat Pengaduan</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link pb-0" href="<?=
                                        base_url('admin/kategori'); ?>">
            <i class="fa fa-fw fa book"></i>
            <span>History Pengaduan</span></a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider mt-3">
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0"
            id="sidebarToggle"></button>
    </div>
</ul>
<!-- End of Sidebar -- >