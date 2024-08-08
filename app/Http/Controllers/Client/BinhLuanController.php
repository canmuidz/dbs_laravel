<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\BinhLuanRequest;
use App\Models\SanPham;
use App\Models\BinhLuan;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class BinhLuanController extends Controller
{
    // Display comments for the product based on san_pham_id
    public function showBinhLuan($id)
    {
        // Get the product by san_pham_id along with related comments and users
        $sanPham = SanPham::with('binhLuans.user')->findOrFail($id);
        $tong_comments = $sanPham->binhLuans->count();
        return view('clients.pages.product-detail', compact('sanPham', 'tong_comments'));
    }


    // Add a comment for the product based on san_pham_id
    public function storeBinhLuan(BinhLuanRequest $request, $id)
    {
        // Get validated data from BinhLuanRequest
        $validated = $request->validated();

        // Create a new comment
        BinhLuan::create([
            'noi_dung' => $validated['noi_dung'],
            'danh_gia' => $validated['danh_gia'],
            'san_pham_id' => $id,
            'user_id' => Auth::id(), // Get the current user ID
            'ngay_binh_luan' => Carbon::now()->format('Y-m-d'), // Set the comment date
        ]);

        // Redirect the user back to the product page with a success message
        // return redirect()->route('clients.pages.product-detail', ['id' => $id])->with('success', 'Bình luận đã được thêm thành công!');
        return redirect()->back()->with('success', 'Bình luận đã được thêm thành công!');
    }
}
