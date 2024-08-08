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
        <h1 class="mb-3 bread">Blog</h1>
        <p class="breadcrumbs"><span class="mr-2"><a href="{{ route('home') }}">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Blog <i class="ion-ios-arrow-forward"></i></span></p>
      </div>
    </div>
  </div>
</section>

<section class="ftco-section">
  <div class="container">

    <div class="row">
      @foreach ($showBaiViet as $index => $item)
      <div class="col-md-4 d-flex ftco-animate mb-4">
        <div class="blog-entry justify-content-end">
          <div class="text">
            <a href="{{ route('clients.pages.blog-detail', $item->id) }}" class="block-20 img" style="background-image: url('{{ Storage::url($item->anh_bai_viet) }}');">
            </a>
            <h5 class="heading truncated">
              <a href="{{ route('clients.pages.blog-detail', $item->id) }}">
                {{ $item->tieu_de_bai_viet }}
              </a>

            </h5>


            <div class="meta mb-3">
              <div><a href="#">{{ $item->ngay_dang }}</a></div>

              <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>

            </div>
            <div> <strong>Người đăng :</strong> <a href="#">{{ $item->baiviet_user ? $item->baiviet_user->name : 'No user' }}</a></div>
            <div class="mb-3 p-2 bg-warning text-center rounded">

              <strong>Hotline:</strong> <span class="text-danger">{{ $item->sdt_user ? $item->sdt_user->so_dien_thoai : 'Không có số điện thoại' }}</span>
            </div>
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

            <li><a href="#">&gt;</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>


</section>

@section('js')
 
@endsection