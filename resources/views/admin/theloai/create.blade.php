@extends('layouts.app')

@section('content')
    @include('layouts.nav')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Thêm thể loại </div>
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
                        <form method="POST" action="{{ route('theloai.store') }}">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên thể loại</label>
                                <input onkeyup="ChangeToSlug()" id="slug" type="text" value="{{ old('tentheloai') }}" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" name="tentheloai" >
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Slug thể loại</label>
                                <input type="text" id="convert_slug" value="{{ old('slug_theloai') }}" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" name="slug_theloai">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Mô tả thể loại</label>
                                <input type="text" class="form-control" value="{{ old('mota') }}" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" name="mota" >
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
