@extends('../layout')
{{-- @section('slide')
    @include('pages.slide')
@endsection --}}
@section('content')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
    <li class="breadcrumb-item"><a href="{{ url('the-loai/'.$truyen_breadcrumb->theloai->slug_theloai) }}">{{ $truyen_breadcrumb ->theloai->tentheloai }}</a></li>

    <li class="breadcrumb-item"><a href="{{ url('danh-muc/'.$truyen_breadcrumb->danhmuctruyen->slug_danhmuc) }}">{{ $truyen_breadcrumb ->danhmuctruyen->tendanhmuc }}</a></li>
    <li class="breadcrumb-item active"> {{ $truyen_breadcrumb ->tentruyen }}</li>
</ol>
<div class="row">
    <div class="col-md-12">
        <h4>{{ $chapter->truyen->tentruyen }}</h4>
        <p>Chương hiện tại: {{ $chapter->tieude }}</p>
        <div class="col-md-9 my-5">
            <style>
                .isDisabled{
                    color: currentColor;
                    pointer-events: none;
                    opacity: 0.5;
                    text-decoration: none;
                }
            </style>
            <div class="form-group">
              <label for="exampleInputEmail1">Chọn chương</label>
              <select name="kichhoat"  class="custom-select select-chapter">
                  @foreach ($all_chapter as $chap)
                  <option value="{{ url('xem-chapter/'.$chap->slug_chapter) }}">{{ $chap->tieude }}</option>
                      
                  @endforeach
              </select>
            </div>

            <div class="noidungchuong border " style="font-size: 20px">
                {!! $chapter->noidung !!}
                <hr>
            <a class="btn btn-primary {{ $chapter->id ==$min_id->id ? 'isDisabled' : '' }}" href="{{ url('xem-chapter/'.$previous_chapter) }}">Chapter trước</a>
            <a class="btn btn-primary {{ $chapter->id ==$max_id->id ? 'isDisabled' : '' }}" href="{{ url('xem-chapter/'.$next_chapter) }}">Chapter sau</a>
            <div class="fb-comments" data-href="http://localhost:8000/xem-truyen/vua-nui-vang" data-width="" data-numposts="10">abc</div>
            
            <h3 class="my-3">Lưu và chia sẻ truyện: </h3>

            <div class="fb-share-button" data-href="http://localhost:8000/xem-truyen/vua-nui-vang" data-layout="button_count" data-size="small"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Flocalhost%3A8000%2Fxem-truyen%2Fvua-nui-vang&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Chia sẻ</a></div>
                <a href=""><i class="fab fa-twitter"></i></a>
            </div>
        </div>
    </div>
</div>
@endsection
