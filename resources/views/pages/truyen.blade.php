@extends('../layout')
{{-- @section('slide')
@include('pages.slide')
@endsection --}}
@section('content')

    <div class="row">
        <div class="col-md-9">
            <div class="row">
                <div class="col-md-3">
                    <img class="card-img-top" src="{{ asset('public/uploads/truyen/'.$truyen->hinhanh) }}" />
                </div>
                <div class="col-md-9">
                    <style type="text/css">
                        .infotruyen {
                            list-style: none;
                        }
                    </style>
                    <ul class="infotruyen">
                        <li>Tên truyện: {{ $truyen ->tentruyen }}</li>
                        <li>Tác giả: {{ $truyen ->tacgia }}</li>
                        <li>thể loại: <a href="{{ url('danh-muc/'.$truyen->danhmuctruyen->slug_danhmuc) }}">{{ $truyen ->danhmuctruyen->tendanhmuc }}</a></li>
                        <li>Số chapter: 200</li>
                        <li>Số lượt xem: 200</li>
                        <li><a href="#">Xem mục lục</a></li> 
                       
                        @if ($chapter_dau)
                        <li><a href="{{ url('xem-chapter/'.$chapter_dau->slug_chapter) }}" class="btn btn-primary">Đọc online</a></li> 
                        @else
                        <li><a href="" class="btn btn-danger">Truyện đang được upload</a></li>
                        @endif
                       
                    </ul>
                </div>

            </div>
            <div class="col-md-12">
                <p>{{$truyen ->tomtat}}</p>
            </div>
            <hr>
            <h4>Mục lục</h4>
            <ul class="mucluctruyen">
                @php
                    $mucluc = count($chapter);
                @endphp
                @if ($mucluc>0)
                @foreach ($chapter as $key => $chap)
                <li><a href="{{ url('xem- chapter/'.$chap->slug_chapter) }}">{{ $chap ->tieude }}</a></li>
                @endforeach
                @else
                <li>Mục lục đang cập nhập....</li>
                @endif
                
            </ul>
            <h4>Sách cùng danh mục</h4>
            <div class="row">
                @foreach ($cungdanhmuc as $key => $value)        
                
                <div class="col-md-3">
                    <div class="card mb-3 box-shadow">
                        <img class="card-img-top" height="200px" src="{{ asset('public/uploads/truyen/'.$value ->hinhanh) }}"
                            data-holder-rendered="true">
                        <div class="card-body">
                            <h5>{{ $value->tentruyen }} </h5>
                            <p class="card-text">{{$value->tomtat}}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a href="{{ url('xem-truyen/'.$value->slug_truyen) }}" class="btn btn-sm btn-outline-secondary">Đọc ngay</a>
                                    <a class="btn btn-sm btn-outline-secondary"><i class="fa fa-eye"></i>565888</a>
                                </div>
                                <small class="text-muted">9 mins</small>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="col-md-3">
            <h3>Sách hay xem nhiều</h3>
        </div>
    </div>
@endsection
