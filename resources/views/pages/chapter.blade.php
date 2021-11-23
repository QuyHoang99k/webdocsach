@extends('../layout')
{{-- @section('slide')
    @include('pages.slide')
@endsection --}}
@section('content')
<nav class="breadcrumb">
    <a class="breadcrumb-item" href="#">Home</a>
    <a class="breadcrumb-item" href="#">Libary</a>
    <span class="breadcrumb-item active">Data</span>
</nav>
<div class="row">
    <div class="col-md-12">
        <h4>{{ $chapter->truyen->tentruyen }}</h4>
        <p>Chương hiện tại: {{ $chapter->tieude }}</p>
        <div class="col-md-5">
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

            <div class="noidungchuong">
                {!! $chapter->noidung !!}
                <hr>
            <a class="btn btn-primary {{ $chapter->id ==$min_id->id ? 'isDisabled' : '' }}" href="{{ url('xem-chapter/'.$previous_chapter) }}">Chapter trước</a>
            <a class="btn btn-primary {{ $chapter->id ==$max_id->id ? 'isDisabled' : '' }}" href="{{ url('xem-chapter/'.$next_chapter) }}">Chapter sau</a>
            <h3>Lưu và chia sẻ truyện: </h3>

                <a href=""><i class="fab fa-facebook-f"></i></a>
                <a href=""><i class="fab fa-twitter"></i></a>
            </div>
        </div>
    </div>
</div>
@endsection
