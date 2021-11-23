@extends('layouts.app')

@section('content')
    @include('layouts.nav')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Liệt kê danh mục </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Tên Truyện</th>
                                    <th scope="col">Hình ảnh</th>
                                    <th scope="col">Slug Truyện</th>
                                    <th scope="col">Tóm Tắt</th>
                                    <th scope="col">Danh mục</th>
                                    <th scope="col">Kích hoạt</th>
                                    <th scope="col">Quản Lý</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($list_truyen as $key => $truyen)
                                    <tr>
                                        <td scope="row">{{ $key }}</td>
                                        <td>{{ $truyen->tentruyen }}</td>
                                        <td>
                                            <img src="{{ asset('public/uploads/truyen/'.$truyen->hinhanh) }}" height="100" width="100" alt="">
                                        </td>
                                        <td>{{ $truyen->slug_truyen }}</td>
                                        <td>{{ $truyen->tomtat }}</td>
                                        <td>{{ $truyen->danhmuctruyen->tendanhmuc }}</td>
                                        <td>
                                            @if ($truyen->kichhoat == 0)
                                                <span class="text text-success">Kích hoạt</span>
                                            @else
                                                <span class="text text-danger">Không Kích hoạt</span>
                                            @endif
                                        </td>
                                        <td>
                                            <form action="{{ route('truyen.destroy', [$truyen->id]) }}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button onclick="return confirm('Bạn muốn xóa truyện này không')"
                                                    class="btn btn-danger">Delete</button>
                                                <a href="{{ route('truyen.edit', [$truyen->id]) }}"
                                                    class="btn btn-primary">Edit</a>

                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
