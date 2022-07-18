<!DOCTYPE html>
<html lang="en">
<!-- Head -->
@include('admin.templates.partials.head')
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Header (Nav) -->
        @include('admin.templates.partials.header')
        <!-- Sidebar -->
        @include('admin.templates.partials.sidebar')
        <!-- Content --> 
        <div class="content-wrapper">
            <!-- Content Header -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h4 class="m-0">{{ Breadcrumbs::current()->title }}</h4>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"> {{ Breadcrumbs::render() }}</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </section>
        </div>
        <!-- Footer -->
        @include('admin.templates.partials.footer')
        <!-- Control Sidebar -->
        @include('admin.templates.partials.control')
    </div>
    <!--  Script -->
    @include('admin.templates.partials.scripts')
</body>
</html>
