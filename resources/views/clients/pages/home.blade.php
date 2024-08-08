@extends('layouts.client')

@section('css')



@endsection

@section('content')

<div id="banner-slideshow" class="banner-carousel">
    @foreach ($listBanner as $index => $item)
    @if ($item->trang_thai) <!-- Check if the banner is active -->
    <div class="hero-wrap slide" style="background-image: url('{{ Storage::url($item->banner) }}');" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="overlay-2"></div>
        <div class="container">
            <div class="row no-gutters slider-text justify-content-center align-items-center">
                <div class="col-lg-8 col-md-6 ftco-animate d-flex align-items-end">
                    <div class="text text-center w-100">
                        <h1 class="mb-4">Find Properties <br>That Make You Money</h1>
                        <p><a href="#" class="btn btn-primary py-3 px-4">Search Properties</a></p>
                    </div>
                </div>
            </div>
        </div>

    </div>
    @endif
    @endforeach
</div>


<!-- Properties section -->
<section class="ftco-section goto-here">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 heading-section text-center ftco-animate mb-5">
                <span class="subheading">What we offer</span>
                <h2 class="mb-2">Ưu đãi độc quyền cho bạn</h2>
            </div>
        </div>
        <div class="row">
            <!-- danh sách thông tin bất động sản (all) -->
            @foreach ($listSanPham as $index => $item)
            <div class="col-md-4">
                <div class="property-wrap ftco-animate">
                    <div class="img d-flex align-items-center justify-content-center" style="background-image: url('{{ Storage::url($item->anh_san_pham) }}');">
                        <!-- khi click show chi tiết bất động sản -->
                        <a href="{{ route('clients.pages.product-detail', $item->id) }}" class="icon d-flex align-items-center justify-content-center btn-custom">
                            <span class="ion-ios-link"></span>
                        </a>
                        <div class="list-agent d-flex align-items-center">
                            <a href="#" class="agent-info d-flex align-items-center">
                                <!-- ảnh avatar -->
                                <div class="img-2 rounded-circle" style="background-image: url('{{Storage::url($item->user->anh_dai_dien)}}');"></div>
                                <h3 class="mb-0 ml-2">{{ $item->user ? $item->user->name : 'No user' }}</h3>
                            </a>
                            <!-- các icon -->
                            <div class="tooltip-wrap d-flex">
                                <a href="#" class="icon-2 d-flex align-items-center justify-content-center" data-toggle="tooltip" data-placement="top" title="Bookmark">
                                    <span class="ion-ios-heart"><i class="sr-only">Bookmark</i></span>
                                </a>
                                <a href="#" class="icon-2 d-flex align-items-center justify-content-center" data-toggle="tooltip" data-placement="top" title="Compare">
                                    <span class="ion-ios-eye"><i class="sr-only">Compare</i></span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="text">
                        <!-- giá -->
                        <p class="price mb-3"><span class="old-price">19000000đ</span> <span class="orig-price">{{ number_format($item->gia) }}<small></small>đ</span></p>
                        <h3 class="mb-0 truncated d-flex "><a href="{{ route('clients.pages.product-detail', $item->id) }}">{{ $item->tieu_de_san_pham }}</a></h3>
                        <span class="location truncated d-inline-block mb-3"><i class="ion-ios-pin mr-2"></i>{{ $item->dia_chi }}</span>
                        <ul class="property_list">
                            <li><span class="flaticon-bed"></span>{{ $item->so_luong_phong }}</li>
                            <li><span class="flaticon-floor-plan"></span>{{ $item->dien_tich }} <span>m²</span> </li>

                        </ul>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Static section -->
<section class="ftco-section ftco-fullwidth">
    <div class="overlay"></div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 heading-section text-center ftco-animate mb-5">
                <span class="subheading">dịch vụ </span>
                <h2 class="mb-2">Why Choose Us?</h2>
            </div>
        </div>
    </div>
    <div class="container-fluid px-0">
        <div class="row d-md-flex text-wrapper align-items-stretch">
            <div class="one-half mb-md-0 mb-4 img d-flex align-self-stretch" style="background-image: url('{{ asset('assets/client/images/about.jpg') }}');"></div>
            <div class="one-half half-text d-flex justify-content-end align-items-center">
                <div class="text-inner pl-md-5">
                    <div class="row d-flex">
                        <div class="col-md-12 d-flex align-self-stretch ftco-animate">
                            <div class="media block-6 services-wrap d-flex">
                                <div class="icon d-flex justify-content-center align-items-center"><span class="flaticon-piggy-bank"></span></div>
                                <div class="media-body pl-4">
                                    <h3>No Downpayment</h3>
                                    <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 d-flex align-self-stretch ftco-animate">
                            <div class="media block-6 services-wrap d-flex">
                                <div class="icon d-flex justify-content-center align-items-center"><span class="flaticon-wallet"></span></div>
                                <div class="media-body pl-4">
                                    <h3>All Cash Offer</h3>
                                    <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 d-flex align-self-stretch ftco-animate">
                            <div class="media block-6 services-wrap d-flex">
                                <div class="icon d-flex justify-content-center align-items-center"><span class="flaticon-file"></span></div>
                                <div class="media-body pl-4">
                                    <h3>Experts in Your Corner</h3>
                                    <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 d-flex align-self-stretch ftco-animate">
                            <div class="media block-6 services-wrap d-flex">
                                <div class="icon d-flex justify-content-center align-items-center"><span class="flaticon-locked"></span></div>
                                <div class="media-body pl-4">
                                    <h3>Locked in Pricing</h3>
                                    <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Statistics section -->
<section class="ftco-counter ftco-section img" id="section-counter">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
                <div class="block-18">
                    <div class="text text-border d-flex align-items-center">
                        <strong class="number" data-number="305">0</strong>
                        <span>Area <br>Population</span>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
                <div class="block-18">
                    <div class="text text-border d-flex align-items-center">
                        <strong class="number" data-number="1090">0</strong>
                        <span>Total <br>Properties</span>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
                <div class="block-18">
                    <div class="text text-border d-flex align-items-center">
                        <strong class="number" data-number="209">0</strong>
                        <span>Average <br>House</span>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
                <div class="block-18">
                    <div class="text d-flex align-items-center">
                        <strong class="number" data-number="67">0</strong>
                        <span>Total <br>Branches</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials section -->
<section class="ftco-section testimony-section bg-light">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-7 text-center heading-section ftco-animate">
                <span class="subheading">Đánh giá </span>
                <h2 class="mb-3">Khách hàng hài lòng</h2>
            </div>
        </div>
        <div class="row ftco-animate">
            <div class="col-md-12">
                <div class="carousel-testimony owl-carousel ftco-owl">
                    @foreach($showBinhLuan as $index => $binhLuan)
                    <div class="item">
                        <div class="testimony-wrap py-4">
                            <div class="text">
                                <p class="mb-4">
                                <p><strong>Nội dung:</strong> {{ $binhLuan->noi_dung }}</p>
                                </p>
                                <div class="d-flex align-items-center">
                                    <div class="user-img" style="background-image: url('{{Storage::url($binhLuan->user->anh_dai_dien)}}')"></div>
                                    <div class="pl-3">
                                        <p class="name">{{$binhLuan->user->name}}</p>

                                        <p class="star">
                                            <span class="stars">
                                                Đánh giá:
                                                <!-- hiển thị số sao đc đánh giá ta dùng toán tử  -->
                                                @for ($i = 1; $i <= $binhLuan->danh_gia; $i++)
                                                    <i class="ion-ios-star filled" style="color: yellow;"></i>
                                                    @endfor
                                            </span>

                                        </p>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <!-- Add more testimonial items as needed -->
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Blog section -->
<section class="ftco-section ftco-no-pt">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-7 heading-section text-center ftco-animate">
                <span class="subheading">Blog</span>
                <h2>Blog gần đây</h2>
            </div>
        </div>
        <div class="row d-flex">
            @foreach ($showBaiViet as $index => $item)
            <div class="col-md-3 d-flex ftco-animate">
                <div class="blog-entry justify-content-end">
                    <div class="text">
                        <a href="{{ route('clients.pages.blog-detail', $item->id) }}" class="block-20 img" style="background-image: url('{{ Storage::url($item->anh_bai_viet) }}');"></a>
                        <h3 class="heading"><a href="{{ route('clients.pages.blog-detail', $item->id) }}">{{ $item->tieu_de_bai_viet }}</a></h3>
                        <div class="meta mb-3">
                            <div><a href="#">{{ $item->ngay_dang }}</a></div>
                            <div><a href="#">{{ $item->baiviet_user ? $item->baiviet_user->name : 'No user' }}</a></div>
                            <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 99</a></div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

@endsection

@section('js')



@endsection