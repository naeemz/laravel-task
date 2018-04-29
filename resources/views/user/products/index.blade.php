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
                                        @if( Auth::user()->stripe_id != '' )
                                            <a class="btn btn-success" href="{{ route('user.ads-charge',$product->id) }}">Pay</a>
                                        @else
                                            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default" onclick="$('#product_id').val('{{$product->id}}');">Pay</button>
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

@if( Auth::user()->stripe_id == '' )

    @section('js')
    <script src="https://js.stripe.com/v3/"></script>
    <script src="{{asset('templates/user/js/stripe.js')}}"></script>
    @endsection

    <style>
        .StripeElement {
            background-color: white;
            height: 40px;
            padding: 10px 12px;
            border-radius: 4px;
            border: 1px solid transparent;
            box-shadow: 0 1px 3px 0 #e6ebf1;
            -webkit-transition: box-shadow 150ms ease;
            transition: box-shadow 150ms ease;
        }

        .StripeElement--focus {
            box-shadow: 0 1px 3px 0 #cfd7df;
        }

        .StripeElement--invalid {
            border-color: #fa755a;
        }

        .StripeElement--webkit-autofill {
            background-color: #fefde5 !important;
        }
    </style>

        <div class="modal fade" id="modal-default">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Subscribe</h4>
                    </div>
                    <form action="{{route('user.first-payment')}}" method="post" id="payment-form">
                        <div class="modal-body">
                            {!! csrf_field() !!}
                            <input type="hidden" name="stripe_token" id="stripe_token" />
                            <input type="hidden" name="product_id" value="" id="product_id" />
                            <div class="form-row">
                                <label for="card-element">
                                    Credit or debit card
                                </label>
                                <div id="card-element">
                                    <!-- A Stripe Element will be inserted here. -->
                                </div>

                                <!-- Used to display form errors. -->
                                <div id="card-errors" role="alert"></div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary pull-right" id="submit-payment">Subscribe & Pay</button>
                        </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
@endif

@endsection
