@extends('admin.layouts.app')

@section('navbar')
<div class="navbar-nav pl-2">
    <ol class="breadcrumb p-0 m-0 bg-white">
        <li class="breadcrumb-item"><a href="{{ route('admin.sachs.index') }}">Sách</a></li>
        <li class="breadcrumb-item active">Thêm Sách</li>
    </ol>
</div>
@endsection

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid my-2">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Thêm Sách</h1>
            </div>
            <div class="col-sm-6 text-right">
                <a href="{{ route('admin.sachs.index') }}" class="btn btn-primary">Quay lại</a>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>
<!-- Main content -->
<section class="content">
    <!-- Default box -->
    <div class="container-fluid">

        <form action="{{ route('admin.sachs.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="ten_san_pham">Tên sách</label>
                                <input type="text" name="ten_san_pham" id="ten_san_pham" class="form-control" placeholder="Tên sách" value="{{ old('ten_san_pham') }}">
                                @error('ten_san_pham')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="gia_ban">Giá bán</label>
                                <input type="number" name="gia_ban" id="gia_ban" class="form-control" placeholder="Giá bán" value="{{ old('gia_ban') }}">
                                @error('gia_ban')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="ton_kho">Tồn kho</label>
                                <input type="number" name="ton_kho" id="ton_kho" class="form-control" placeholder="Số lượng tồn kho" value="{{ old('ton_kho') }}">
                                @error('ton_kho')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="mo_ta">Mô tả</label>
                                <textarea name="mo_ta" id="mo_ta" class="form-control" placeholder="Mô tả sách">{{ old('mo_ta') }}</textarea>
                                @error('mo_ta')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="ngay_xuat_ban">Ngày xuất bản</label>
                                <input type="date" name="ngay_xuat_ban" id="ngay_xuat_ban" class="form-control" value="{{ old('ngay_xuat_ban') }}">
                                @error('ngay_xuat_ban')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="hinh_anh">Hình ảnh</label>
                                <input type="file" name="hinh_anh" id="hinh_anh" class="form-control">
                                @error('hinh_anh')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="ma_the_loai">Thể loại</label>
                                <select name="ma_the_loai" id="ma_the_loai" class="form-control">
                                    @foreach ($theLoai as $loai)
                                    <option value="{{ $loai->MaTheLoai }}" {{ old('ma_the_loai') == $loai->MaTheLoai ? 'selected' : '' }}>{{ $loai->TenTheLoai }}</option>
                                    @endforeach
                                </select>
                                @error('ma_the_loai')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="ma_tac_gia">Tác giả</label>
                                <select name="ma_tac_gia" id="ma_tac_gia" class="form-control">
                                    @foreach ($tacGia as $tacGia)
                                    <option value="{{ $tacGia->MaTacGia }}" {{ old('ma_tac_gia') == $tacGia->MaTacGia ? 'selected' : '' }}>{{ $tacGia->TenTacGia }}</option>
                                    @endforeach
                                </select>
                                @error('ma_tac_gia')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="ma_nha_xuat_ban">Nhà xuất bản</label>
                                <select name="ma_nha_xuat_ban" id="ma_nha_xuat_ban" class="form-control">
                                    @foreach ($nhaXuatBan as $nhaXuatBan)
                                    <option value="{{ $nhaXuatBan->MaNhaXuatBan }}" {{ old('ma_nha_xuat_ban') == $nhaXuatBan->MaNhaXuatBan ? 'selected' : '' }}>{{ $nhaXuatBan->TenNhaXuatBan }}</option>
                                    @endforeach
                                </select>
                                @error('ma_nha_xuat_ban')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="pb-5 pt-3">
                <button class="btn btn-primary">Thêm</button>
                <a href="{{ route('admin.sachs.index') }}" class="btn btn-outline-dark ml-3">Hủy</a>
            </div>
        </form>
    </div>
    <!-- /.card -->
</section>
<!-- /.content -->

@endsection