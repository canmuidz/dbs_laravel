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
                <h4 class="fs-18 fw-semibold m-0">Quản lý sản phẩm</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">{{$title}}</h5>
                    </div><!-- end card header -->

                    <div class="card-body">
                        <form action="{{ route('admins.sanphams.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-4">
                                    <!-- Product Code -->
                                    <div class="mb-3">
                                        <label for="tieu_de_san_pham" class="form-label">Tiêu đề bất động sản </label>
                                        <input type="text" id="tieu_de_san_pham" name="tieu_de_san_pham" class="form-control @error('tieu_de_san_pham') is-invalid @enderror" value="{{ old('tieu_de_san_pham') }}" placeholder="Nhập tiêu đề">
                                        @error('tieu_de_san_pham')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- số lượng phòng -->
                                    <div class="mb-3">
                                        <label for="so_luong_phong" class="form-label">Số lượng phòng</label>
                                        <input type="number" id="so_luong_phong" name="so_luong_phong" class="form-control @error('so_luong_phong') is-invalid @enderror" placeholder="Nhập số phòng  " value="{{ old('so_luong_phong') }}">
                                        @error('so_luong_phong')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Discount Price -->
                                    <div class="mb-3">
                                        <label for="gia" class="form-label">Giá bất động sản</label>
                                        <input type="number" id="gia" name="gia" class="form-control @error('gia') is-invalid @enderror" placeholder="Giá bất động sản" value="{{ old('gia') }}">
                                        @error('gia')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- dien tich -->
                                    <div class="input-group mb-3">
                                        <label for="dien_tich" class="form-label">Diện tích bất động sản</label>
                                        <input type="number" id="dien_tich" name="dien_tich" class="form-control @error('dien_tich') is-invalid @enderror" placeholder="Nhập diện tích" value="{{ old('dien_tich') }}">
                                        <span class="input-group-text">m²</span>
                                        @error('dien_tich')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Address -->
                                    <div class="mb-3">
                                        <label for="dia_chi" class="form-label">Địa chỉ bất động sản</label>
                                        <input type="text" id="dia_chi" name="dia_chi" class="form-control @error('dia_chi') is-invalid @enderror" placeholder="Nhập địa chỉ" value="{{ old('dia_chi') }}">
                                        @error('dia_chi')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Category -->
                                    <div class="mb-3">
                                        <label for="danh_muc_id" class="form-label">Danh Mục</label>
                                        <select name="danh_muc_id" class="form-select @error('danh_muc_id') is-invalid @enderror">
                                            <option value="" disabled selected>Chọn danh mục</option>
                                            @foreach ($listDanhMuc as $item)
                                            <option value="{{ $item->id }}" {{ old('danh_muc_id') == $item->id ? 'selected' : '' }}>{{ $item->ten_danh_muc }}</option>
                                            @endforeach
                                        </select>
                                        @error('danh_muc_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>

                                <div class="col-lg-8">
                                    <!-- Detailed Description -->
                                    <div class="mb-3">
                                        <label for="mo_ta_san_pham" class="form-label">Mô tả bất động sản </label>
                                        <div id="quill-editor" style="height: 400px;"></div>
                                        <textarea name="mo_ta_san_pham" id="mo_ta_san_pham" class="d-none">{{ old('mo_ta_san_pham') }}</textarea>
                                    </div>

                                    <!-- Main Image -->
                                    <div class="mb-3">
                                        <label for="anh_san_pham" class="form-label">Hình ảnh</label>
                                        <input type="file" id="anh_san_pham" name="anh_san_pham" class="form-control @error('anh_san_pham') is-invalid @enderror">
                                        @error('anh_san_pham')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <div class="mt-2">
                                            <img id="imagePreview" src="#" alt="Hình ảnh preview" style="display: none; width:200px;">
                                        </div>
                                    </div>

                                    <!-- Additional Images -->
                                    <div class="mb-3">
                                        <label for="additional_images" class="form-label">Album hình ảnh</label>
                                        <i id="add-row" class="mdi mdi-plus text-muted fs-18 rounded-2 border p-1 ms-3" style="cursor:pointer"></i>
                                        <table class="table align-middle table-nowrap mb-0">
                                            <tbody id="image-table-body">
                                                <tr>
                                                    <td class="d-flex align-item-center">
                                                        <img id="preview_0" src="https://uxwing.com/wp-content/themes/uxwing/download/video-photography-multimedia/pictures-icon.svg" alt="Hình ảnh sản phẩm" style="width: 40px; margin-right:6px;">
                                                        <input type="file" name="list_hinh_anh[id_0]" class="form-control @error('anh_bien_the') is-invalid @enderror" onchange="previewImage(this,0)">
                                                    </td>
                                                    <td><i class="mdi mdi-delete text-muted fs-18 rounded-2 border p-1" style="cursor:pointer" onclick="removeRow(this)"></i></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <!-- Status -->
                                <div class="mb-3">
                                    <label for="is_type" class="form-label">Trạng thái</label>
                                    <div class="col-sm-10 mb-3 d-flex gap-2">

                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="is_type" id="is_type_show" value="1" {{ old('is_type') == '1' ? 'checked' : '' }}>
                                            <label class="form-check-label text-success" for="is_type_show">Hiển thị</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="is_type" id="is_type_hide" value="0" {{ old('is_type') == '0' ? 'checked' : '' }}>
                                            <label class="form-check-label text-danger" for="is_type_hide">Ẩn</label>
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
        var oldContent = `{!! old('mo_ta_san_pham') !!}`;
        quill.root.innerHTML = oldContent;

        // Update hidden textarea with Quill editor content
        quill.on('text-change', function() {
            document.getElementById('mo_ta_san_pham').value = quill.root.innerHTML;
        });

        // Image preview for main image
        const fileInput = document.getElementById('anh_san_pham');
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
        var rowCount = 1;
        document.getElementById('add-row').addEventListener('click', function() {
            var tableBody = document.getElementById('image-table-body');
            var newRow = document.createElement('tr');

            newRow.innerHTML = `
                <td class="d-flex align-item-center">
                    <img id="preview_${rowCount}" src="https://uxwing.com/wp-content/themes/uxwing/download/video-photography-multimedia/pictures-icon.svg" alt="Hình ảnh sản phẩm" style="width: 40px; margin-right:6px;">
                    <input type="file" name="list_hinh_anh[id_${rowCount}]" class="form-control" onchange="previewImage(this, ${rowCount})">
                </td>
                <td>
                <i class="mdi mdi-delete text-muted fs-18 rounded-2 border p-1" style="cursor:pointer" onclick="removeRow(this)"></i></td>
            `;

            tableBody.appendChild(newRow);
            rowCount++;
        });
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