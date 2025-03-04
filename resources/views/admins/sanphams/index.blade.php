@extends('layouts.admin')

@section('title')
{{$title}}
@endsection

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
<div class="content">
    <!-- Start Content-->
    <div class="container-xxl">
        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">Quản lý danh mục </h4>
            </div>
        </div>

        <!-- Striped Rows -->
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h5 class="card-title mb-0">{{$title}}</h5>
                    <a href="{{route('admins.sanphams.create')}}" class="btn btn-success">Thêm Sản Phẩm </a>
                </div><!-- end card header -->
                <div class="row">
                    <div class="card-body">
                        <div class="table-responsive">

                            <!-- Hiển thị thông báo thành công -->
                            @if (session('success'))
                            <div class="alert alert-success alert-dismissable fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close justify-content-center" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            @endif
                            <table class="table table-striped mb-0 table-sm">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Tiêu đề</th>
                                        <th scope="col">Ảnh</th>
                                        <th scope="col">Phòng</th>
                                        <th scope="col">Danh mục</th>
                                        <th scope="col">Giá</th>
                                        <th scope="col">Địa chỉ</th>
                                        <th scope="col">Trạng Thái</th>
                                        <th scope="col">Người Đăng</th>
                                        <th scope="col">Hành Động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($listSanPham as $index => $item)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td class="heading truncated">{{$item->tieu_de_san_pham}}</td>
                                        <td>
                                            <img src="{{Storage::url($item->anh_san_pham) }}" class="img-thumbnail" width="100px" alt="">
                                        </td>
                                        <td>{{$item->so_luong_phong}}</td>
                                        <td>{{$item->danhMuc->ten_danh_muc}}</td>
                                        <td>{{number_format($item->gia)}}</td>
                                        <td>{{$item->dia_chi}}</td>
                                        <td class="{{ $item->is_type ? 'text-success' : 'text-danger' }}">
                                            {{ $item->is_type ? 'Hiển Thị' : 'Ẩn' }}
                                        </td>
                                        <td>{{ $item->user ? $item->user->name : 'No user' }}</td>
                                        <td>
                                            <a href="{{ route('admins.sanphams.edit', $item->id) }}">
                                                <i class="mdi mdi-pencil text-muted fs-18 rounded-2 border p-1 me-1"></i>
                                            </a>
                                            <form action="{{ route('admins.sanphams.destroy', $item->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Bạn có muốn xóa danh mục sản phẩm này không ?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" style="border: none; background: none;">
                                                    <i class="mdi mdi-delete text-muted fs-18 rounded-2 border p-1"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@section('js')
<!-- Include your JS files here -->
@endsection
@endsection