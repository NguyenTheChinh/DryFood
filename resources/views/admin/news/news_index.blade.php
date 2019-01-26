@extends('admin.admin_template')
@section('styles')
    <link href="/css/admin/index.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
@endsection
@section('plugins')
    <script src="/js/ckeditor/ckeditor.js"></script>
    <script async charset="utf-8" src="//cdn.embedly.com/widgets/platform.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="/js/admin/news/news_index.js"></script>
@endsection
@section('content')
    
    <div class="table-responsive">
        <table id="newsTable" class="table table-light table-bordered ck-content" style="width:100%">
            <thead>
            <tr>
                <th>Tên bài viết</th>
                <th>Tổng quan</th>
                <th>Nội dung</th>
                <th>Ảnh đại diện</th>
                <th>Ngày viết</th>
                <th>Ngày chỉnh sửa</th>
                <th>Thao tác</th>
            </tr>
            </thead>
            <tbody>
            @foreach($news as $new)
                <tr>
                    <td><a href="/tin-tic/{{$new->url}}">{{$new->title}}</a></td>
                    <td>{!! $new->subtitle !!}</td>
                    <td>{!! $new->content !!}</td>
                    <td><img src="{{ $new->image }}" height="70px" width="70px" alt="ảnh bài viết"></td>
                    <td>{{$new->created_at->format('H:i:s d/m/Y')}}</td>
                    <td>{{$new->updated_at->format('H:i:s d/m/Y')}}</td>
                    <td class="d-flex">
                        <a class="btn btn-info mr-2" href="/admin/news/{{$new->id}}/edit">
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
    </div>

    <div class="pull-left">
        <a class="btn btn-success" href="/admin/news/create">Thêm bài viết</a>
    </div>
@endsection