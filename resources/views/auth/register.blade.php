@extends('layouts.auth')

@section('content')
<section class="fxt-template-animation fxt-template-layout9" data-bg-image="{{asset('assets/auth/img/figure/bg9-l.jpg')}}">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-lg-3 col-12">
                <div class="fxt-header">
                    <a href="{{ route('login') }}" class="fxt-logo"><img src="{{asset('assets/auth/img/logo-9.png')}}" alt="Logo"></a>
                </div>
            </div>
            <div class="col-lg-6 col-12">
                <div class="fxt-content">
                    <h2>Đăng ký tài khoản mới</h2>
                    <div class="fxt-form">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="form-group">
                                <div class="fxt-transformY-50 fxt-transition-delay-1">
                                    <input type="text" id="name" class="form-control" name="name" placeholder="Name" required value="{{ old('name') }}">
                                    @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="fxt-transformY-50 fxt-transition-delay-1">
                                    <input type="email" id="email" class="form-control" name="email" placeholder="Email" required value="{{ old('email') }}">
                                    @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="fxt-transformY-50 fxt-transition-delay-2">
                                    <input id="password" type="password" class="form-control" name="password" placeholder="***" required>
                                    <i toggle="#password" class="fa fa-fw fa-eye toggle-password field-icon"></i>
                                    @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="fxt-transformY-50 fxt-transition-delay-2">
                                    <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="fxt-transformY-50 fxt-transition-delay-1">
                                    <input type="number" id="so_dien_thoai" class="form-control" name="so_dien_thoai" placeholder="Số điện thoại" required value="{{ old('so_dien_thoai') }}" min="0" pattern="[0-9]{10}">
                                    @error('so_dien_thoai')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                    </div>
                    <div class="form-group">
                        <div class="fxt-transformY-50 fxt-transition-delay-3">
                            <div class="fxt-checkbox-area">
                                <div class="checkbox">
                                    <input id="checkbox1" type="checkbox" name="remember">
                                    <label for="checkbox1">Giữ tôi luôn đăng nhập</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="fxt-transformY-50 fxt-transition-delay-4">
                            <button type="submit" class="fxt-btn-fill">Đăng kí</button>
                        </div>
                    </div>
                    </form>
                </div>
                <div class="fxt-footer">
                    <div class="fxt-transformY-50 fxt-transition-delay-9">
                        <p> Đã có tài khoản? <a href="{{ route('login') }}" class="switcher-text2 inline-text"> Đăng nhập</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
@endsection