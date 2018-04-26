@extends('front.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">@lang('home.heading')</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>@lang('home.table_title')</th>
                                <th>@lang('home.table_desc')</th>
                                <th>@lang('home.table_posted')</th>
                                <th>@lang('home.table_view')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach( $products as $ad )
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $ad->title }}</td>
                                    <td>{!! str_limit($ad->content, 50) !!}</td>
                                    <td>{{ date('Y-m-d H:i', strtotime( $ad->created_at)) }}</td>
                                    <td>
                                        <a href="{{ route('ads.show', str_slug($ad->title) ) }}"><i class="fa fa-eye">@lang('home.table_view')</i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
