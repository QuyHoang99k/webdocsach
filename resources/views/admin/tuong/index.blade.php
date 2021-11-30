@extends('layouts.app')

@section('content')
    @include('layouts.nav')

    <div class="container-fuild">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Liệt kê danh sách tướng </div>

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
                                    <th scope="col">Tên tướng</th>
                                    <th scope="col">Slug tướng</th>
                                    <th scope="col">Giới Thiệu</th>
                                    <th scope="col">Kích hoạt</th>
                                    <th scope="col">ngày tạo</th>
                                    <th scope="col">ngày update</th>
                                    <th scope="col">hình ảnh</th>
                                    <th scope="col">Quản Lý</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tuong as $key => $s)
                                    <tr>
                                        <td scope="row">{{ $key }}</td>
                                        <td>{{ $s->tentuong }}</td>
                                        <td>{{ $s->slug_tuong }}</td>
                                        <td>{{ $s->tomtat }}</td>
                                        <td>
                                            @if ($s->kichhoat == 0)
                                                <span class="text text-success">Kích hoạt</span>
                                            @else
                                                <span class="text text-danger">Không Kích hoạt</span>
                                            @endif
                                        </td>
                                
                                        <td>{{ $s->created_at }}</td>
                                       
                                        <td>{{ $s->updated_at }}</td>
                                        <td><img src="{{ asset('public/uploads/tuong/' . $s->hinhanh) }}"
                                          height="100" width="100" alt=""></td>
                                        <td>
                                          <form action="{{ route('tuong.destroy', [$s->id]) }}" method="POST">
                                              @method('DELETE')
                                              @csrf
                                              <button onclick="return confirm('Bạn muốn xóa sách này không')"
                                                  class="btn btn-danger">Delete</button>
                                              <a href="{{ route('tuong.edit', [$s->id]) }}"
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
