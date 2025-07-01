<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element"> <span>
                        <img alt="image" class="img-circle" src="{{ asset('backend/img/profile_small.jpg') }}" />
                    </span>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">David
                                    Williams</strong>
                            </span> <span class="text-muted text-xs block">Art Director <b class="caret"></b></span>
                        </span> </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a href="profile.html">Profile</a></li>
                        <li><a href="contacts.html">Contacts</a></li>
                        <li><a href="mailbox.html">Mailbox</a></li>
                        <li class="divider"></li>
                        <li><a href="{{ route('auth.logout') }}">Logout</a></li>
                    </ul>
                </div>
                <div class="logo-element">
                    IN+
                </div>
            </li>
            <li class="">
                <a href="#"><i class="fa fa-user-circle"></i><span class="nav-label">QL Thành viên</span>
                    <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="{{ route('roles.index') }}">QL Nhóm thành viên</a></li>
                    <li><a href="{{ route('user.index') }}">QL Thành viên</a></li>
                </ul>
            </li>
            <li class="">
                <a href="#"><i class="fa fa-suitcase"></i> <span class="nav-label">QL Sản phẩm</span>
                    <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="{{ route('list_category') }}">Nhóm sản phẩm</a></li>
                    <li><a href="{{ route('list_product') }}">Sản phẩm</a></li>
                    <li><a href="{{ route('list_attribute') }}">Loại thuộc tính </a></li>
                    <li><a href="{{ route('attribute') }}">Thuộc tính </a></li>
                </ul>
            </li>
            <li class="">
                <a href="#"><i class="fa fa-calendar"></i> <span class="nav-label">QL Đơn hàng</span>
                    <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="/admin">Danh sách đơn hàng</a></li>
                </ul>
            </li>
            <li class="">
                <a href="#"><i class="fa fa-user-o" aria-hidden="true"></i><span class="nav-label">QL Khách
                        hàng</span>
                    <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="/admin">Nhóm khách hàng</a></li>
                    <li><a href="/admin">Khách hàng</a></li>
                </ul>
            </li>
            <li class="">
                <a href="#"><i class="fa fa-user-o" aria-hidden="true"></i><span class="nav-label">QL
                        Voucher</span>
                    <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="{{ route('voucher') }}">Danh sách voucher</a></li>
                </ul>
            </li>
            <li class="">
                <a href="#"><i class="fa fa-th-large"></i> <span class="nav-label">QL Marketing</span>
                    <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="/admin">Khuyến mãi</a></li>
                    <li><a href="/admin">Nguồn khách</a></li>
                </ul>
            </li>
            <li class="">
                <a href="#"><i class="fa fa-th-large"></i> <span class="nav-label">QL Bài viết</span>
                    <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="/admin">Nhóm bài viết</a></li>
                    <li><a href="/admin">Bài viết</a></li>
                </ul>
            </li>
            <li class="">
                <a href="#"><i class="fa fa-commenting"></i> <span class="nav-label">QL Bình luận</span>
                    <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="/admin">Nhóm bình luận</a></li>
                    <li><a href="/admin">Bình luận</a></li>
                </ul>
            </li>
            <li class="">
                <a href="#"><i class="fa fa-th-large"></i> <span class="nav-label">QL Banner & Slide</span>
                    <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="/admin">Cài đặt slide</a></li>
                </ul>
            </li>
            <li class="">
                <a href="#"><i class="fa fa-calendar-minus-o"></i> <span class="nav-label">QL Menu</span>
                    <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="/admin">Cài đặt menu</a></li>
                </ul>
            </li>
            <li class="">
                <a href="#"><i class="fa fa-cogs"></i> <span class="nav-label">Cấu hình chung</span>
                    <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="/admin">QL Ngôn ngũ</a></li>
                    <li><a href="/admin">Cấu hình hệ thống</a></li>
                    <li><a href="/admin">Widget</a></li>
                </ul>
            </li>
        </ul>
    </div>
</nav>
<script>
    $(document).ready(function() {
        // Khởi tạo metisMenu với toggle: true
        $('#side-menu').metisMenu({
            toggle: true
        });

        // Lấy URL hiện tại
        var currentUrl = window.location.href;

        // Duyệt qua từng link trong menu
        $('#side-menu a').each(function() {
            if (this.href === currentUrl) {
                // Thêm active vào li con
                $(this).parent('li').addClass('active');
                // Mở ul cha
                $(this).closest('ul.nav-second-level')
                    .addClass('in')
                    .parent('li')
                    .addClass('active'); // active luôn menu cha
            }
        });
    });
</script>
