<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>

    @include('user.layouts.head')

    @yield('css')

</head>

<body class="hold-transition skin-blue sidebar-mini">

<div class="wrapper">

    @include('user.layouts.top-nav')

    @include('user.layouts.left-nav')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                @yield('page-title', 'Dashboard')
                {{--<small>Version 2.0</small>--}}
            </h1>
            @yield('breadcrumb')

        </section>

        <section class="content">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if(session()->has('message.level'))
                <div class="alert alert-dismissible alert-{{ session('message.level') }}" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                    {!! session('message.content') !!}
                </div>
            @endif

            @yield('content')

        </section><!-- /.content -->

    </div><!-- /.content-wrapper -->

    @include('user.layouts.footer')

</div><!-- /.wrapper -->


<!-- jQuery 3 -->
<script src="{{ asset('templates/user') }}/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('templates/user') }}/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="{{ asset('templates/user') }}/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="{{ asset('templates/user') }}/js/adminlte.min.js"></script>
<!-- Sparkline -->
<script src="{{ asset('templates/user') }}/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap  -->
<script src="{{ asset('templates/user') }}/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="{{ asset('templates/user') }}/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- SlimScroll -->
<script src="{{ asset('templates/user') }}/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- ChartJS -->
<script src="{{ asset('templates/user') }}/bower_components/Chart.js/Chart.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('templates/user') }}/js/pages/dashboard2.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('templates/user') }}/js/demo.js"></script>

@yield('js')

</body>
</html>