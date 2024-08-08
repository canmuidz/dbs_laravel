<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;


class AccountController extends Controller
{
    //


    public function account_show(Request $request)

    {
        $user = Auth::user(); // Lấy thông tin người dùng hiện tại
        $title = " Thông tin tài khoản ";
        $avatar = $user->anh_dai_dien ? Storage::url($user->anh_dai_dien) : asset('assets/client/images/avatar.png');
        $showForm = $request->query('showForm') === 'true';
        return view('account.quanlytaikhoan.myaccount', compact('user', 'title', 'avatar', 'showForm'));
        // Trả về view với thông tin người dùng
    }

    public function updateAvatar(Request $request)
    {
        if ($request->isMethod('post')) {
            $request->validate([
                'anh_dai_dien' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            $params = $request->except('_token');
            $user = Auth::user();

            if ($request->hasFile('anh_dai_dien')) {
                // Delete old avatar
                if ($user->anh_dai_dien) {
                    Storage::disk('public')->delete($user->anh_dai_dien);
                }

                // Save new avatar
                $filepath = $request->file('anh_dai_dien')->store('uploads/avatars', 'public');
                $params['anh_dai_dien'] = $filepath;
            } else {
                $params['anh_dai_dien'] = $user->anh_dai_dien;
            }

            try {
                // Update user profile
                $user->update($params);

                return redirect()->route('account.quanlytaikhoan.myaccount')->with('success', 'Cập nhật hình đại diện thành công');
            } catch (\Exception $e) {
                return redirect()->back()->with('error', 'Có lỗi xảy ra: ' . $e->getMessage());
            }
        }
    }
}
