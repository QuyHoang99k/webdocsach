@extends('layouts.app')

@section('content')
    @include('layouts.nav')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Thêm Truyện </div>
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
                        <form method="POST" action="{{ route('truyen.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên truyện</label>
                                <input onkeyup="ChangeToSlug()" id="slug" type="text" value="{{ old('tentruyen') }}"
                                    class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                    name="tentruyen">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tác giả</label>
                                <input type="text" value="{{ old('tacgia') }}"
                                    class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                    name="tacgia" >
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Lượt xem</label>
                                <input type="text" value="{{ old('luotxem') }}"
                                    class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                    name="luotxem" >
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Từ khóa</label>
                                <input type="text" value="{{ old('tukhoa') }}"
                                    class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                    name="tukhoa" >
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Slug truyện</label>
                                <input type="text" id="convert_slug" value="{{ old('slug_truyen') }}"
                                    class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                    name="slug_truyen" >
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tóm tắt truyện</label>
                                <textarea class="form-control" name="tomtat" id="" cols="30" rows="5" style="resize: none"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Danh mục truyện</label>
                                <select class="custom-select" name="danhmuc" id="">
                                    @foreach ($danhmuc as $key => $muc)
                                    <option value="{{ $muc ->id }}">{{ $muc ->tendanhmuc }}</option>
                                        
                                    @endforeach

                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Thể loại truyện</label>
                                <select class="custom-select" name="theloai" id="">
                                    @foreach ($theloai as $key => $the)
                                    <option value="{{ $the ->id }}">{{ $the ->tentheloai }}</option>
                                        
                                    @endforeach

                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Hình ảnh truyện</label>
                                <input type="file" id="convert_slug" value="{{ old('slug_truyen') }}"
                                    class="form-control-file" name="hinhanh">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Kích hoạt</label>
                                <select class="custom-select" name="kichhoat" id="">
                                    <option value="0">Kích hoạt</option>
                                    <option value="1">Không kích hoạt</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Truyện nổi bật/hot</label>
                                <select class="custom-select" name="truyennoibat" id="">
                                    <option value="0">Truyện mới</option>
                                    <option value="1">Truyện nổi bật</option>
                                    <option value="2">Truyện xem nhiều</option>
                                </select>
                            </div>
                            <button type="submit" name="themdanhmuc" class="btn btn-primary">Thêm</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
