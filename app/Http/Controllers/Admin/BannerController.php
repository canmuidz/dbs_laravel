<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Http\Requests\BannerRequest;

use App\Models\Banner;


class BannerController extends Controller
{
    //
    public function index()
    {
        //
        $title = 'Danh sách banner';
        $listBanner = Banner::query()->get();
        return view('admins.banners.index', compact('title', 'listBanner'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $title = 'Thêm mới banner';
        return view('admins.banners.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BannerRequest $request)
    {
        //
        if ($request->isMethod('POST')) {
            $param = $request->except('_token');

            if ($request->hasFile('banner')) {
                $filepath = $request->file('banner')->store('uploads/banner', 'public');
            } else {
                $filepath = null;
            }
            $param['banner'] = $filepath;

            Banner::create($param);

            return redirect()->route('admins.banners.index')->with('success', 'Thêm banner thành công');
        };
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
        $title = 'Cập nhật banner';

        $banner = Banner::query()->findOrFail($id);

        return view('admins.banners.edit', compact('title', 'banner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        if ($request->isMethod('PUT')) {
            $param = $request->except('_token', '_method');

            $banner = Banner::query()->findOrFail($id);

            if ($request->hasFile('banner')) {

                // Xóa ảnh cũ
                if ($banner->banner && Storage::disk('public')->exists($banner->banner)) {
                    Storage::disk('public')->delete($banner->banner);
                };

                $filepath = $request->file('banner')->store('uploads/banner', 'public');
            } else {
                $filepath = $banner->banner;
            }
            $param['banner'] = $filepath;

            $banner->update($param);

            return redirect()->route('admins.banners.index')->with('success', 'Cập nhật banner thành công');
        };
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $banner = Banner::query()->findOrFail($id);

        if ($banner->banner && Storage::disk('public')->exists($banner->banner)) {
            Storage::disk('public')->delete($banner->banner);
        };

        $banner->delete();

        return redirect()->route('admins.banners.index')->with('success', 'Xóa banner thành công');
    }
}
