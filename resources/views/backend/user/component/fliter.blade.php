<div class="filter">
    <div class="perpage">
        <div class="uk-flex uk-flex-middle uk-flex-space-between">
            <select name="perpage" id="" class="form-control input-sm perpage filter mr16">
                @for ($i = 20; $i <= 200; $i += 20)
                    <option value="{{ $i }}">bản ghi</option>
                @endfor
            </select>
            <div class="action">
                <div class="uk-flex ul-flex-middle">
                    <form action="{{ route('user.index') }}" method="get" class="form-inline mb-3"
                        id="attribute-filter-form">
                        <select name="role_id" class="form-control mr-2" style="width: 200px;"
                            onchange="document.getElementById('attribute-filter-form').submit();">
                            <option value="0">-- Chọn nhóm thành viên --</option>
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}"
                                    {{ request('role_id') == $role->id ? 'selected' : '' }}>
                                    {{ $role->display_name ?? $role->name }}
                                </option>
                            @endforeach
                        </select>

                        <input type="text" name="keyword" value="{{ request('keyword') }}"
                            placeholder="Nhập từ khóa bạn muốn tìm kiếm..." class="form-control mr-2">

                        <button type="submit" name="search" value="search" class="btn btn-primary">Tìm kiếm</button>
                    </form>

                    <a href="{{ route('auth.register') }}" class="btn btn-danger"><i class="fa fa-plus mr5"></i>Thêm mới
                        thành
                        viên</a>
                </div>
            </div>
        </div>
    </div>
</div>
