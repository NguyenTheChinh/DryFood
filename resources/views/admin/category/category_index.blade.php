@extends('admin.admin_template')
@section('styles')
    <link href="/css/admin/index.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
@endsection
@section('plugins')
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="/js/admin/category/category_index.js"></script>
@endsection
@section('content')
    <div class="text-center">
        <div>
            <button class="btn btn-success" id="createCategory" data-toggle="modal" data-target="#createModal">Thêm loại sản phẩm
            </button>
        </div>
        @if ($errors->has('name'))
            <span class="help-block w-100">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
        @endif
        <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Nhập tên loại sản phẩm</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="/admin/category" method="POST">
                            {{ csrf_field() }}
                            <input type="text" class="form-control mb-2" id="name" name="name">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                            <button type="submit" class="btn btn-primary">Thêm</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <table id="categoryTable" class="table table-light table-bordered" style="width:100%">
        <thead>
        <tr>
            <th>Tên loại sản phẩm</th>
            <th>Số sản phẩm</th>
            <th>Thao tác</th>
        </tr>
        </thead>
        <tbody>
        @foreach($categories as $category)
            <tr>
                <td><a href="/danh-muc/{{$category->url}}">{{$category->name}}</a></td>
                <td>{{$category->Product->count()}}</td>
                <td class="d-flex">
                    <a class="btn btn-info mr-2" href="/admin/category/{{$category->id}}/edit">
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