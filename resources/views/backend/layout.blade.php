@include('backend.header')
@include('backend.sidebar')
@include('backend.navbar')

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    @yield('content')

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
@include('backend.footer')
