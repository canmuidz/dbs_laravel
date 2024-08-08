@extends('layouts.admin')

@section('title')
{{$title}}
@endsection

@section('css')
<!-- Quill css -->
<link href="{{asset('assets/admin/libs/quill/quill.snow.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/admin/libs/quill/quill.bubble.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
<div class="content">
    <!-- Start Content-->
    <div class="container-xxl">
        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">Quản lý bài viết</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">{{$title}}</h5>
                    </div><!-- end card header -->

                    <div class="card-body">
                        <form action="{{ route('admins.baiviets.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-4">
                                    <!-- Product Code -->
                                    <div class="mb-3">
                                        <label for="tieu_de_bai_viet" class="form-label">Tiêu đề bài viết </label>
                                        <input type="text" id="tieu_de_bai_viet" name="tieu_de_bai_viet" 
                                        class="form-control @error('tieu_de_bai_viet') is-invalid @enderror" 
                                        value="{{ old('tieu_de_bai_viet') }}"
                                         placeholder="Nhập tiêu đề">
                                        @error('tieu_de_bai_viet')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- ngay dang -->

                                    <div class="mb-3">
                                        <label for="ngay_dang" class="form-label">Ngày đăng</label>
                                        <input type="date" id="ngay_dang" name="ngay_dang" 
                                        class="form-control @error('ngay_dang') is-invalid @enderror" 
                                        value="{{ old('ngay_dang') }}">
                                        @error('ngay_dang')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Short Description -->
                                    <div class="mb-3">
                                        <label for="mo_ta_ngan" class="form-label">Mô Tả</label>
                                        <textarea name="mo_ta_ngan" id="mo_ta_ngan" 
                                        class="form-control @error('mo_ta_ngan') is-invalid @enderror" 
                                        rows="3" placeholder="Mô tả ngắn">{{ old('mo_ta_ngan') }}</textarea>
                                        @error('mo_ta_ngan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                  

                                </div>

                                <div class="col-lg-8">
                                    <!-- Detailed Description -->
                                    <div class="mb-3">
                                        <label for="noi_dung_content" class="form-label">Mô tả bất động sản </label>
                                        <div id="quill-editor" style="height: 400px;"></div>
                                        <textarea name="noi_dung" id="noi_dung_content" 
                                        class="d-none">{{ old('noi_dung_content') }}</textarea>
                                    </div>

                                    <!-- Main Image -->
                                    <div class="mb-3">
                                        <label for="anh_bai_viet" class="form-label">Hình ảnh</label>
                                        <input type="file" id="anh_bai_viet" name="anh_bai_viet" 
                                        class="form-control @error('anh_bai_viet') is-invalid @enderror">
                                        @error('anh_bai_viet')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <div class="mt-2">
                                            <img id="imagePreview" src="#" alt="Hình ảnh preview" style="display: none; width:200px;">
                                        </div>
                                    </div>

                                </div>

    
                                <div class="d-flex justify-content-center">
                                    <button type="submit" class="btn btn-primary">Submit</button>
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
<!-- Quill Editor Js -->
<script src="{{ asset('assets/admin/libs/quill/quill.min.js') }}"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize Quill editor
        var quill = new Quill("#quill-editor", {
            theme: "snow",
        });

        // Set initial content
        var oldContent = `{!! old('noi_dung') !!}`;
        quill.root.innerHTML = oldContent;

        // Update hidden textarea with Quill editor content
        quill.on('text-change', function() {
            document.getElementById('noi_dung_content').value = quill.root.innerHTML;
        });

        // Image preview for main image
        const fileInput = document.getElementById('anh_bai_viet');
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

        // Add new image row to the table
        
    });

    // Preview image function
    function previewImage(input, rowIndex) {
        if (input.files && input.files[0]) {
            const reader = new FileReader();

            reader.onload = function(e) {
                document.getElementById(`preview_${rowIndex}`).src = e.target.result;
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

    // Remove image row function
    function removeRow(item) {
        item.closest('tr').remove();
    }
</script>
@endsection
