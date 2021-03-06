<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset('templates/user/img/default-user.png') }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ Auth::user()->name }}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li class="">
                <a href="{{route('user.dashboard')}}">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>

            <li class="">
                <a href="{{route('user.products.index')}}">
                    <i class="fa fa-dashboard"></i> <span>All Products</span>
                </a>
            </li>

            <li class="">
                <a href="{{route('user.profile.edit')}}">
                    <i class="fa fa-user"></i> <span>Profile</span>
                </a>
            </li>

            <li class="">
                <a href="{{route('user.password.edit')}}">
                    <i class="fa fa-user"></i> <span>Update Password</span>
                </a>
            </li>

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
