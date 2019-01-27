@extends('admin.admin_template')
@include('ckfinder::setup')
@section('styles')
    <link href="/css/admin/index.css" rel="stylesheet">
@endsection
@section('plugins')

@endsection
@section('content')
    <div class="alert alert-success" role="alert">
        <strong>Sửa bài viết thành công</strong> <a href="/tin-tuc/{{$url}}" target="_blank">Click để xem bài viết</a>
    </div>
@endsection