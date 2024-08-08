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

        <!-- Striped Rows -->
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h5 class="card-title mb-0">{{$title}}</h5>
                    <a href="{{route('admins.banners.create')}}" class="btn btn-success">Thêm ảnh banner </a>
                </div><!-- end card header -->
                <div class="row">
                    <div class="card-body">
                        <div class="table-responsive">

                            <!-- Hiển thị thông báo thành công -->
                            @if (session('success'))
                            <div class="alert alert-success alert-dismissable fade show " role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close justify-content-center" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            @endif
                            <table class="table table-striped mb-0">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Ảnh Banner</th>
                                        <th scope="col">Trạng Thái </th>
                                        <th scope="col">Hành Động </th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($listBanner as $index => $item)
                                    <tr>
                                        <th scope="row">{{$index + 1}}</th>
                                        <td>
                                            <img src="{{ Storage::url($item->banner) }}" width="100px" alt="">
                                        </td>
                                       
                                        <td class="{{ $item->trang_thai ? 'text-success' : 'text-danger' }}">
                                            {{ $item->trang_thai ? 'Hiển Thị' : 'Ẩn' }}
                                        </td>
                                        <td>
                                            <a href="{{ route('admins.banners.edit', $item->id) }}"><i class="mdi mdi-pencil text-muted fs-18 rounded-2 border p-1 me-1"></i></a>
                                            <form action="{{ route('admins.banners.destroy', $item->id) }}" method="POST" style="display:inline;" onsubmit="return confirm ('Bạn có muốn xóa danh mục sản phẩm này không ?') ">
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
    </div> <!-- container-fluid -->
</div>
@section('js')
<!-- Include your JS files here -->
@endsection
@endsection