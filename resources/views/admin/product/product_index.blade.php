@extends('admin.admin_template')
@section('styles')
    <link href="/css/admin/index.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
@endsection
@section('plugins')
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="/js/admin/product/product_index.js"></script>
@endsection
@section('content')
    <div class="text-center">
        <a class="btn btn-success" href="/admin/product/create">Thêm sản phẩm</a>
    </div>
    <table id="productTable" class="table table-light table-bordered" style="width:100%">
        <thead>
        <tr>
            <th>Loại sản phẩm</th>
            <th>Tên sản phẩm</th>
            <th>Mô tả chung</th>
            <th>Mô tả</th>
            <th>Mã sản phẩm</th>
            <th>Giá cũ</th>
            <th>Giá</th>
            <th>Ảnh đại diện</th>
            <th>Thao tác</th>
        </tr>
        </thead>
        <tbody>
        @foreach($products as $product)
            <tr>
                <td>{{$product->category->name}}</td>
                <td><a href="/san-pham/{{$product->url}}">{{$product->name}}</a></td>
                <td>{!! $product->subtitle !!}</td>
                <td>{!! $product->description !!}</td>
                <td>{{$product->code}}</td>
                <td>{{$product->old_price}}</td>
                <td>{{$product->price}}</td>
                <td>
                    <img src="{{$product->avatar}}" height="70px" width="70px" alt="ảnh sản phẩm">
                </td>
                <td class="d-flex">
                    <a class="btn btn-info mr-2" href="/admin/product/{{$product->id}}/edit">
                        <i class="fa fa-edit"></i>
                    </a>
                    <a class="btn btn-danger deleteOrder" href="javascript:void(0)">
                        <i class="fa fa-trash-o"></i>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection