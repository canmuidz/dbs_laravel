@extends('layouts.admin')

@section('title')
{{$title}}
@endsection

@section('css')
@endsection

@section('content')
<div class="content">
    <!-- Start Content-->
    <div class="container-xxl">
        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">Quản lý danh mục </h4>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">{{$title}}</h5>
                    </div><!-- end card header -->

                    <div class="card-body">
                        <form action="{{ route('admins.banners.update',$banner->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                

                               
                                    <div class="mb-3">
                                        <label for="banner" class="form-label">Ảnh Banner </label>
                                        <input type="file" id="banner" name="banner" 
                                        class="form-control @error('banner') is-invalid @enderror"
                                         >
                                        @error('banner')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                        <div class="mt-2 d-flex justify-content-center">
                                            <img id="imagePreview" src="{{ Storage::url($banner->banner) }}" alt="Hình ảnh preview" style="width:200px;">
                                        </div>
                                    </div>
                       

                

                                    <div class="col-sm-10 mb-3 gap-2 d-flex justify-content-center">
                                    <label for="trang_thai" class="form-label">Trạng thái</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="trang_thai" id="trang_thai_show" value="1" {{ $banner->trang_thai == 1 ? 'checked' : '' }}>
                                        <label class="form-check-label" for="trang_thai_show">Hiển thị</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="trang_thai" id="trang_thai_hide" value="0" {{ $banner->trang_thai == 0 ? 'checked' : '' }}>
                                        <label class="form-check-label" for="trang_thai_hide">Ẩn</label>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-center">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> <!-- container-fluid -->
@endsection

@section('js')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const fileInput = document.getElementById('banner');
        const imagePreview = document.getElementById('imagePreview');

        fileInput.addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    imagePreview.src = e.target.result;
                    imagePreview.style.display = 'block';
                };

                reader.readAsDataURL(file);
            } else {
                imagePreview.src = '#';
                imagePreview.style.display = 'none';
            }
        });
    });
</script>
@endsection