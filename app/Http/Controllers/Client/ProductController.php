<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\SanPhamRequest;
use App\Models\DanhMuc;
use App\Models\SanPham;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{

    // sản phẩm ở client
    public function show_sanpham()
    {
        
        $listSanPham = SanPham::orderByDesc('is_type')->get();  
        return view('clients.pages.product', compact('listSanPham'));
    }


    public function product_detail($id)
    {
        $sanPham = SanPham::find($id);
        if (!$sanPham) {
            abort(404); // Nếu sản phẩm không tồn tại, trả về lỗi 404
        }

        return view('clients.pages.product-detail', compact('sanPham'));
    }

    public function product_create()
    {
        $title = "Thêm thông tin bất động sản ";
        $listDanhMuc = DanhMuc::all(); // Get all categories
        return view('account.quanlytaikhoan.product-create', compact('title', 'listDanhMuc'));
    }

    
    public function product_store(SanPhamRequest $request)
    {
        if ($request->isMethod('POST')) {
            $params = $request->except('_token');
    
           // Xử lý việc tải lên hình ảnh chính
            if ($request->hasFile('anh_san_pham')) {
                $filepath = $request->file('anh_san_pham')->store('uploads/sanpham', 'public');
                $params['anh_san_pham'] = $filepath;
            } else {
                $params['anh_san_pham'] = null;
            }
    
           // Đặt ID người dùng đã xác thực làm user_id cho sản phẩm
            $params['user_id'] = Auth::id();
    
            try {
               // Tạo sản phẩm và lấy phiên bản sản phẩm mới được tạo
                $sanPham = SanPham::create($params);
                // dd( $sanPham);
             // Xử lý album anh
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
    
                return redirect()->route('clients.pages.product')->with('success', 'Thêm sản phẩm thành công');
            } catch (\Exception $e) {
                return redirect()->back()->with('error', 'Có lỗi xảy ra: ' . $e->getMessage());
            }
        }
      

        
    }
}
