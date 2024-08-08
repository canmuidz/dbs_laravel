<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BaiVietRequest;
use App\Models\BaiViet;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BaiVietController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $title = 'Danh sách bài viết';
       
        $listBaiViet = BaiViet::with('baiviet_user')->get();
        return view('admins.baiviets.index', compact('title', 'listBaiViet'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Thêm bài viết';
        //
        return view('admins.baiviets.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BaiVietRequest $request)
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

            return redirect()->route('admins.baiviets.index')->with('success', 'Thêm bài viết thành công');
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
        $title = 'Chỉnh sửa bài viết';
        //
        $baiviet = BaiViet::query()->findOrFail($id);
        return view('admins.baiviets.edit', compact('title', 'baiviet'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        if ($request->isMethod('PUT')) {
            $param = $request->except('_token', '_method');

            $baiviet = BaiViet::query()->findOrFail($id);

            if ($request->hasFile('anh_bai_viet')) {

                // Xóa ảnh cũ
                if ($baiviet->anh_bai_viet && Storage::disk('public')->exists($baiviet->anh_bai_viet)) {
                    Storage::disk('public')->delete($baiviet->anh_bai_viet);
                };

                $filepath = $request->file('anh_bai_viet')->store('uploads/baiviet', 'public');
            } else {
                $filepath = $baiviet->anh_bai_viet;
            }
            $param['anh_bai_viet'] = $filepath;

            $baiviet->update($param);

            return redirect()->route('admins.baiviets.index')->with('success', 'Cập nhật bài viết thành công');
        };
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $baiviet = BaiViet::query()->findOrFail($id);
        if ($baiviet->anh_bai_viet && Storage::disk('public')->exists($baiviet->anh_bai_viet)) {
            Storage::disk('public')->delete($baiviet->anh_bai_viet);
        }

        $baiviet->delete();

        return redirect()->route('admins.baiviets.index')->with('success', 'Xóa bài viết thành công');
    }
}
