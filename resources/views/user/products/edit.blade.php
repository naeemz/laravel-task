@extends('user.layouts.app')

@section('content')

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{route('user.dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Product Edit</li>
    </ol>
@endsection
@section('page-title', 'Product Edit')

<!-- Info boxes -->
<div class="row">
    <div class="col-md-12">

        <form class="form" method="post" action="{{ route('user.products.update', $product->id) }}">
            @csrf
            @method('PUT')
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Product Edit</h3>
            </div><!-- /.box-header with-border -->
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{$product->title}}" placeholder="Title" />
                        </div>
                        <div class="form-group">
                            <label for="content">Content</label>
                            <textarea class="textarea" id="content" name="content" placeholder="Content"
                                      style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{$product->content}}</textarea>
                        </div>
                        {{--<div class="form-group">
                            <label for="paypal">Paypal</label>
                            <input type="text" class="form-control" id="paypal" name="paypal" value="1" placeholder="Paypal" />
                        </div>--}}
                    </div><!-- /.col-md-12 -->

                </div><!-- /.row -->
            </div><!-- /.box-body -->
            <div class="box-footer">
                <button type="submit" class="btn btn-primary pull-right">Update</button>
            </div><!-- /.box-footer -->
        </div><!-- /.box -->
        </form>
    </div>
    <!-- /.col -->
</div>
<!-- /.row -->

@section('css')
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="{{ asset('templates/user/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">
@endsection

@section('js')
    <!-- Bootstrap WYSIHTML5 -->
    <script src="{{ asset('templates/user/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
    <script>
        $(function () {
            //bootstrap WYSIHTML5 - text editor
            $('.textarea').wysihtml5()
        })
    </script>
@endsection

@endsection
