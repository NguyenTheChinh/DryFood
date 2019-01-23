@extends('admin.admin_template')
@include('ckfinder::setup')
@section('styles')
    <link href="/css/admin/index.css" rel="stylesheet">
@endsection
@section('plugins')

@endsection
@section('content')
    <div class="alert alert-success" role="alert">
        <strong>Tạo sản phẩm thành công</strong> <a href="/san-pham/{{$url}}">Click để xem trang sản phẩm</a>
    </div>
@endsection