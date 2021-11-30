@extends('../layout')
@section('slide')
    @include('pages.slide')
@endsection
@section('content')
   
    <h3>Sách mới cập nhập</h3>
    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row">
                @foreach ($truyen as $key => $value)

                    <div class="col-md-3">
                        <div class="card mb-3 box-shadow">
                            <img class="card-img-top" height="200px"
                                src="{{ asset('public/uploads/truyen/' . $value->hinhanh) }}" data-holder-rendered="true">
                            <div class="card-body">
                                <h4 >{{ $value->tentruyen }} </h4>
                                <p class="card-text"> {{ $value->tomtat }}</p>
                                <p class="card-text">tác giả: {{ $value->tacgia }}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a href="{{ url('xem-truyen/' . $value->slug_truyen) }}"
                                            class="btn btn-sm btn-outline-secondary">Đọc ngay</a>
                                        <a class="btn btn-sm btn-outline-secondary"><i
                                                class="fa fa-eye"></i>{{ $value->luotxem }}</a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <a href="" class="btn btn-success">Xem tất cả</a>
        </div>
    </div>
    {{-- sách hay xem nhiều --}}

    {{-- Blogs --}}

@endsection
