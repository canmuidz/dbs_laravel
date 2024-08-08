<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DanhMuc;
use Illuminate\Support\Facades\Storage;


class DanhMucController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $title = "Danh mục sản phẩm";
        $listDanhMuc = DanhMuc::orderByDesc('trang_thai')->get();
        return view('admins.danhmucs.index', compact('title', 'listDanhMuc'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $title = "Thêm danh mục sản phẩm";
        return view('admins.danhmucs.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        if ($request->isMethod('POST')) {
            $param = $request->except('_token');
            if ($request->hasFile('anh_danh_muc')) {
                $filepath = $request->file('anh_danh_muc')->store('uploads/danhmucs', 'public');
            } else {
                $filepath = null;
            }
            $param['anh_danh_muc'] = $filepath;
            $param['trang_thai'] = $request->input('trang_thai', 0);
            DanhMuc::create($param);
        }
        // Redirect with success message
        return redirect()->route('admins.danhmucs.index')->with('success', 'Thêm danh mục thành công');
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
        $title = "Chỉnh sửa danh mục sản phẩm";
        $danhMuc = DanhMuc::findOrFail($id); // Corrected method
        return view('admins.danhmucs.edit', compact('title', 'danhMuc'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        if ($request->isMethod('PUT')) {
            $param = $request->except('_token','_method');
            $danhMuc = DanhMuc::findOrFail($id);
            if ($request->hasFile('anh_danh_muc')) {
                      if($danhMuc->anh_danh_muc && Storage::disk('public')->exists($danhMuc->anh_danh_muc)){
                        Storage::disk('public')->delete($danhMuc->anh_danh_muc);
                      }
                $filepath = $request->file('anh_danh_muc')->store('uploads/danhmucs', 'public');
            } else {
                $filepath = $danhMuc->anh_danh_muc;
            }
            $param['anh_danh_muc'] = $filepath;
            // $param['trang_thai'] = $request->input('trang_thai', 0);

            $danhMuc->update($param);
           
        }
        // Redirect with success message
        return redirect()->route('admins.danhmucs.index')->with('success', 'Cập nhật danh mục thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
         // Retrieve the existing record
         $danhMuc = DanhMuc::findOrFail($id);

         // // Delete the file if it exists
         if ($danhMuc->anh_danh_muc) {
             Storage::disk('public')->delete($danhMuc->anh_danh_muc);
         }
 
         // // Delete the record
         $danhMuc->delete();
 
         // // Redirect with success message
         return redirect()->route('admins.danhmucs.index')->with('success', 'Xóa danh mục thành công');
    }
}
