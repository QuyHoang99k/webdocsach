@extends('../layout')
{{-- @section('slide')
    @include('pages.slide')
@endsection --}}
@section('content')
<nav class="breadcrumb">
    <a class="breadcrumb-item" href="{{ url('/') }}">Trang chủ</a>
    <a class="breadcrumb-item" href="">Tìm kiếm</a>
</nav>
    <h3>Bạn tim kiếm với từ khóa là :{{ $tag }}</h3>
    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row">
                @php
                    $count = count($truyen);
                @endphp
                @if ($count == 0)
                    <div class="col-md-12">
                        <div class="card mb-12 box-shadow">
                            <div class="card-body">
                                <p>Không tìm thấy truyện....</p>
                            </div>
                        </div>
                    </div>
                @else
                    @foreach ($truyen as $key => $value)
                        <div class="col-md-3">
                            <div class="card mb-3 box-shadow">
                                <img class="card-img-top" height="200px"
                                    src="{{ asset('public/uploads/truyen/' . $value->hinhanh) }}"
                                    data-holder-rendered="true">
                                <div class="card-body">
                                    <h5>{{ $value->tentruyen }} </h5>
                                    <p class="card-text">{{ $value->tomtat }}</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <a href="{{ url('xem-truyen/' . $value->slug_truyen) }}"
                                                class="btn btn-sm btn-outline-secondary">Đọc ngay</a>
                                            <a class="btn btn-sm btn-outline-secondary"><i
                                                    class="fa fa-eye "></i> {{ $value->luotxem }}</a>
                                        </div>
                                        <small class="text-muted">9 mins</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif

            </div>

        </div>
    </div>
    {{-- sách hay xem nhiều --}}

    {{-- Blogs --}}

@endsection
