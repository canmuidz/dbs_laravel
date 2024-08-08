    @extends('layouts.client')
    @section('css')
    <style>
        .truncated {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            max-width: 300px;
            /* Điều chỉnh giá trị theo nhu cầu của bạn */
            display: inline-block;
            /* Đảm bảo tiêu đề giữ nguyên kích thước */
            position: relative;
        }
    </style>

    @endsection




    @section('content')
    <section class="hero-wrap hero-wrap-2 ftco-degree-bg js-fullheight" style="background-image: url('{{asset('assets/client/images/bg_1.jpg')}}');" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="overlay-2"></div>
        <div class="container">

            <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-center">
                <div class="col-md-9 ftco-animate pb-5 mb-5 text-center">
                    <h1 class="mb-3 bread">Properties</h1>
                    <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Properties <i class="ion-ios-arrow-forward"></i></span></p>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section goto-here">
        <div class="container">

            <div class="row">
                @foreach ($listSanPham as $index => $item)
                <div class="col-md-4">
                    <div class="property-wrap ftco-animate">
                        <div class="img d-flex align-items-center justify-content-center" style="background-image: url('{{ Storage::url($item->anh_san_pham) }}');">
                            <!-- khi click show chi tiết bất động sản  -->
                            <a href="{{route('clients.pages.product-detail',$item->id)}}" class="icon d-flex align-items-center justify-content-center btn-custom">
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
                            <p class="price mb-3"><span class="old-price">3900000000đ</span> <span class="orig-price">{{ number_format($item->gia) }}<small></small>đ</span></p>
                            <h3 class="mb-0 truncated"><a href="{{route('clients.pages.product-detail',$item->id)}}">{{ $item->tieu_de_san_pham }}</a></h3>
                            <span class="location  d-flex d-inline-block mb-3  truncated"><i class="ion-ios-pin mr-2"></i>{{ $item->dia_chi }}</span>
                            <ul class="property_list">
                                <li><span class="flaticon-bed"></span>{{ $item->so_luong_phong }}</li>
                                <li><span class="flaticon-floor-plan"></span>{{ $item->dien_tich }}</li>
                            </ul>
                        </div>
                        <div class="mb-3 p-2 bg-warning text-center rounded">

                         
                            <strong>Hotline:</strong>
                            <span class="text-danger">
                           
                                0{{$item->sdt_user ? $item->sdt_user->so_dien_thoai : 'Không có số điện thoại' }} </span>

                            </span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="row mt-5">
                <div class="col text-center">
                    <div class="block-27">
                        <ul>
                            <li><a href="#">&lt;</a></li>
                            <li class="active"><span>1</span></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">5</a></li>
                            <li><a href="#">&gt;</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @section('js')
    
    @endsection