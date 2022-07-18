<!DOCTYPE html>
<html lang="en">
<!-- Head -->
@include('frontend.templates.partials.head')
<body>
    <!-- Navigation -->
    @include('frontend.templates.partials.navigation')

    <!-- Content -->
    <main>
        <div class="container">
            @yield('content')
        </div>
    </main>

    <!-- Footer -->
    @include('frontend.templates.partials.footer')

    <!-- Scripts -->
    @include('frontend.templates.partials.scripts')
    <!-- Toast -->
    @include('frontend.templates.partials.toast')
</body>
</html>
