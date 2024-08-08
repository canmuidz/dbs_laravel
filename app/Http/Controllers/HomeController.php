<?php

namespace App\Http\Controllers;

use App\Models\SanPham;
use App\Models\BaiViet;
use App\Models\Banner;
use App\Http\Requests\BaiVietRequest;
use App\Models\BinhLuan;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

     // bắt buộc đăng nhập 
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    // đổ ra trang chủ để ở index
    public function index()
    {    
        
        $listSanPham = SanPham::orderByDesc('is_type')->get();
        $showBaiViet = BaiViet::with('baiviet_user')->get();
        $listBanner = Banner::query()->get();
        $showBinhLuan = BinhLuan::with('binhLuans.user')->get();

        return view('clients.pages.home', compact('listSanPham','showBaiViet','listBanner','showBinhLuan'));
    }
    
    //thông tin cá nhân 
    public function show_about(){
        return view ('clients.pages.about');
    }
    

    
}
