@extends('admin.admin_template')
@include('ckfinder::setup')
@section('styles')
    <link href="/css/admin/index.css" rel="stylesheet">
@endsection
@section('plugins')
    <script type="text/javascript" src="/js/ckfinder/ckfinder.js"></script>
    <script>CKFinder.config({connectorPath: '/ckfinder/connector'});</script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.0/dist/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.0/dist/additional-methods.min.js"></script>
    <script src="/js/admin/product/product_create.js"></script>
@endsection
@section('content')
    <form id="createProductForm" method="POST" enctype="multipart/form-data" action="/admin/product">
        {{ csrf_field() }}
        <div class="form-group row">
            <label for="tenSP" class="col-sm-2 col-form-label">Tên Sản Phẩm</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="name" id="tenSP" placeholder="Tên sản phẩm"
                       value="{{ old('name') }}" required>
                @if ($errors->has('name'))
                    <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="loaiSP" class="col-sm-2 col-form-label">Loại Sản Phẩm</label>
            <div class="col-sm-10">
                <select name="category_id" class="custom-select" required>
                    @foreach($categories as $category)
                        <option value="{{$category->id}}" {{(string)$category->id==old('category_id') ? 'selected' : ''}}>{{$category->name}}</option>
                    @endforeach
                </select>
                @if ($errors->has('category_id'))
                    <span class="help-block">
                        <strong>{{ $errors->first('category_id') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="maSP" class="col-sm-2 col-form-label">Mã Sản Phẩm</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="code" id="maSP" placeholder="Mã sản phẩm" value="{{ old('code') }}" required>
                @if ($errors->has('code'))
                    <span class="help-block">
                    <strong>{{ $errors->first('code') }}</strong>
                </span>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="giaCu" class="col-sm-2 col-form-label">Giá cũ</label>
            <div class="col-sm-10">
                <input type="number" min="0" class="form-control" name="old_price" id="giaCu" value="{{ old('old_price') }}" placeholder="Giá cũ" required>
                @if ($errors->has('old_price'))
                    <span class="help-block">
                    <strong>{{ $errors->first('old_price') }}</strong>
                </span>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="giaSP" class="col-sm-2 col-form-label">Giá Sản Phẩm</label>
            <div class="col-sm-10">
                <input type="number" min="0" class="form-control" name="price" id="giaSP" value="{{ old('price') }}" placeholder="Giá sản phẩm" required>
                @if ($errors->has('price'))
                    <span class="help-block">
                    <strong>{{ $errors->first('price') }}</strong>
                </span>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="customFile" class="col-sm-2 col-form-label">Ảnh đại diện</label>
            <div class="col-sm-10">
                <div class="custom-file">
                    <input type="file" name="avatar" class="custom-file-input" id="customFile" required>
                    <label class="custom-file-label" for="customFile">Choose file</label>
                </div>
            </div>
            
            @if ($errors->has('avatar'))
                <span class="help-block w-100">
                    <strong>{{ $errors->first('avatar') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group row">
            <label for="customFiles" class="col-sm-2 col-form-label">Ảnh sản phẩm</label>
            <div class="col-sm-10">
                <div class="custom-file">
                    <input type="file" name="image[]" class="custom-file-input" id="customFiles" multiple>
                    <label class="custom-file-label" for="customFiles">Choose file</label>
                </div>
            </div>
            
        </div>

        <div class="form-group row">
            <label for="subtitle" class="col-sm-2 col-form-label">Mô tả chung</label>
            <div class="col-sm-10">
                <textarea name="subtitle" id="subtitle" class="editor">{{ old('subtitle') }}</textarea>
            </div>
            
        </div>

        <div class="form-group row">
            <label for="description" class="col-sm-2 col-form-label">Mô tả sản phẩm</label>
            <div class="col-sm-10">
                <textarea name="description" id="description" class="editor">{{ old('description') }}</textarea>
            </div>
        </div>

        <button class="btn btn-primary pull-right" type="submit">Tạo sản phẩm</button><br><br>
    </form>
@endsection