@extends('user.layouts.app')

@section('content')

    @section('breadcrumb')
        <ol class="breadcrumb">
            <li><a href="{{route('user.dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    @endsection

    <section class="content">
        <!-- Info boxes -->
        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-aqua"><i class="ion ion-ios-flag"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text"><a href="{{route('user.products.index')}}">Total Products</a></span>
                        <span class="info-box-number"><a href="{{route('user.products.index')}}">{{$products->count()}}</a></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-green"><i class="fa fa-flag-o"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text"><a href="{{route('user.products.index')}}">Paid Products</a></span>
                        <span class="info-box-number"><a href="{{route('user.products.index')}}">{{$products_paid->count()}}</a></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->

            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-red"><i class="fa fa-flag-o"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text"><a href="{{route('user.products.index')}}">Unaid Products</a></span>
                        <span class="info-box-number"><a href="{{route('user.products.index')}}">{{$products_unpaid->count()}}</a></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->

            <!-- fix for small devices only -->
            <div class="clearfix visible-sm-block"></div>

        </div>
        <!-- /.row -->

    </section>

@endsection
