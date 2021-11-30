@extends('../layout')

@section('content')

    <h3>Danh sách tướng</h3>
    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row">
                @foreach ($sach as $key => $value)

                    <div class="col-md-3">
                        <div class="card mb-3 box-shadow">
                            <img class="card-img-top" height="200px" width="150px"
                                src="{{ asset('public/uploads/tuong/' . $value->hinhanh) }}" data-holder-rendered="true">
                            <div class="card-body">
                                <h4>{{ $value->tentuong }} </h4>
                                <h5>{{ $value->tomtat }}</h5>
                                <button type="button" class="btn btn-primary btn-lg" data-toggle="modal"
                                data-target="#modelId">
                                Cốt truyện {{ $value->tentuong }} 
                            
                            </button>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <!-- Scrollable modal -->
                                        <!-- Button trigger modal -->
                                        <!-- Modal -->
                                        <div class="modal fade" id="modelId" tabindex="-1" role="dialog"
                                            aria-labelledby="modelTitleId" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4>{{ $value->tentuong }} </h4>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="container-fluid">
                                                            {!! $value->noidung !!}
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Đóng</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <script>
                                            $('#exampleModal').on('show.bs.modal', event => {
                                                var button = $(event.relatedTarget);
                                                var modal = $(this);
                                                // Use above variables to manipulate the DOM

                                            });
                                        </script>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>
    {{-- sách hay xem nhiều --}}

    {{-- Blogs --}}

@endsection
