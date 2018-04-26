@extends('user.layouts.app')

@section('content')

    @section('breadcrumb')
        <ol class="breadcrumb">
            <li><a href="{{route('user.dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Profile</li>
        </ol>
    @endsection
    @section('page-title', $user->name.' Profile')

        <!-- Info boxes -->
        <div class="row">
            <div class="col-md-12">
                <form method="post" action="{{ route('user.profile.update') }}" >
                    @csrf
                    @method('PUT')
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Profile Update</h3>
                    </div><!-- /.box-header with-border -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="profile-name">Full Name</label>
                                    <input type="text" class="form-control" id="profile-name" name="name" value="{{$user->name}}" placeholder="Full Name" />
                                </div>
                            </div><!-- /.col-md-6 -->
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

@endsection
