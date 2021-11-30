@extends('layouts.app')

@section('content')
    @include('layouts.nav')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Cập nhật Truyện </div>
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
                        <form method="POST" action="{{ route('truyen.update', [$truyen->id]) }}"
                            enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên truyện</label>
                                <input onkeyup="ChangeToSlug()" id="slug" type="text"
                                    value="{{($truyen->tentruyen) }}" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" name="tentruyen" >
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tác giả</label>
                                <input type="text" value="{{ $truyen->tacgia }}"
                                    class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                    name="tacgia" >
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Lượt xem</label>
                                <input type="text" value="{{ $truyen->luotxem }}"
                                    class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                    name="luotxem" >
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Từ khóa</label>
                                <input type="text" value="{{ $truyen->tukhoa }}"
                                    class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                    name="tukhoa" >
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Slug truyện</label>
                                <input type="text" id="convert_slug" value="{{($truyen->slug_truyen) }}"
                                    class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                    name="slug_truyen">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tóm tắt truyện</label>
                                <textarea class="form-control" name="tomtat" id="" cols="30" rows="5"
                                    style="resize: none">{{ $truyen->tomtat }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Danh mục truyện</label>
                                <select class="custom-select" name="danhmuc" id="">
                                    @foreach ($danhmuc as $key => $muc)
                                        <option {{ $muc->id==$truyen->danhmuc_id ? 'selected' : '' }} value="{{ $muc->id }}">{{ $muc->tendanhmuc }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Thể loại truyện</label>
                                <select class="custom-select" name="theloai" id="">
                                    @foreach ($theloai as $key => $the)
                                        <option {{ $the->id==$truyen->theloai_id ? 'selected' : '' }} value="{{ $the->id }}">{{ $the->tentheloai }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Hình ảnh truyện</label>
                                <input type="file" id="convert_slug" value="{{ old('slug_truyen') }}"
                                    class="form-control-file" name="hinhanh">
                                <img src="{{ asset('public/uploads/truyen/' . $truyen->hinhanh) }}" height="100" width="100"
                                    alt="">

                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Kích hoạt</label>
                                <select class="custom-select" name="kichhoat" id="">
                                    @if ($truyen->kichhoat = 0)
                                    <option  value="0">Kích hoạt</option>
                                    <option selected value="1">Không kích hoạt</option>
                                    @else
                                    <option selected value="0">Kích hoạt</option>
                                    <option  value="1">Không kích hoạt</option>
                                    @endif
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Truyện nổi bật</label>
                                <select class="custom-select" name="truyennoibat" id="">
                                    @if ($truyen->truyen_noibat = 0)
                                    <option selected value="0">Truyện mới</option>
                                    <option value="1">Truyện nổi bật</option>
                                    <option value="2">Truyện xem nhiều</option>
                                    @elseif($truyen->truyen_noibat = 1)
                                    <option value="0">Truyện mới</option>
                                    <option selected value="1">Truyện nổi bật</option>
                                    <option value="2">Truyện xem nhiều</option>
                                    @else
                                    <option value="0">Truyện mới</option>
                                    <option value="1">Truyện nổi bật</option>
                                    <option selected value="2">Truyện xem nhiều</option>
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
