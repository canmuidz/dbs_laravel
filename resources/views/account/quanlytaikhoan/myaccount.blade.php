@extends('layouts.account')

@section('title')
{{$title}}
@endsection

@section('css')
<!-- Quill css -->
<link href="{{asset('assets/admin/libs/quill/quill.snow.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/admin/libs/quill/quill.bubble.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">

            <div class="card-body">

                <div class="align-items-center">
                    <div class="d-flex align-items-center">

                        <img src="{{$avatar }}" class="rounded-circle avatar-xxl img-thumbnail float-start" alt="image profile">

                        <div class="overflow-hidden ms-4">
                            <h4 class="m-0 text-dark fs-20"> {{ Auth::user()->name }}</h4>
                            <p class="my-1 text-muted fs-16">Kỹ sư phần mềm đam mê tạo ra các giải pháp sáng tạo</p>
                            <a href="{{ route('account.quanlytaikhoan.myaccount', ['showForm' => 'true']) }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Thay đổi ảnh đại diện</a>
                            @if ($showForm)
                            <div id="change-avatar-form">
                                <form action="{{ route('account.quanlytaikhoan.myaccount') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="anh_dai_dien">Hình đại diện</label>
                                        <input type="file" class="form-control" id="anh_dai_dien" name="anh_dai_dien">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                                </form>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>

                <ul class="nav nav-underline border-bottom pt-2" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active p-2" id="profile_about_tab" data-bs-toggle="tab" href="#profile_about" role="tab">
                            <span class="d-block d-sm-none"><i class="mdi mdi-information"></i></span>
                            <span class="d-none d-sm-block">About</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link p-2" id="setting_tab" data-bs-toggle="tab" href="#profile_setting" role="tab">
                            <span class="d-block d-sm-none"><i class="mdi mdi-school"></i></span>
                            <span class="d-none d-sm-block">Setting</span>
                        </a>
                    </li>
                </ul>

                <div class="tab-content text-muted bg-white">
                    <!-- about -->
                    <div class="tab-pane active show pt-4" id="profile_about" role="tabpanel">
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-md-6 mb-4">
                                <div class="">
                                    <h5 class="fs-16 text-dark fw-semibold mb-3 text-capitalize">About me</h5>
                                    <p>Geetings, fellow software enthusiasts! I'm thrilled to see your intereset in exploring my profile. I'm Christian Mayo,
                                        a 24-year-old software engineer from the United Kingdom. My educational path led me to earn a Bachelor's Degeer in Computer Science,
                                        specializing in Software Engineering. With this qualification, I'm equipped to dive into the world of coding and develooment,ready
                                        to tackle exciting projects and contribute to cutting-edge technological advancement...
                                    </p>
                                </div>


                            </div>

                            <div class="col-md-6 col-sm-6 col-md-6 mb-4">
                                <h5 class="fs-16 text-dark fw-semibold mb-3 text-capitalize">Contact Details</h5>

                                <div class="row">
                                    <div class="col-md-4 col-sm-4 col-lg-4">
                                        <div class="profile-email">
                                            <h6 class="text-uppercase fs-13">Email Addess</h6>
                                            <a href="#" class="text-primary fs-14 text-decoration-underline">namhoang3105@gmail.com</a>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-4 col-lg-4">
                                        <div class="profile-email">
                                            <h6 class="text-uppercase fs-13">Social Media</h6>
                                            <ul class="social-list list-inline mt-0 mb-0">
                                                <li class="list-inline-item">
                                                    <a href="javascript: void(0);" class="social-item border-primary text-primary justify-content-center align-content-center"><i class="mdi mdi-facebook fs-14"></i></a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a href="javascript: void(0);" class="social-item border-danger text-danger justify-content-center align-content-center"><i class="mdi mdi-google fs-14"></i></a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a href="javascript: void(0);" class="social-item border-info text-info justify-content-center align-content-center"><i class="mdi mdi-twitter fs-14"></i></a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a href="javascript: void(0);" class="social-item border-secondary text-secondary justify-content-center align-content-center"><i class="mdi mdi-github fs-14"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-4 col-lg-4">
                                        <div class="profile-email">
                                            <h6 class="text-uppercase fs-13">Địa chỉ </h6>
                                            <a href="#" class="fs-14">Bac Tu Liem, Ha Noi</a>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-md-6 mb-0">
                                <div class="">
                                    <h5 class="fs-16 text-dark fw-semibold mb-3 text-capitalize">Projects</h5>
                                </div>

                                <div class="row">
                                    <div class="col-6">
                                        <div class="card border">
                                            <div class="card-body">
                                                <h4 class="m-0 fw-semibold text-dark fs-16">Website Developing</h4>
                                                <div class="row mt-2 d-flex align-items-center">
                                                    <div class="col">
                                                        <h5 class="fs-20 mt-1 fw-bold">$12,000</h5>
                                                        <p class="mb-0 text-muted">Total Budget</p>
                                                    </div>
                                                    <div class="col-auto">
                                                        <a href="#" class="btn btn-sm btn-outline-dark px-3">More Details</a>
                                                    </div>
                                                </div>
                                            </div><!--end card-body-->
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="card border">
                                            <div class="card-body">
                                                <h4 class="m-0 fw-semibold text-dark fs-16">Algorithm Developing</h4>
                                                <div class="row mt-2 d-flex align-items-center">
                                                    <div class="col">
                                                        <h5 class="fs-20 mt-1 fw-bold">$35,800</h5>
                                                        <p class="mb-0 text-muted">Total Budget</p>
                                                    </div>
                                                    <div class="col-auto">
                                                        <a href="#" class="btn btn-sm btn-outline-dark px-3">More Details</a>
                                                    </div>
                                                </div>
                                            </div><!--end card-body-->
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="card border mb-0">
                                            <div class="card-body ">
                                                <h4 class="m-0 fw-semibold text-dark fs-16">Digital Marketing</h4>
                                                <div class="row mt-2 d-flex align-items-center">
                                                    <div class="col">
                                                        <h5 class="fs-20 mt-1 fw-bold">$8,000</h5>
                                                        <p class="mb-0 text-muted">Total Budget</p>
                                                    </div>
                                                    <div class="col-auto">
                                                        <a href="#" class="btn btn-sm btn-outline-dark px-3">More Details</a>
                                                    </div>
                                                </div>
                                            </div><!--end card-body-->
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="card border mb-0">
                                            <div class="card-body">
                                                <h4 class="m-0 fw-semibold text-dark fs-16">Mobile Developing</h4>
                                                <div class="row mt-2 d-flex align-items-center">
                                                    <div class="col">
                                                        <h5 class="fs-20 mt-1 fw-bold">$16,000</h5>
                                                        <p class="mb-0 text-muted">Total Budget</p>
                                                    </div>
                                                    <div class="col-auto align-content-end">
                                                        <a href="#" class="btn btn-sm btn-outline-dark px-3">More Details</a>
                                                    </div>
                                                </div>
                                            </div><!--end card-body-->
                                        </div>
                                    </div>
                                </div>
                            </div><!-- end project -->

                            <div class="col-md-6 col-sm-6 col-md-6 mb-0">
                                <div class="">
                                    <h5 class="fs-16 text-dark fw-semibold mb-3 text-capitalize">Expertise</h5>
                                </div>

                                <div class="row align-items-center g-0">
                                    <div class="col-sm-3">
                                        <p class="text-truncate mt-1 mb-0"><i class="mdi mdi-circle-medium text-primary me-2"></i> Photoshop </p>
                                    </div>

                                    <div class="col-sm-9">
                                        <div class="progress mt-1" style="height: 8px;">
                                            <div class="progress-bar progress-bar bg-primary rounded" role="progressbar" style="width: 72%" aria-valuenow="52" aria-valuemin="0" aria-valuemax="52">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row align-items-center g-0 mt-3">
                                    <div class="col-sm-3">
                                        <p class="text-truncate mt-1 mb-0"><i class="mdi mdi-circle-medium text-primary me-2"></i> illustrator </p>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="progress mt-1" style="height: 8px;">
                                            <div class="progress-bar progress-bar bg-primary rounded" role="progressbar" style="width: 45%" aria-valuenow="45" aria-valuemin="0" aria-valuemax="45">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row align-items-center g-0 mt-3">
                                    <div class="col-sm-3">
                                        <p class="text-truncate mt-1 mb-0"><i class="mdi mdi-circle-medium text-primary me-2"></i> HTML </p>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="progress mt-1" style="height: 8px;">
                                            <div class="progress-bar progress-bar bg-primary rounded" role="progressbar" style="width: 68%" aria-valuenow="48" aria-valuemin="0" aria-valuemax="48">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row align-items-center g-0 mt-3">
                                    <div class="col-sm-3">
                                        <p class="text-truncate mt-1 mb-0"><i class="mdi mdi-circle-medium text-primary me-2"></i> CSS </p>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="progress mt-1" style="height: 8px;">
                                            <div class="progress-bar progress-bar bg-primary rounded" role="progressbar" style="width: 78%" aria-valuenow="78" aria-valuemin="0" aria-valuemax="78">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row align-items-center g-0 mt-3">
                                    <div class="col-sm-3">
                                        <p class="text-truncate mt-1 mb-0"><i class="mdi mdi-circle-medium text-primary me-2"></i> Javascript </p>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="progress mt-1" style="height: 8px;">
                                            <div class="progress-bar progress-bar bg-primary rounded" role="progressbar" style="width: 63%" aria-valuenow="63" aria-valuemin="0" aria-valuemax="63">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row align-items-center g-0 mt-3">
                                    <div class="col-sm-3">
                                        <p class="text-truncate mt-1 mb-0"><i class="mdi mdi-circle-medium text-primary me-2"></i> Php </p>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="progress mt-1" style="height: 8px;">
                                            <div class="progress-bar progress-bar bg-primary rounded" role="progressbar" style="width: 48%" aria-valuenow="48" aria-valuemin="0" aria-valuemax="48">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div><!-- end skill -->
                        </div>

                    </div><!-- end Experience -->




                    <div class="tab-pane pt-4" id="profile_setting" role="tabpanel">
                        <div class="row">

                            <div class="row">
                                <div class="col-lg-12 col-xl-12">
                                    <div class="card border mb-0">

                                        <div class="card-header">
                                            <div class="row align-items-center">
                                                <div class="col">
                                                    <h4 class="card-title mb-0">Cập nhật thông tin cá nhân </h4>
                                                </div><!--end col-->
                                            </div>
                                        </div>
                                        <form action="{{ route('account.quanlytaikhoan.myaccount.update_account', ['id' => Auth::id()]) }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div class="card-body">

                                                <div class="form-group mb-3 row">
                                                    <label class="form-label">Name </label>
                                                    <div class="col-lg-12 col-xl-12">
                                                        <input class="form-control" name="name" type="text" value="{{old('name',Auth::user()->name)}}">
                                                    </div>
                                                </div>



                                                <div class="form-group mb-3 row">
                                                    <label class="form-label">Contact Phone</label>
                                                    <div class="col-lg-12 col-xl-12">
                                                        <div class="input-group">
                                                            <span class="input-group-text"><i class="mdi mdi-phone-outline"></i></span>
                                                            <input class="form-control" name="so_dien_thoai" type="number" placeholder="Phone" aria-describedby="basic-addon1" value="{{old('so_dien_thoai' , Auth::user()->so_dien_thoai ?? 'Thêm số điện thoại ')}}">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group mb-3 row">
                                                    <label class="form-label">Email Address</label>
                                                    <div class="col-lg-12 col-xl-12">
                                                        <div class="input-group">
                                                            <span class="input-group-text"><i class="mdi mdi-email"></i></span>
                                                            <input type="email" class="form-control" value="{{old('email', Auth::user()->email)  }}" placeholder="Email" aria-describedby="basic-addon1">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-lg-12 col-xl-12">
                                                        <button type="submit" class="btn btn-primary"> Lưu</button>
                                                        <button type="button" class="btn btn-danger">Cancel</button>
                                                    </div>
                                                </div>
                                            </div>

                                        </form>
                                        <!--end card-body-->

                                    </div>

                                </div>

                              

                            </div>
                        </div>
                    </div> <!-- end education -->

                </div> <!-- Tab panes -->
            </div>
        </div>
    </div>
</div>


@endsection
@section('js')

@endsection