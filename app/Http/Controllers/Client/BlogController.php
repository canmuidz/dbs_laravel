<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\BaiVietRequest;
use Carbon\Carbon;
use App\Models\BaiViet;

use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    //


    // Show tất cả bài viết bài viết 
    public function show_blog()
    {
        $showBaiViet = BaiViet::with('baiviet_user')->get();
        return view('clients.pages.blog', compact('showBaiViet'));
    }




    //bài viết chi tiết
    public function blog_detail($id)
    {
        $showBaiViet = BaiViet::with('baiviet_user')->find($id);
        return view('clients.pages.blog-detail', compact('showBaiViet'));
    }


    public function blog_create()
    {
        $title = " Thêm bài viết";
        return view('account.quanlytaikhoan.blog-create', compact('title'));
    }


    public function blog_store(BaiVietRequest $request)
    {


        if ($request->isMethod('POST')) {
            $param = $request->except('_token');

            if ($request->hasFile('anh_bai_viet')) {
                $filepath = $request->file('anh_bai_viet')->store('uploads/baiviet', 'public');
                $param['anh_bai_viet'] = $filepath;
            } else {
                $param['anh_bai_viet'] = null;
            }

            $param['user_id'] = Auth::id();
            $param['ngay_dang'] = Carbon::now()->format('Y-m-d');

            BaiViet::create($param);

         

            return redirect()->route('clients.pages.blog')->with('success', 'Thêm bài viết thành công');
        }
    }
}
    