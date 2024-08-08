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
                        <form action="{{ route('admins.sanphams.update', $sanPham->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-lg-4">
                                    <!-- Product Code -->
                                    <div class="mb-3">
                                        <label for="tieu_de_san_pham" class="form-label">Tên danh mục</label>
                                        <input type="text" id="tieu_de_san_pham" name="tieu_de_san_pham" 
                                               class="form-control @error('tieu_de_san_pham') is-invalid @enderror"
                                               value="{{ old('tieu_de_san_pham', $sanPham->tieu_de_san_pham) }}">
                                        @error('tieu_de_san_pham')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>

                                    <!-- Số lượng phòng -->
                                    <div class="mb-3">
                                        <label for="so_luong_phong" class="form-label">Số lượng phòng</label>
                                        <input type="number" id="so_luong_phong" name="so_luong_phong" 
                                               class="form-control @error('so_luong_phong') is-invalid @enderror"
                                               placeholder="Nhập số phòng" value="{{ old('so_luong_phong', $sanPham->so_luong_phong) }}">
                                        @error('so_luong_phong')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Giá -->
                                    <div class="mb-3">
                                        <label for="gia" class="form-label">Giá bất động sản</label>
                                        <input type="number" id="gia" name="gia" 
                                               class="form-control @error('gia') is-invalid @enderror" placeholder="Giá bất động sản"
                                               value="{{ old('gia', $sanPham->gia) }}">
                                        @error('gia')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Diện tích -->
                                    <div class="input-group mb-3">
                                        <label for="dien_tich" class="form-label">Diện tích bất động sản</label>
                                        <input type="number" id="dien_tich" name="dien_tich"
                                               class="form-control @error('dien_tich') is-invalid @enderror" 
                                               placeholder="Nhập diện tích" value="{{ old('dien_tich', $sanPham->dien_tich) }}">
                                        <span class="input-group-text">m²</span>
                                        @error('dien_tich')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Địa chỉ -->
                                    <div class="mb-3">
                                        <label for="dia_chi" class="form-label">Địa chỉ bất động sản</label>
                                        <input type="text" id="dia_chi" name="dia_chi"
                                               class="form-control @error('dia_chi') is-invalid @enderror" 
                                               placeholder="Nhập địa chỉ" value="{{ old('dia_chi', $sanPham->dia_chi) }}">
                                        @error('dia_chi')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Danh Mục -->
                                    <div class="mb-3">
                                        <label for="danh_muc_id" class="form-label">Danh Mục</label>
                                        <select name="danh_muc_id" class="form-select @error('danh_muc_id') is-invalid @enderror">
                                            <option value="" disabled selected>Chọn danh mục</option>
                                            @foreach ($listDanhMuc as $item)
                                            <option value="{{ $item->id }}" {{ $sanPham->danh_muc_id == $item->id ? 'selected' : '' }}>
                                                {{ $item->ten_danh_muc }}
                                            </option>
                                            @endforeach
                                        </select>
                                        @error('danh_muc_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-8">
                                    <!-- Mô tả chi tiết -->
                                    <div class="mb-3">
                                        <label for="mo_ta_san_pham" class="form-label">Mô tả bất động sản</label>
                                        <div id="quill-editor" style="height: 400px;"></div>
                                        <textarea name="mo_ta_san_pham" id="mo_ta_chi_tiet" class="d-none"></textarea>
                                    </div>

                                    <!-- Hình ảnh chính -->
                                    <div class="mb-3">
                                        <label for="anh_san_pham" class="form-label">Hình ảnh</label>
                                        <input type="file" id="anh_san_pham" name="anh_san_pham" 
                                               class="form-control @error('anh_san_pham') is-invalid @enderror">
                                        @error('anh_san_pham')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <div class="mt-2">
                                            <img id="imagePreview" src="{{Storage::url($sanPham->anh_san_pham)}}" alt="Hình ảnh preview" style="width:150px;">
                                        </div>
                                    </div>

                                    <!-- Album hình ảnh -->
                                    <div class="mb-3">
                                        <label for="additional_images" class="form-label">Album hình ảnh</label>
                                        <i id="add-row" class="mdi mdi-plus text-muted fs-18 rounded-2 border p-1 ms-3" style="cursor:pointer"></i>
                                        <table class="table align-middle table-nowrap mb-0">
                                            <tbody id="image-table-body">
                                                @foreach ($sanPham->hinhAnhSanPham as $index => $hinhAnh)
                                                <tr>
                                                    <td class="d-flex align-items-center">
                                                        <img id="preview_{{$index}}" 
                                                             src="{{Storage::url($hinhAnh->anh_bien_the)}}"
                                                             alt="Hình ảnh sản phẩm" style="width: 40px; margin-right:6px;">
                                                        <input type="file" name="list_hinh_anh[{{$hinhAnh->id}}]" 
                                                               class="form-control @error('anh_bien_the') is-invalid @enderror"
                                                               onchange="previewImage(this, '{{$index}}')" value="{{$hinhAnh->id}}">
                                                    </td>
                                                    <td>
                                                        <i class="mdi mdi-delete text-muted fs-18 rounded-2 border p-1" style="cursor:pointer" onclick="removeRow(this)"></i>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <!-- Trạng thái -->
                                <div class="mb-3">
                                    <label for="is_type" class="form-label">Trạng thái</label>
                                    <div class="col-sm-10 d-flex gap-2">
                                        @foreach(['1' => 'Hiển thị', '0' => 'Ẩn'] as $value => $label)
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="is_type" id="trang_thai_{{ $value }}" value="{{ $value }}" {{ old('is_type') == $value ? 'checked' : '' }}>
                                            <label class="form-check-label {{ $value == '1' ? 'text-success' : 'text-danger' }}" for="trang_thai_{{ $value }}">{{ $label }}</label>
                                        </div>
                                        @endforeach
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
        var oldContent = `{!! $sanPham->mo_ta_san_pham !!}`;
        quill.root.innerHTML = oldContent;

        // Update hidden textarea with Quill editor content
        quill.on('text-change', function() {
            document.getElementById('mo_ta_chi_tiet').value = quill.root.innerHTML;
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
        var rowCount = `{{ count($sanPham->hinhAnhSanPham) }}`;
        document.getElementById('add-row').addEventListener('click', function() {
            var tableBody = document.getElementById('image-table-body');
            var newRow = document.createElement('tr');

            newRow.innerHTML = `
                <td class="d-flex align-items-center">
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
