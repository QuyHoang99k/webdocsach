@extends('layouts.app')

@section('content')
    @include('layouts.nav')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Thêm Chapter </div>
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
                        <form method="POST" action="{{ route('chapter.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên chapter</label>
                                <input onkeyup="ChangeToSlug()" id="slug" type="text" value="{{ old('tentruyen') }}"
                                    class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                    name="tieude" >
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Slug chapter</label>
                                <input type="text" id="convert_slug" value="{{ old('slug_chapter') }}"
                                    class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                    name="slug_chapter" >
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tóm tắt chapter</label>
                                <input type="text" id="convert_slug" value="{{ old('tomtat') }}"
                                class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                name="tomtat" >
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nội dung</label>
                                <textarea class="form-control" id="noidung_chapter" name="noidung" id="" cols="30" rows="5" style="resize: none"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Thuộc truyện</label>
                                <select class="custom-select" name="truyen_id" id="">
                                    @foreach ($truyen as $key => $value)
                                    <option value="{{ $value ->id }}">{{ $value ->tentruyen }}</option>
                                        
                                    @endforeach

                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Kích hoạt</label>
                                <select class="custom-select" name="kichhoat" id="">
                                    <option value="0">Kích hoạt</option>
                                    <option value="1">Không kích hoạt</option>
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
