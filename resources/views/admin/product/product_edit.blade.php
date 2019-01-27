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
    <script src="/js/admin/product/product_edit.js"></script>
@endsection
@section('content')
    <form id="createProductForm" method="POST" enctype="multipart/form-data" action="/admin/product/{{$product->id}}">
        @method('PUT')
        {{ csrf_field() }}
        <div class="form-group row">
            <label for="tenSP" class="col-sm-2 col-form-label">Tên Sản Phẩm</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="name" id="tenSP" placeholder="Tên sản phẩm"
                       value="{{ old('name',$product->name) }}" required>
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
                        <option value="{{$category->id}}"
                                @if(old('category_id',$product->Category->id) == $category->id)
                                selected
                                @endif >
                            {{$category->name}}
                        </option>
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
                <input type="text" class="form-control" name="code" id="maSP"
                       value="{{ old('code',$product->code)}}" placeholder="Mã sản phẩm" required>
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
                <input type="number" min="0" class="form-control" name="old_price" id="giaCu"
                       value="{{ old('old_price',$product->old_price) }}" placeholder="Giá cũ" required>
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
                <input type="number" min="0" class="form-control" name="price" id="giaSP"
                       value="{{ old('price',$product->price) }}"
                       placeholder="Giá sản phẩm" required>
                @if ($errors->has('price'))
                    <span class="help-block">
                    <strong>{{ $errors->first('price') }}</strong>
                </span>
                @endif
            </div>
        </div>
        <div class="row">
            <label class="col-sm-2">Ảnh đại diện hiện tại</label>
            <img src="{{$product->avatar}}" alt="ảnh đại diện" class="col-sm-10 h-75">
        </div>
        <div class="form-group row">
            <label for="customFile" class="col-sm-2 col-form-label">Ảnh đại diện mới</label>
            <div class="custom-file col-sm-10 w-auto">
                <input type="file" name="avatar" class="custom-file-input" id="customFile">
                <label class="custom-file-label" for="customFile">Choose file</label>
            </div>
            @if ($errors->has('avatar'))
                <span class="help-block w-100">
                    <strong>{{ $errors->first('avatar') }}</strong>
                </span>
            @endif
        </div>

        <input type="hidden" name="old_image" value="{{$product->image}}">
        <div class="row">
            <label class="col-sm-2">Ảnh mô tả</label>
            @if(!empty($product->image))
                <table>
                    <tr>
                        @foreach(explode(" | ",$product->image) as $image)
                            <td><img style="max-width: 150px;max-height: 150px;" src="{{$image}}" alt="anh_mo_ta"></td>
                        @endforeach
                    </tr>
                    <tr>
                        @foreach(explode(" | ",$product->image) as $image)
                            <td align="center"><a class="btn btn-danger deleteImg" href="javascript:void(0)"
                                                  data-url="{{$image}}">
                                    <i class="fa fa-trash-o"></i>
                                </a></td>
                        @endforeach
                    </tr>
                </table>
            @else
                Chưa có ảnh mô tả.
            @endif
        </div>

        <div class="form-group row">
            <label for="customFiles" class="col-sm-2 col-form-label">Thêm ảnh sản phẩm</label>
            <div class="custom-file col-sm-10">
                <input type="file" name="image[]" class="custom-file-input" id="customFiles" multiple>
                <label class="custom-file-label" for="customFiles">Choose file</label>
            </div>
        </div>

        <div class="form-group row">
            <label for="subtitle" class="col-sm-2 col-form-label">Mô tả chung</label>
            <textarea name="subtitle" id="subtitle"
                      class="editor col-sm-10">{{ old('subtitle',$product->subtitle)}}</textarea>
        </div>

        <div class="form-group row">
            <label for="description" class="col-sm-2 col-form-label">Mô tả sản phẩm</label>
            {{--<textarea name="description" id="description" class="editor">{{ old('description') or $product->description }}</textarea>--}}
            <textarea name="description" id="description"
                      class="editor">{{ old('description',$product->description)}}</textarea>
        </div>

        <button class="btn btn-primary" type="submit">Sửa</button>
    </form>
@endsection