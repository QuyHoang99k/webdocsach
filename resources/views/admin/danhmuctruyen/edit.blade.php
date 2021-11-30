@extends('layouts.app')

@section('content')
    @include('layouts.nav')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Cập nhật danh mục Truyện </div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif
                        <form method="POST" action="{{ route('danhmuc.update',[$danhmuc ->id]) }}">
                            @method('PUT')
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên danh mục</label>
                                <input onkeyup="ChangeToSlug()" id="slug"  type="text" value="{{ $danhmuc->tendanhmuc }}" class="form-control" 
                                     name="tendanhmuc" >
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Slug danh mục</label>
                                <input id="convert_slug"  type="text" value="{{ $danhmuc->slug_danhmuc }}" class="form-control" 
                                    name="slug_danhmuc" >
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Mô tả danh mục</label>
                                <input value="{{ $danhmuc->mota }}" type="text" class="form-control" name="mota" >
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Kích hoạt</label>
                                <select class="custom-select" name="kichhoat" id="">
                                    @if ($danhmuc->kichhoat = 0)
                                    <option  value="0">Kích hoạt</option>
                                    <option selected value="1">Không kích hoạt</option>
                                    @else
                                    <option selected value="0">Kích hoạt</option>
                                    <option  value="1">Không kích hoạt</option>
                                    @endif
                                    
                                </select>
                            </div>

                            <button type="submit" name="themdanhmuc" class="btn btn-primary">Cập Nhật</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
