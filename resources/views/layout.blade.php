<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Sách truyện</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/owl.theme.default.min.css') }}" rel="stylesheet">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        .switch_color {
            background: #181818;
            color: #fff;
        }

        .switch_color_light {
            background: #181818 !important;
            color: #000;
        }

        .noidung_color {
            color: #000;
        }
        .card-text {
            overflow: hidden;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
        }

   
    </style>
</head>

<body>
    <div class="container">
        {{-- Menu --}}
        <nav class="navbar navbar-expand-sm navbar-light bg-light mb-5">
            <a class="navbar-brand" href="#">SachTruyen.com</a>
            <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId"
                aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavId">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ url('/') }}"> <i class="fa fa-home"></i> Trang chủ
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/xem-tuong') }}" class="nav-link"><i class="fas fa-book">Tướng LOL</i></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false"> <i class="fa fa-list-alt"></i> Danh mục
                            truyện</a>
                        <div class="dropdown-menu" aria-labelledby="dropdownId">
                            @foreach ($danhmuc as $key => $danh)
                                <a class="dropdown-item"
                                    href="{{ url('danh-muc/' . $danh->slug_danhmuc) }}">{{ $danh->tendanhmuc }}</a>

                            @endforeach

                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false"><i class="fa fa-tags"></i> thể loại</a>
                        <div class="dropdown-menu" aria-labelledby="dropdownId">
                            @foreach ($theloai as $key => $the)
                                <a class="dropdown-item"
                                    href="{{ url('the-loai/' . $the->slug_theloai) }}">{{ $the->tentheloai }}</a>

                            @endforeach
                        </div>
                    </li>
                   
                </ul>
                <form autocomplete="off" class="form-inline my-2 my-lg-0" action="{{ url('tim-kiem') }}"
                    method="POST">
                    @csrf
                    <input class="form-control mr-sm-2" type="search" id="keywords" name="tukhoa"
                        placeholder="Tìm kiếm tác giả,truyện">
                    <div id="search_ajax"></div>
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">tìm kiếm</button>
                    <select name="custom-select ml-2 mr-sm-2" id="switch_color">
                        <option value="xam">Xám</option>
                        <option value="den">Đen</option>
                    </select>
                </form>
            </div>
        </nav>
        {{-- !slide --}}
        @yield('slide')
        {{-- sách mới --}}
        @yield('content')
        <hr>
        {{-- Footer --}}
        <footer class="footer-08">
			<div class="container-fluid px-lg-5">
				<div class="row">
					<div class="col-md-9 py-5">
						<div class="row">
							<div class="col-md-4 mb-md-0 mb-4">
								<h2 class="footer-heading">About us</h2>
								<p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
								<ul class="ftco-footer-social p-0">
		              <li class="ftco-animate"><a href="#" data-toggle="tooltip" data-placement="top" title="Twitter"><span class="ion-logo-twitter"></span></a></li>
		              <li class="ftco-animate"><a href="#" data-toggle="tooltip" data-placement="top" title="Facebook"><span class="ion-logo-facebook"></span></a></li>
		              <li class="ftco-animate"><a href="#" data-toggle="tooltip" data-placement="top" title="Instagram"><span class="ion-logo-instagram"></span></a></li>
		            </ul>
							</div>
							<div class="col-md-8">
								<div class="row justify-content-center">
									<div class="col-md-12 col-lg-9">
										<div class="row">
											<div class="col-md-4 mb-md-0 mb-4">
												<h2 class="footer-heading">Discover</h2>
												<ul class="list-unstyled">
						              <li><a href="#" class="py-1 d-block">Buy &amp; Sell</a></li>
						              <li><a href="#" class="py-1 d-block">Merchant</a></li>
						              <li><a href="#" class="py-1 d-block">Giving back</a></li>
						              <li><a href="#" class="py-1 d-block">Help &amp; Support</a></li>
						            </ul>
											</div>
											<div class="col-md-4 mb-md-0 mb-4">
												<h2 class="footer-heading">About</h2>
												<ul class="list-unstyled">
						              <li><a href="#" class="py-1 d-block">Staff</a></li>
						              <li><a href="#" class="py-1 d-block">Team</a></li>
						              <li><a href="#" class="py-1 d-block">Careers</a></li>
						              <li><a href="#" class="py-1 d-block">Blog</a></li>
						            </ul>
											</div>
											<div class="col-md-4 mb-md-0 mb-4">
												<h2 class="footer-heading">Resources</h2>
												<ul class="list-unstyled">
						              <li><a href="#" class="py-1 d-block">Security</a></li>
						              <li><a href="#" class="py-1 d-block">Global</a></li>
						              <li><a href="#" class="py-1 d-block">Charts</a></li>
						              <li><a href="#" class="py-1 d-block">Privacy</a></li>
						            </ul>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="row mt-md-5">
							<div class="col-md-12">
								<p class="copyright"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
					  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="ion-ios-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib.com</a>
					  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
							</div>
						</div>
					</div>
					<div class="col-md-3 py-md-5 py-4 aside-stretch-right pl-lg-5">
						<h2 class="footer-heading footer-heading-white">Contact us</h2>
						<form action="#" class="contact-form">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Your Name">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Your Email">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Subject">
              </div>
              <div class="form-group">
                <textarea name="" id="" cols="30" rows="3" class="form-control" placeholder="Message"></textarea>
              </div>
              <div class="form-group">
              	<button type="submit" class="form-control submit px-3">Send</button>
              </div>
            </form>
					</div>
				</div>
			</div>
		</footer>
    </div>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script>
         $('.tabs_danhmuc').click(function(){
             const danhmuc_id = $(this).data('danhmuc_id');
            var _token = $('input[name="_token"]').val();

             $.ajax({
                url: "{{ url('/tabs-danhmuc') }}",
                method: "POST",
                data: {
                    danhmuc_id: danhmuc_id,
                    _token: _token
                },
                success: function(data) {
                    $('#tab_danhmuctruyen_'+danhmuc_id).html(data);
                }
            });
         })
    </script>
    <script>
        show_wishlist();
        function show_wishlist(){
            if(localStorage.getItem('wishlist_truyen')!=null){
                var data = JSON.parse(localStorage.getItem('wishlist_truyen'));
                data.reverse();
                for(i=0;i<data.length;i++){
                    var title = data[i].title;
                    var img = data[i].img;
                    var id = data[i].id;
                    var url = data[i].url;
                    $('#yeuthich').append(`
                        <div class="row mt-2">
                            <div class="col-md-5"><img class="img img-responsive" width="100%" class="card-img-top" src="`+img+`" alt="`+title+`" /></div>
                            <div class="col-md-7 sidebar">
                                <a href="`+url+`">
                                    <p style="color:#666">`+title+`</p>
                                 </a>
                            </div>
                        </div>
                   `);
                }
            }
        }

            $('.btn-thich-truyen').click(function(){
                $('.fa.fa-heart').css('color','#fac');
                const id = $('.wishlist_id').val();
                const title = $('.wishlist_title').val();
                const img = $('.card-img-top').attr('src');
                const url = $('.wishlist_url').val();              
               const item = {
                   'id':id,
                   'title':title,
                   'img':img,
                   'url':url
               }
               if(localStorage.getItem('wishlist_truyen')==null){
                localStorage.setItem('wishlist_truyen','[]');
               }
               var old_data = JSON.parse(localStorage.getItem('wishlist_truyen'));
               var matches = $.grep(old_data,function(obj){
                   return obj.id == id;
               });
               if(matches.length){
                   alert('Truyện đã có trong danh sách yêu thích')
               }else{
                   if(old_data.length <= 10){
                       old_data.push(item);
                   } else {
                      alert('Đã đạt tới giới hạn lưu truyện yêu thích.');
                   }
                   $('#yeuthich').append(`
                        <div class="row mt-2">
                            <div class="col-md-5"><img class="img img-responsive" width="100%" class="card-img-top" src="`+img+`" alt="`+title+`" /></div>
                            <div class="col-md-7 sidebar">
                                <a href="`+url+`"> 
                                    <p style="color:#666">`+title+`</p>
                                </a>
                            </div>
                        </div>
                   `);
                   localStorage.setItem('wishlist_truyen',JSON.stringify(old_data));
                   alert('Đã lưu vào danh sách truyện ưu thích')
               }
               localStorage.setItem('wishlist_truyen',JSON.stringify(old_data));
            });
        
    </script>


    <script>
        $(document).ready(function() {

            if(localStorage.getItem('switch_color')!==null){
                const data = localStorage.getItem('switch_color')
                const data_obj = JSON.parse(data)
                $(document.body).addClass(data_obj.class_1); //toggleClass = công tắc bật mở
                $('.album').addClass(data_obj.class_2);
                $('.card-body').addClass(data_obj.class_1);
                // $('.noidungchuong').toggleClass('noidung_color');
                $('ul.mucluctruyen > li >a').css('color', '#fff');
                $('.sidebar > a').css('color', '#fff');
                $("select option[value = 'den']").attr("selected","selected");
            }
            $("#switch_color").change(function() {
                $(document.body).toggleClass('switch_color'); //toggleClass = công tắc bật mở
                $('.album').toggleClass('switch_color_light');
                $('.card-body').toggleClass('switch_color');
                // $('.noidungchuong').toggleClass('noidung_color');
                $('ul.mucluctruyen > li >a').css('color', '#fff');
                $('.sidebar > a').css('color', '#fff');

                if ($(this).val() == 'den') {
                    var item = {
                        'class_1': 'switch_color',
                        'class_2': 'switch_color_light'
                    }
                    localStorage.setItem('switch_color',JSON.stringify(item));
                } else if($(this).val() =='xam'){
                    localStorage.removeItem('switch_color');
                    $('ul.mucluctruyen >li > a').css('color','#000')
                }

                // var color = $(this).val()
                // alert(color);
            })
        })
    </script>
    <script type="text/javascript">
        $('#keywords').keyup(function() {
            var keywords = $(this).val();
            if (keywords != '') {
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url: "{{ url('/timkiem-ajax') }}",
                    method: "POST",
                    data: {
                        keywords: keywords,
                        _token: _token
                    },
                    success: function(data) {
                        $('#search_ajax').fadeIn(); //hiệu ứng
                        $('#search_ajax').html(data); //
                    }
                });
            } else {
                $('#search_ajax').fadeOut();
            }
        });
        $(document).on('click', '.li_timkiem_ajax', function() {
            $('#keywords').val($(this).text());
            $('#search_ajax').fadeOut();
        });
    </script>
    <script type="text/javascript">
        $('.owl-carousel').owlCarousel({
            loop: true,
            margin: 10,
            // dots: true,
            // nav: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 5
                }
            }
        })
    </script>
    <script type="text/javascript">
        $('.select-chapter').on('change', function() {
            var url = $(this).val();
            if (url) {
                window.location = url;
            }
            return false;
        });
        curren_chapter();

        function curren_chapter() {
            var url = window.location.href;
            $('.select-chapter').find('option[value="' + url + '"]').attr("selected", true);
        }
    </script>
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v12.0"
        nonce="R0bAZUzG"></script>
</body>

</html>
