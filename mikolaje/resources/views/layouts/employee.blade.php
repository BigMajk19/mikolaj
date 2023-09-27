@include('layouts.inc.head')
Panel Pracownika
    <body class="m-0 font-sans text-base antialiased font-normal leading-default bg-gray-50 text-slate-500">
        <!-- sidenav  -->
        @include('layouts.inc.employee.sidenav')

        <!-- end sidenav -->

        <main class="ease-soft-in-out xl:ml-68.5 relative h-full max-h-screen rounded-xl transition-all duration-200">
            <!-- Navbar -->
            @include('layouts.inc.employee.navbar')

            <!-- end Navbar -->

            <!-- cards -->
            @yield('content')
            <!-- end cards -->

            <!--Footer-->
            @include('layouts.inc.footer')
            <!--end Footer-->
        </main>
        @livewireScripts
    </body>
    @include('layouts.inc.endPluginScripts')
