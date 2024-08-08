<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SanPhamRequest;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;
use App\Models\HinhAnhSanPham;

use App\Models\DanhMuc;
use App\Models\SanPham;
use Illuminate\Support\Facades\Auth;

class SanPhamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $title = "Danh sách bất động sản ";
        $listSanPham = SanPham::with('user')->orderByDesc('is_type')->get();
        return view('admins.sanphams.index', compact('title', 'listSanPham'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $title = "Thêm thông tin bất động sản ";
        $listDanhMuc = DanhMuc::all(); // Get all categories
        return view('admins.sanphams.create', compact('title', 'listDanhMuc'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SanPhamRequest $request)
{
    if ($request->isMethod('POST')) {
        $params = $request->except('_token');

        // Handle main image upload
        if ($request->hasFile('anh_san_pham')) {
            $filepath = $request->file('anh_san_pham')->store('uploads/sanpham', 'public');
            $params['anh_san_pham'] = $filepath;
        } else {
            $params['anh_san_pham'] = null;
        }

        // Set the authenticated user ID as the user_id for the product
        $params['user_id'] = Auth::id();

        try {
            // Create the product and get the newly created product instance
            $sanPham = SanPham::create($params);
            // dd( $sanPham);
            // Handle additional images
            if ($request->hasFile('list_hinh_anh')) {
                foreach ($request->file('list_hinh_anh') as $image) {
                    if ($image) {
                        $path = $image->store('uploads/hinhanhsanpham/id_' . $sanPham->id, 'public');
                        $sanPham->hinhanhSanPham()->create([
                            'san_pham_id' => $sanPham->id,
                            'anh_bien_the' => $path,
                        ]);
                    }
                }
            }

            return redirect()->route('admins.sanphams.index')->with('success', 'Thêm sản phẩm thành công');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Có lỗi xảy ra: ' . $e->getMessage());
        }
    }
}

    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $title = "Cập nhật thông tin bất động sản  "; 
        $sanPham = SanPham::find($id);
        $listDanhMuc = DanhMuc::all();
        return view('admins.sanphams.edit', compact('sanPham','title', 'listDanhMuc'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //

        if ($request->isMethod('PUT')) {

            $params = $request->except('_token', '_method');

            
            $sanPham = SanPham::findOrFail($id);
            $sanPham->is_type = $request->input('is_type');
             $sanPham->save();
            // xử lý hình ảnh đại diện 
            if ($request->hasFile('anh_san_pham')) {
                if ($sanPham->anh_san_pham && Storage::disk('public')->exists($sanPham->anh_san_pham)) {
                    Storage::disk('public')->delete($sanPham->anh_san_pham);
                }
                $params['anh_san_pham'] = $request->file('anh_san_pham')->store('uploads/sanpham', 'public');
            } else {
                $params['anh_san_pham'] = $sanPham->anh_san_pham;
            }






            // xử lý album
            if ($request->hasFile('list_hinh_anh')) {
                $currentImage = $sanPham->hinhAnhSanPham->pluck('id')->toArray();
                $arrayCombine = array_combine($currentImage, $currentImage);



                // Truoengwf hơp xóa
                foreach ($arrayCombine as $key => $value) {
                    // tìm kiếm id hình ảnh trong mảng hình ảnh
                    // Nếu  ko tồn tại id => ng dùng đã xóa 
                    if (!array_key_exists($key, $request->list_hinh_anh)) {

                        $hinhAnhSanPham = HinhAnhSanPham::query()->find($key);
                        // xóa hình ảnh
                        if ($hinhAnhSanPham && Storage::disk('public')->exists($hinhAnhSanPham->hinh_anh)) {
                            Storage::disk('public')->delete($hinhAnhSanPham->hinh_anh);
                            $hinhAnhSanPham->delete();
                        }
                    }
                }
                //Trường hợp thêm hoặc sửa
                foreach ($request->list_hinh_anh as $key => $image) {
                    if (!array_key_exists($key, $arrayCombine)) {
                        if ($request->hasFile("list_hinh_anh.$key")) {
                            $path = $image->store('uploads/hinhanhsanpham/id_' . $id, 'public');
                            $sanPham->hinhAnhSanPham()->create([
                                'san_pham_id' => $id,
                                'anh_bien_the' => $path,
                            ]);
                        }
                    } else if (is_file($image) && $request->hasFile("list_hinh_anh.$key")) {
                        //Trường hợp thay đổi ảnh
                        $hinhAnhSanPham = HinhAnhSanPham::query()->find($key);
                        if ($hinhAnhSanPham && Storage::disk('public')->exists($hinhAnhSanPham->hinh_anh)) {
                            Storage::disk('public')->delete($hinhAnhSanPham->hinh_anh);
                        }
                        $path = $image->store('uploads/hinhanhsanpham/id_' . $id, 'public');
                        $hinhAnhSanPham->update([
                            'anh_bien_the' => $path,
                        ]);
                    }
                }
            }


            $sanPham->update($params);
            return redirect()->route('admins.sanphams.index')->with('success', 'Cập nhật sản phẩm thành công');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //

        $sanPham = SanPham::findOrFail($id);

        // xóa hình ảnh đại diện của sản phẩm
        if ($sanPham->anh_san_pham && Storage::disk('public')->exists($sanPham->anh_san_pham)) {
            Storage::disk('public')->delete($sanPham->anh_san_pham);
        }

        // Xóa album ảnh
        $sanPham->hinhAnhSanPham()->delete();
        //xóa toàn bộ ảnh trong thư mục 

        $path =  'uploads/hinhanhsanpham/id_' . $id;
        if (Storage::disk('public')->exists($path)) {
            Storage::disk('public')->deleteDirectory($path);
        }

        $sanPham->delete();
        return redirect()->route('admins.sanphams.index')->with('success', 'Xóa sản phẩm thành công');
    }
}
