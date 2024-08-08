<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AuthController extends Controller
{
    // Đăng nhập
    public function showFormLogin()
    {
        return view('auth.login');
    }
    public function login(Request $request)
    {
        $user = $request->validate([
            'email' => 'required|string|email|max:255',
            'password' => 'required|string'
        ]);
        // only : chỉ lấy dữ liệu muốn lấy từ requets
        // $user  = $request->only('email','password');

        if (Auth::attempt($user)) {
            $user = Auth::user();

            if ($user->role === User::ROLE_ADMIN) {
                return redirect('admins/dashboard');
            } elseif ($user->role === User::ROLE_USER) {
                return redirect()->intended('/home');
            }
        }

        return redirect()->back()->withErrors([
            'email' => 'Email không đúng',
        ]);
    }



    // Đăng ký 
    public function showFormRegister()
    {
        return view('auth.register');
    }
    public function register(Request $request)
    {
        // validate
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:8',
        ]);

        // Xử lý - thêm 
        $user = User::query()->create($data);

        Auth::login($user);

        return redirect()->intended('home');
    }


    // Đăng xuất
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function account_show(Request $request)

    {
        $user = Auth::user(); // Lấy thông tin người dùng hiện tại
        $title = " Thông tin tài khoản ";
        $avatar = $user->anh_dai_dien ? Storage::url($user->anh_dai_dien,'id') : asset('assets/client/images/avatar.png');
        $showForm = $request->query('showForm') === 'true';
        return view('admins.dashboard', compact('user', 'title', 'avatar', 'showForm')); 
        // Trả về view với thông tin người dùng
    }
    public function update_account(Request $request, string $id)
    {
        $user = Auth::user(); // Lấy người dùng hiện tại

        // Xác thực dữ liệu
        $data = $request->validate([
            'name' => 'nullable|string|max:255',
            'email' => 'nullable|string|email|max:255|unique:users,email,' . $user->id,
            'so_dien_thoai' => 'nullable|string|max:20', // Ví dụ cho số điện thoại
        ]);

        // Cập nhật thông tin người dùng
        $user->update($data);

        return redirect()->route('account.quanlytaikhoan.myaccount')->with('success', 'Cập nhật  thành công');
    }
}
