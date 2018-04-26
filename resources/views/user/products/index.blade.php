@extends('user.layouts.app')

@section('content')

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{route('user.dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Products</li>
    </ol>
@endsection
@section('page-title', 'Products List')

<!-- Info boxes -->
<div class="row">
    <div class="col-md-12">

        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Products List</h3>
                <a href="{{ route('user.products.create') }}" class="btn btn-primary pull-right">Add Product</a>
            </div><!-- /.box-header with-border -->
            <div class="box-body">

                <table class="table table-bordered table-hover dataTable">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Content</th>
                            <th>Payment</th>
                            <th>Created Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach( $products as $product )
                            <tr>
                                <td>
                                    <a href="{{ route('user.products.edit', $product->id ) }}">{{$product->title}}</a>
                                </td>
                                <td>{!! str_limit( $product->content, 100 ) !!}</td>
                                <td>
                                    @if( $product->payment == 1 ) <span class="btn bg-maroon btn-flat margin">Paid</span> @else <span class="btn bg-warning btn-flat margin">Not Paid</span> @endif
                                </td>
                                <td>{{ date('Y-m-d', strtotime($product->created_at)) }}</td>
                                <td>
                                    <form action="{{ route('user.products.destroy',$product->id) }}" method="POST">
                                        @if( $product->payment == 1 )
                                            <a class="btn btn-warning" href="{{ route('user.products.payment',$product->id) }}">Cancel Payment</a>
                                        @else
                                            <a class="btn btn-success" href="{{ route('user.products.payment',$product->id) }}">Pay</a>
                                        @endif
                                        <a class="btn btn-info" href="{{ route('user.products.show',$product->id) }}">Show</a>
                                        <a class="btn btn-primary" href="{{ route('user.products.edit',$product->id) }}">Edit</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div><!-- /.box-body -->
            {{--<div class="box-footer">

            </div><!-- /.box-footer -->--}}
        </div><!-- /.box -->

    </div>
    <!-- /.col -->
</div>
<!-- /.row -->

@endsection
