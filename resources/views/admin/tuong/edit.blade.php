@extends('layouts.app')

@section('content')
    @include('layouts.nav')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Cập nhật Tướng </div>
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
                        <form method="POST" action="{{ route('tuong.update', [$tuong->id]) }}"
                            enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên sách</label>
                                <input onkeyup="ChangeToSlug()" id="slug" type="text"
                                    value="{{($tuong->tentuong) }}" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" name="tentuong" >
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tóm tắt</label>
                                <input type="text" value="{{ $tuong->tomtat }}"
                                    class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                    name="tomtat" >
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Slug truyện</label>
                                <input type="text" id="convert_slug" value="{{($tuong->slug_tuong) }}"
                                    class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                    name="slug_tuong">
                            </div>
                           
                            <div class="form-group">
                                <label for="exampleInputEmail1">Hình ảnh sách</label>
                                <input type="file" id="convert_slug" value="{{ old('slug_tuong') }}"
                                    class="form-control-file" name="hinhanh">
                                <img src="{{ asset('public/uploads/tuong/' . $tuong->hinhanh) }}" height="100" width="100"
                                    alt="">

                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Kích hoạt</label>
                                <select class="custom-select" name="kichhoat" id="">
                                    @if ($tuong->kichhoat = 0)
                                    <option  value="0">Kích hoạt</option>
                                    <option selected value="1">Không kích hoạt</option>
                                    @else
                                    <option selected value="0">Kích hoạt</option>
                                    <option  value="1">Không kích hoạt</option>
                                    @endif
                                </select>
                            </div>

                            <button type="submit" name="themtuong" class="btn btn-primary">Cập Nhật</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
