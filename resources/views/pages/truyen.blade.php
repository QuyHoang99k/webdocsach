@extends('../layout')
{{-- @section('slide')
@include('pages.slide')
@endsection --}}
@section('content')
    <ol class="breadcrumb mt-3">
        <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
        <li class="breadcrumb-item"><a
                href="{{ url('danh-muc/' . $truyen->danhmuctruyen->slug_danhmuc) }}">{{ $truyen->danhmuctruyen->tendanhmuc }}</a>
        </li>
        <li class="breadcrumb-item active"> {{ $truyen->tentruyen }}</li>
    </ol>
    <div class="row">
        <div class="col-md-9">
            <div class="row">
                <div class="col-md-3">
                    <img class="card-img-top" src="{{ asset('public/uploads/truyen/' . $truyen->hinhanh) }}" />
                </div>
                <div class="col-md-9">
                    <style type="text/css">
                        .infotruyen {
                            list-style: none;
                        }

                    </style>
                    <ul class="infotruyen">
                        <input type="hidden" value="{{ $truyen->tentruyen }}" class="wishlist_title">
                        <input type="hidden" value="{{ \URL::current()}}" class="wishlist_url">
                        <input type="hidden" value="{{ $truyen->id }}" class="wishlist_id">

                        <li>Tên truyện: {{ $truyen->tentruyen }}</li>
                        {{-- <li>Ngày đăng: {{ $truyen->updated_at->diffForHumans() }}</li> --}}
                        <li>Tác giả: {{ $truyen->tacgia }}</li>
                        <li>Danh mục truyện: <a
                                href="{{ url('danh-muc/' . $truyen->danhmuctruyen->slug_danhmuc) }}">{{ $truyen->danhmuctruyen->tendanhmuc }}</a>
                        </li>
                        <li>Thể loại truyện: <a
                                href="{{ url('the-loai/' . $truyen->theloai->slug_theloai) }}">{{ $truyen->theloai->tentheloai }}</a>
                        </li>
                        <li>Số chapter: 200</li>
                        <li>Số lượt xem: {{ $truyen->luotxem }}</li>
                        <li><a href="#xemmucluc">Xem mục lục</a></li>

                        @if ($chapter_dau)
                            <li><a href="{{ url('xem-chapter/' . $chapter_dau->slug_chapter) }}"
                                    class="btn btn-primary">Đọc Truyện</a>
                                <button class="btn btn-danger btn-thich-truyen"><i class="fa fa-heart"></i> Thích truyện</button>
                                </li>
                            <li><a href="{{ url('xem-chapter/' . $chapter_moinhat->slug_chapter) }}"
                                    class="btn btn-success mt-2">Đọc Chương Mới Nhất</a></li>

                        @else
                            <li><a href="" class="btn btn-danger">Truyện đang được upload</a></li>
                        @endif

                    </ul>
                </div>

            </div>
            <div class="col-md-12">
                <p>{{ $truyen->tomtat }}</p>
            </div>
            <hr>
            <style>
                .tagcloud05 ul {
                    margin: 0;
                    padding: 0;
                    list-style: none;
                }

                .tagcloud05 ul li {
                    display: inline-block;
                    margin: 0 0 .3em 1em;
                    padding: 0;
                }

                .tagcloud05 ul li a {
                    position: relative;
                    display: inline-block;
                    height: 30px;
                    line-height: 30px;
                    padding: 0 1em;
                    background-color: #3498db;
                    border-radius: 0 3px 3px 0;
                    color: #fff;
                    font-size: 13px;
                    text-decoration: none;
                    -webkit-transition: .2s;
                    transition: .2s;
                }

                .tagcloud05 ul li a::before {
                    position: absolute;
                    top: 0;
                    left: -15px;
                    content: '';
                    width: 0;
                    height: 0;
                    border-color: transparent #3498db transparent transparent;
                    border-style: solid;
                    border-width: 15px 15px 15px 0;
                    -webkit-transition: .2s;
                    transition: .2s;
                }

                .tagcloud05 ul li a::after {
                    position: absolute;
                    top: 50%;
                    left: 0;
                    z-index: 2;
                    display: block;
                    content: '';
                    width: 6px;
                    height: 6px;
                    margin-top: -3px;
                    background-color: #fff;
                    border-radius: 100%;
                }

                .tagcloud05 ul li span {
                    display: block;
                    max-width: 100px;
                    white-space: nowrap;
                    text-overflow: ellipsis;
                    overflow: hidden;
                }

                .tagcloud05 ul li a:hover {
                    background-color: #555;
                    color: #fff;
                }

                .tagcloud05 ul li a:hover::before {
                    border-right-color: #555;
                }

            </style>
            <p>Từ khóa tìm kiếm:
                @php
                    $tukhoa = explode(',', $truyen->tukhoa);
                @endphp
            <div class="tagcloud05">
                <ul>
                    @foreach ($tukhoa as $tu)
                        <li><a class="ml-2"
                                href="{{ url('tag/' . \Str::slug($tu)) }}"><span>{{ $tu }}</span></a></li>
                    @endforeach
                </ul>
            </div>
            </p>

            <h4>Danh sách chương</h4>
            <ul id="xemmucluc" class="mucluctruyen">
                @php
                    $mucluc = count($chapter);
                @endphp
                @if ($mucluc > 0)
                    @foreach ($chapter as $key => $chap)
                        <li><a href="{{ url('xem- chapter/' . $chap->slug_chapter) }}">{{ $chap->tieude }}</a></li>
                    @endforeach
                @else
                    <li>Mục lục đang cập nhập....</li>
                @endif

            </ul>
            <div class="fb-comments" data-href="http://localhost:8000/xem-truyen/vua-nui-vang" data-width=""
                data-numposts="10">abc</div>
            <h4>Sách cùng danh mục</h4>
            <div class="row">
                @foreach ($cungdanhmuc as $key => $value)

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
                                        <a class="btn btn-sm btn-outline-secondary"><i class="fa fa-eye"></i>{{ $value->luotxem }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="col-md-3">
            <h3 class="card-header" style="background: darkgray">Truyện nổi bật</h3>
            @foreach ($truyennoibat as $noibat)
            <div class="row mt-2">
                <div class="col-md-5"><img class="img img-responsive" width="100%" class="card-img-top" src="{{ asset('public/uploads/truyen/'.$noibat->hinhanh) }}" alt="{{ $noibat->tentruyen }}" /></div>
                <div class="col-md-7 sidebar">
                    <a href="{{ url('xem-truyen/'.$noibat->slug_truyen) }}"> 
                        <p style="color:#666">{{ $noibat ->tentruyen }}</p>
                    </a>
                </div>
            </div>
            @endforeach
            <h3 class="card-header" style="background: rgb(121, 177, 177)">Truyện xem nhiều</h3>
            @foreach ($truyenxemnhieu as $xemnhieu)
            <div class="row mt-2">
                <div class="col-md-5"><img class="img img-responsive" width="100%" class="card-img-top" src="{{ asset('public/uploads/truyen/'.$xemnhieu->hinhanh) }}" alt="{{ $xemnhieu->tentruyen }}" /></div>
                <div class="col-md-7 sidebar">
                    <a href="{{ url('xem-truyen/'.$xemnhieu->slug_truyen) }}"> 
                        <p style="color:#666">{{ $xemnhieu ->tentruyen }}</p>
                    </a>
                </div>
            </div>
            @endforeach
            <h3 class="card-header" style="background: pink">Truyện yêu thích</h3>
            <div id="yeuthich"></div>
        </div>
    </div>
@endsection
