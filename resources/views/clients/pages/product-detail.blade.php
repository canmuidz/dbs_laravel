  @extends('layouts.client')
  @section('css')
  <link href="{{asset('assets/admin/libs/quill/quill.snow.css')}}" rel="stylesheet" type="text/css" />
  <link href="{{asset('assets/admin/libs/quill/quill.bubble.css')}}" rel="stylesheet" type="text/css" />
  @endsection




  @section('content')

  <section class="hero-wrap hero-wrap-2 ftco-degree-bg js-fullheight" style="background-image: url('{{Storage::url($sanPham->anh_san_pham)}}');" data-stellar-background-ratio="0.5">

  	<div class="overlay"></div>
  	<div class="overlay-2"></div>
  	<div class="container">
  		<div class="row no-gutters slider-text js-fullheight align-items-end justify-content-center">
  			<div class="col-md-9 ftco-animate pb-5 mb-5 text-center">
  				<h1 class="mb-3 bread">Chi tiết bất động sản </h1>
  				<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Trang chủ <i class="ion-ios-arrow-forward"></i></a></span> <span>CHi tiết bất động sản <i class="ion-ios-arrow-forward"></i></span></p>
  			</div>
  		</div>
  	</div>
  </section>

  <section class="ftco-section ftco-property-details">



  	<div class="container">
  		<div class="row justify-content-center ">
  			<div class="col-md-12 ">
  				<div class="property-details ">
  					<div class="img rounded" style="background-image: url('{{Storage::url($sanPham->anh_san_pham)}}');"></div>
  					<div class="text">
  						<h2>{{$sanPham->tieu_de_san_pham}}</h2>

  					</div>
  					<div>
  						<span class=" text subheading">
  							{{$sanPham->dia_chi}}
  						</span>
  					</div>
  				</div>
  			</div>
  		</div>

  		<div class="row">
  			<div class="col-md-12 pills">
  				<div class="bd-example bd-example-tabs">
  					<div class="d-flex">
  						<ul class="nav nav-pills mb-2" id="pills-tab" role="tablist">

  							<li class="nav-item">
  								<a class="nav-link active" id="pills-description-tab" data-toggle="pill" href="#pills-description" role="tab" aria-controls="pills-description" aria-expanded="true">Thông số</a>
  							</li>
  							<li class="nav-item">
  								<a class="nav-link" id="pills-manufacturer-tab" data-toggle="pill" href="#pills-manufacturer" role="tab" aria-controls="pills-manufacturer" aria-expanded="true">Mô tả </a>
  							</li>
  							<li class="nav-item">
  								<a class="nav-link" id="pills-review-tab" data-toggle="pill" href="#pills-review" role="tab" aria-controls="pills-review" aria-expanded="true">Bình luận </a>
  							</li>
  						</ul>
  					</div>

  					<div class="tab-content" id="pills-tabContent">

  						<!-- đặc điểm thông số của sản phẩm  -->
  						<div class="tab-pane fade show active" id="pills-description" role="tabpanel" aria-labelledby="pills-description-tab">
  							<div class="row">
  								<div class="col-md-4">
  									<ul class="features">
  										<li class="check"><span class="ion-ios-checkmark-circle"></span>Lot Area: 1,250 SQ FT</li>
  										<li class="check"><span class="ion-ios-checkmark-circle"></span>Bed Rooms: 4</li>
  										<li class="check"><span class="ion-ios-checkmark-circle"></span>Bath Rooms: 4</li>
  										<li class="check"><span class="ion-ios-checkmark-circle"></span>Luggage</li>
  										<li class="check"><span class="ion-ios-checkmark-circle"></span>Garage: 2</li>
  									</ul>
  								</div>
  								<div class="col-md-4">
  									<ul class="features">
  										<li class="check"><span class="ion-ios-checkmark-circle"></span>Floor Area: 1,300 SQ FT</li>
  										<li class="check"><span class="ion-ios-checkmark-circle"></span>Year Build:: 2019</li>
  										<li class="check"><span class="ion-ios-checkmark-circle"></span>Water</li>
  										<li class="check"><span class="ion-ios-checkmark-circle"></span>Stories: 2</li>
  										<li class="check"><span class="ion-ios-checkmark-circle"></span>Roofing: New</li>
  									</ul>
  								</div>
  								<div class="col-md-4">
  									<ul class="features">
  										<li class="check"><span class="ion-ios-checkmark-circle"></span>Floor Area: 1,300 SQ FT</li>
  										<li class="check"><span class="ion-ios-checkmark-circle"></span>Year Build:: 2019</li>
  										<li class="check"><span class="ion-ios-checkmark-circle"></span>Water</li>
  										<li class="check"><span class="ion-ios-checkmark-circle"></span>Stories: 2</li>
  										<li class="check"><span class="ion-ios-checkmark-circle"></span>Roofing: New</li>
  									</ul>
  								</div>
  							</div>
  						</div>
  						<!-- Hiển thị mô tả sản phẩm  -->
  						<div class="tab-pane fade" id="pills-manufacturer" role="tabpanel" aria-labelledby="pills-manufacturer-tab">
  							<div class="mb-3" id="mo_ta_chi_tiet">
  								{!!$sanPham->mo_ta_san_pham!!}
  								<style>
  									#mo_ta_chi_tiet img {
  										max-width: 700px;

  										height: auto;

  									}
  								</style>
  							</div>
  						</div>
  						<!-- Hiền thị bình luận Vào trang bình luận  -->


  						<div class="tab-pane fade" id="pills-review" role="tabpanel" aria-labelledby="pills-review-tab">
  							<div class="row">
  								<div class="col-md-7">
  									<!-- form 
									  -->


  									<h3 class="head"> Tất cả bình luận ({{ $tong_comments }}) </h3>
  									<div class="review">
  										@foreach($sanPham->binhLuans as $binhLuan)
  										<div class="review-item d-flex mb-3">
  											<div class="user-img" style="background-image: url('{{Storage::url($binhLuan->user->anh_dai_dien)}}')">
  											</div>
  											<div class="desc ml-3">
  												<h4 class="d-flex justify-content-between">
  													<span>{{ $binhLuan->user->name }}</span>
  													<span>{{ $binhLuan->created_at->format('d-m-Y H:i') }}</span>
  												</h4>
  												<p class="star">
  													<span class="stars">
  														Đánh giá:
  														<!-- hiển thị số sao đc đánh giá ta dùng toán tử  -->
  														@for ($i = 1; $i <= $binhLuan->danh_gia; $i++)
  															<i class="ion-ios-star filled"></i>
  															@endfor

  													</span>
  													<span class="text-right">
  														<a href="#" class="reply"><i class="icon-reply"></i></a>
  													</span>
  												</p>
  												<p><strong>Nội dung:</strong> {{ $binhLuan->noi_dung }}</p>
  											</div>
  										</div>
  										@endforeach
  									</div>

  								</div>



  								<!-- tỉ lẹ đánh giá  (ko làm để tĩnh hoặc xóa ) -->
  								<div class="col-md-5">
  									<div class="rating-wrap">
  										<h3 class="head">Thêm bình luận </h3>
  										<div class="wrap">
  											<form action="{{ route('clients.pages.product-detail.store', $sanPham->id) }}" method="POST">
  												@csrf
  												@if(session('success'))
  												<div class="alert alert-success">
  													{{ session('success') }}
  												</div>
  												@endif
  												<div class="form-group">
  													<label for="noi_dung">Nội dung bình luận:</label>
  													<textarea name="noi_dung" id="noi_dung" class="form-control" rows="4" required></textarea>
  												</div>
  												<div class="form-group">
  													<label for="danh_gia">Đánh giá:</label>
  													<input type="number" name="danh_gia" id="danh_gia" class="form-control" min="1" max="5" required>
  												</div>
  												<button type="submit" class="btn btn-primary">Gửi bình luận</button>
  											</form>

  										</div>
  									</div>
  								</div>


  							</div>
  						</div>
  					</div>
  				</div>
  			</div>
  		</div>
  	</div>
  	</div>

  </section>


  @endsection



  @section('js')
  <script src="{{ asset('assets/admin/libs/quill/quill.min.js') }}"></script>

  <script>
  	document.addEventListener('DOMContentLoaded', function() {


  		// Set initial content
  		var oldContent = `{!! $sanPham->mo_ta_san_pham !!}`;
  		quill.root.innerHTML = oldContent;

  		// Update hidden textarea with Quill editor content
  		quill.on('text-change', function() {
  			document.getElementById('mo_ta_chi_tiet').value = quill.root.innerHTML;
  		});

  	});
  </script>

  @endsection