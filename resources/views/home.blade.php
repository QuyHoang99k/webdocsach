@extends('layouts.app')

@section('content')
@include('layouts.nav')
<div class="container ">
    <div class="row justify-content-center ">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Quản Lý</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a class="dropdown-item" href="{{ route('truyen.index') }}">Liệt kê Truyện</a>
                    <a class="dropdown-item" href="{{ route('danhmuc.index') }}">Liệt kệ danh mục</a>
                    <a class="dropdown-item" href="{{ route('theloai.index') }}">Liệt kê thể loại</a>
                    <a class="dropdown-item" href="{{ route('tuong.index') }}">Liệt kê danh sách tướng </a>
                    <a class="dropdown-item" href="{{ route('chapter.index') }}">Liệt kệ chapter</a>

 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
