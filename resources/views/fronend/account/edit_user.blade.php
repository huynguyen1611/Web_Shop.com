@extends('fronend.main')
@section('content')
    <div class="container1 ">
        <h2 class="main-h2">Chỉnh sửa thông tin cá nhân</h2>
        {{-- <form method="POST" action="{{ route('update_user') }}">
        @csrf --}}
        <div class="register row-flex">
            <div class="register-left">
                <h2 class="main-h2">Thông tin mật khẩu</h2>
                <div class="password">
                    <label for="">Mật khẩu <span style="color: red">*</span></label>
                    <input type="password" name="password" value="" placeholder="Mật khẩu...">
                </div>
                <div class="password-change">
                    <label for="">Nhập lại mật khẩu <span style="color: red">*</span></label>
                    <input type="password" name="password_confirmation" value="" placeholder="Nhập lại mật khẩu...">
                </div>
            </div>
            <div class="cart-section-right">
                <h2 class="main-h2">Thông tin khách hàng</h2>
                <div class="cart-section-right-input-name-phone">
                    <input type="text" placeholder="Tên" name="name" id="" value="" />
                    {{-- @error('name')
                    <div style="color: red; font-size: 12px;">{{ $message }}</div>
                @enderror --}}
                    <input type="text" placeholder="Điện thoại" name="phone" id="" value="" />
                    {{-- @error('phone')
                    <div style="color: red; font-size: 12px;">{{ $message }}</div>
                @enderror --}}
                </div>
                <div class="cart-section-right-input-email">
                    <input type="email" placeholder="Email" name="email" id="" value="" />
                    {{-- @error('email')
                    <div style="color: red; font-size: 12px;">{{ $message }}</div>
                @enderror --}}
                </div>
                <div class="cart-section-right-select">
                    <select name="city" id="city" value="">
                        <option value="">Tỉnh/Tp</option>
                    </select>
                    {{-- @error('city')
                    <div style="color: red; font-size: 12px;">{{ $message }}</div>
                @enderror --}}
                    <select name="district" id="district" value="">
                        <option value="">Quận/Huyện</option>
                    </select>
                    {{-- @error('district')
                    <div style="color: red; font-size: 12px;">{{ $message }}</div>
                @enderror --}}
                    <select name="ward" id="ward" value="">
                        <option value="">Phường/Xã</option>
                    </select>
                    {{-- @error('ward')
                    <div style="color: red; font-size: 12px;">{{ $message }}</div>
                @enderror --}}
                </div>
                <div class="cart-section-right-input-adress">
                    <textarea name="address" id="" cols="30" rows="10" placeholder="Địa chỉ"></textarea>
                    {{-- @error('address')
                    <div style="color: red; font-size: 12px;">{{ $message }}</div>
                @enderror --}}
                </div>
            </div>
        </div>
        <button type="submit" class="main-btn button">Lưu thay đổi</button>
        {{-- </form> --}}
        {{-- <div class="logout-wrapper">
        <form method="POST" action="{{ route('logout_user') }}">
            @csrf
            <button type="submit">Đăng xuất</button>
        </form>
    </div> --}}
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
    <script src="{{ asset('backend/js/apiprovince.js') }}"></script>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const toggle = document.getElementById("togglePassword");
            const password = document.getElementById("password");

            if (toggle && password) {
                toggle.addEventListener("click", () => {
                    const isPassword = password.type === "password";
                    password.type = isPassword ? "text" : "password";
                    toggle.className = isPassword ?
                        "ri-eye-line toggle-password" :
                        "ri-eye-close-line toggle-password";
                });
            }
        });
    </script>
    {{-- <script>
    window.customerData = {
        city: {!! json_encode($customer->city ?? '') !!},
        district: {!! json_encode($customer->district ?? '') !!},
        ward: {!! json_encode($customer->ward ?? '') !!}
    };
</script> --}}
@endsection
