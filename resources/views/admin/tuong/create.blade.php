@extends('layouts.app')

@section('content')
    @include('layouts.nav')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Thêm Tướng </div>
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
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form method="POST" action="{{ route('tuong.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên tướng</label>
                                <input onkeyup="ChangeToSlug()" id="slug" type="text" value="{{ old('tentuong') }}"
                                    class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                    name="tentuong">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">tóm tắt</label>
                                <input type="text" value="{{ old('tomtat') }}"
                                    class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                    name="tomtat" >
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Slug tướng</label>
                                <input type="text" id="convert_slug" value="{{ old('slug_tuong') }}"
                                    class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                    name="slug_tuong" >
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Cốt truyện</label>
                                <textarea class="form-control" id="noidung_chapter" name="noidung" id="" cols="30" rows="5" style="resize: none"></textarea>

                            </div>
                            
                            <div class="form-group">
                                <label for="exampleInputEmail1">Hình ảnh tướng</label>
                                <input type="file" id="convert_slug" value="{{ old('slug_tuong') }}"
                                    class="form-control-file" name="hinhanh">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Kích hoạt</label>
                                <select class="custom-select" name="kichhoat" id="">
                                    <option value="0">Kích hoạt</option>
                                    <option value="1">Không kích hoạt</option>
                                </select>
                            </div>
                            <button type="submit" name="themtuong" class="btn btn-primary">Thêm</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
