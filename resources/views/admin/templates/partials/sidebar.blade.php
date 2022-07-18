<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('admin.dashboard') }}" class="brand-link">
        <img src="{{ asset('assets/dist/img/logo.png') }}" alt="Perpustakaan Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">PERPUSTAKAAN</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('assets/dist/img/user.png') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ auth()->user()->name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('admin.author.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>Penulis</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.book.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>Buku</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.borrow.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-file"></i>
                        <p>Buku Sedang Dipinjam</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.report.top-book') }}" class="nav-link">
                        <i class="nav-icon fas fa-award"></i>
                        <p>Top Buku</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.report.top-user') }}" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Pengguna Teraktif</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
