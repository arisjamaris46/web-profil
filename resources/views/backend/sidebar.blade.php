<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('admin')}}">
                <div class="sidebar-brand-icon">
                    <img src="{{asset('img/logo.jpg')}}" alt="logo"  class="rounded" style="width: 5.5rem; height:1.5rem;">
                </div>
                <div class="sidebar-brand-text mx-3">ADMIN</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="{{route('admin')}}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Menu
            </div>

           <!-- Nav Item - product -->
           <li class="nav-item">
            <a class="nav-link" href="{{ route('product') }}">
                <i class="fas fa-fw fa-list"></i>
                <span>Produk</span></a>
            </li>

            <!-- Nav Item - client -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('klien') }}">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Klien</span></a>
            </li>

            <!-- Nav Item - contact -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('kontak.pesan') }}">
                    <i class="fas fa-fw fa-address-book"></i>
                    <span>Kontak</span></a>
            </li>

            <!-- Nav Item - contact -->
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fab fa-fw fa-blogger"></i>
                    <span>Blog</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>



        </ul>
        <!-- End of Sidebar -->
