@extends('admin.layouts.app')

@section('navbar')
<div class="navbar-nav pl-2">
    <ol class="breadcrumb p-0 m-0 bg-white">
        <li class="breadcrumb-item"><a href="{{ route('admin.sachs.index') }}">Sách</a></li>
        <li class="breadcrumb-item active">Danh sách</li>
    </ol>
</div>
@endsection

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid my-2">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Sách</h1>
            </div>
            <div class="col-sm-6 text-right">
                <a href="{{ route('admin.sachs.create') }}" class="btn btn-primary">Thêm Sách</a>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>
<!-- Main content -->
<section class="content">
    <!-- Default box -->
    <div class="container-fluid">
        <div class="card">
            <div class="card-body table-responsive p-0">
                @if(session('success'))
                <div class="alert alert-success mt-3">
                    {{ session('success') }}
                </div>
                @endif

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Mã Sản Phẩm</th>
                            <th>Hình ảnh</th>
                            <th>Tên Sản Phẩm</th>
                            <th>Thể Loại</th>
                            <th>Tác Giả</th>
                            <th>Nhà Xuất Bản</th>
                            <th>Giá Bán</th>
                            <th>Tồn Kho</th>
                            <th>Hành Động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($sachs as $sach)
                        <tr>
                            <td>{{ $sach->MaSanPham }}</td>
                            <td>
                                @if($sach->HinhAnh)
                                <img src="{{ asset('images/' . $sach->HinhAnh) }}" width="50" height="50">
                                @else
                                <span>Không có ảnh</span>
                                @endif
                            </td>
                            <td>{{ $sach->TenSanPham }}</td>
                            <td>{{ $sach->theLoai->TenTheLoai ?? 'N/A' }}</td>
                            <td>{{ $sach->tacGia->TenTacGia ?? 'N/A' }}</td>
                            <td>{{ $sach->nhaXuatBan->TenNhaXuatBan ?? 'N/A' }}</td>
                            <td>{{ number_format($sach->GiaBan, 0, ',', '.') }} VNĐ</td>
                            <td>{{ $sach->TonKho }}</td>
                            <td>
                                <a href="{{ route('admin.sachs.edit', $sach->MaSanPham) }}" class="edit"><i class="material-icons">&#xE254;</i></a>
                                <a href="#deleteSachModal" data-id="{{ $sach->MaSanPham }}" class="delete" data-toggle="modal"><i class="material-icons text-danger" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer clearfix">
                {{ $sachs->links() }}
            </div>
        </div>
    </div>
    <!-- /.card -->
</section>
<!-- /.content -->

<!-- Delete Modal HTML -->
<div id="deleteSachModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="deleteSachForm" method="post">
                @csrf
                @method('DELETE')
                <div class="modal-header">
                    <h4 class="modal-title">Xóa Sách</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <p>Bạn muốn xóa Sách này ?</p>
                    <p class="text-warning"><small>Hành động này không thể thu hồi!</small></p>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Hủy">
                    <input type="submit" class="btn btn-danger" value="Xóa">
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('.delete').on('click', function() {
            var sachId = $(this).data('id');
            var actionUrl = "{{ route('admin.sachs.destroy', ':id') }}";
            actionUrl = actionUrl.replace(':id', sachId);
            $('#deleteSachForm').attr('action', actionUrl);
        });
    });
</script>

@endsection