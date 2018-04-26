@extends('user.layouts.app')

@section('content')

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{route('user.dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Product</li>
    </ol>
@endsection
@section('page-title', 'Product')

<!-- Info boxes -->
<div class="row">
    <div class="col-md-12">

            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Product View</h3>
                </div><!-- /.box-header with-border -->
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-striped">
                                <tr>
                                    <th>Title</th>
                                    <td>{{$product->title}}</td>
                                </tr>
                                <tr>
                                    <th>Content</th>
                                    <td>{!! $product->content !!}</td>
                                </tr>

                                <tr>
                                    <th>Payment</th>
                                    <td>

                                    </td>
                                </tr>

                            </table>
                        </div><!-- /.col-md-12 -->

                    </div><!-- /.row -->
                </div><!-- /.box-body -->
                <div class="box-footer">
                </div><!-- /.box-footer -->
            </div><!-- /.box -->
    </div>
    <!-- /.col -->
</div>
<!-- /.row -->
@endsection
