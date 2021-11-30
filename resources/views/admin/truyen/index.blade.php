@extends('layouts.app')

@section('content')
    @include('layouts.nav')

    <div class="container-fuild">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Liệt kê danh mục </div>
                    <div class="thongbao"></div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <table class="table table-striped table-responsive ">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Tên Truyện</th>
                                    <th scope="col">Hình ảnh</th>
                                    <th scope="col">Slug Truyện</th>
                                    <th scope="col">Tóm Tắt</th>
                                    <th scope="col">Truyện xem nhiều</th>
                                    <th scope="col">lượt xem</th>
                                    <th scope="col">Từ khóa</th>
                                    <th scope="col">Danh mục</th>
                                    <th scope="col">Thể loại</th>
                                    <th scope="col">Kích hoạt</th>
                                    <th scope="col">Ngày tạo</th>
                                    <th scope="col">Ngày cập nhật</th>
                                    <th scope="col">Quản Lý</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($list_truyen as $key => $truyen)
                                    <tr>
                                        <td scope="row">{{ $key }}</td>
                                        <td>{{ $truyen->tentruyen }}</td>
                                        <td>
                                            <img src="{{ asset('public/uploads/truyen/' . $truyen->hinhanh) }}"
                                                height="100" width="100" alt="">
                                        </td>
                                        <td>{{ $truyen->slug_truyen }}</td>
                                        <td>{{ $truyen->tomtat }}</td>
                                        <td width="10%">
                                            @if ($truyen->truyen_noibat == 0)
                                                <form action="">
                                                    @csrf
                                                    <select name="truyennoibat" data-truyen_id={{$truyen->id }} class="custom-select truyennoibat" id="">
                                                        <option selected value="0">Truyện mới</option>
                                                        <option value="1">Truyện nổi bật</option>
                                                        <option value="2">Truyện xem nhiều</option>
                                                    </select>
                                                </form>
                                            @elseif($truyen->truyen_noibat == 1)
                                            <form action="">
                                                @csrf
                                                <select name="truyennoibat" data-truyen_id={{$truyen->id }} class="custom-select truyennoibat" id="">
                                                    <option selected value="0">Truyện mới</option>
                                                    <option value="1">Truyện nổi bật</option>
                                                    <option value="2">Truyện xem nhiều</option>
                                                </select>
                                            </form>
                                            @else()
                                            <form action="">
                                                @csrf
                                                <select name="truyennoibat" data-truyen_id={{$truyen->id }} class="custom-select truyennoibat" id="">
                                                    <option selected value="0">Truyện mới</option>
                                                    <option value="1">Truyện nổi bật</option>
                                                    <option value="2">Truyện xem nhiều</option>
                                                </select>
                                            </form>
                                            @endif

                                        </td>
                                        <td>{{ $truyen->luotxem }}</td>
                                        <td>{{ $truyen->tukhoa }}</td>
                                        <td>{{ $truyen->danhmuctruyen->tendanhmuc }}</td>
                                        <td>{{ $truyen->theloai->tentheloai }}</td>
                                        <td>
                                            @if ($truyen->kichhoat == 0)
                                                <span class="text text-success">Kích hoạt</span>
                                            @else
                                                <span class="text text-danger">Không Kích hoạt</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($truyen->created_at != '')
                                                {{ $truyen->created_at }} - {{ $truyen->created_at->diffForHumans() }}

                                            @endif
                                        </td>
                                        <td>
                                            @if ($truyen->updated_at != '')
                                                {{ $truyen->updated_at }} - {{ $truyen->updated_at->diffForHumans() }}
                                            @endif
                                        </td>
                                        <td>
                                            <form style="display: flex"
                                                action="{{ route('truyen.destroy', [$truyen->id]) }}" method="POST">
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
