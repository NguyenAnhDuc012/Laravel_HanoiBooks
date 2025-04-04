<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TheLoai;
use App\Models\TacGia;
use App\Models\NhaXuatBan;
use App\Models\SanPham;

class SachController extends Controller
{
    public function index(Request $request)
    {
        $sachs = SanPham::with(['theLoai', 'tacGia', 'nhaXuatBan'])->paginate(10);

        return view('admin.sachs.index', compact('sachs'));
    }

    public function create()
    {
        $theLoai = TheLoai::all();
        $tacGia = TacGia::all();
        $nhaXuatBan = NhaXuatBan::all();
        return view('admin.sachs.create', compact('theLoai', 'tacGia', 'nhaXuatBan'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'ten_san_pham' => 'required|string|max:255',
            'ma_the_loai' => 'required|exists:the_loai,MaTheLoai',
            'ma_tac_gia' => 'required|exists:tac_gia,MaTacGia',
            'ma_nha_xuat_ban' => 'required|exists:nha_xuat_ban,MaNhaXuatBan',
            'gia_ban' => 'required|numeric|min:0',
            'ton_kho' => 'required|integer|min:0',
            'mo_ta' => 'nullable|string',
            'ngay_xuat_ban' => 'required|date',
            'hinh_anh' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ], [
            'ten_san_pham.required' => 'Vui lòng nhập tên sách.',
            'gia_ban.required' => 'Vui lòng nhập giá bán.',
            'ton_kho.required' => 'Vui lòng nhập số lượng tồn kho.',
            'ngay_xuat_ban.required' => 'Vui lòng chọn ngày xuất bản.',
        ]);

        $imagePath = null;
        if ($request->hasFile('hinh_anh')) {
            $imageName = time() . '.' . $request->hinh_anh->extension();

            $request->hinh_anh->move(public_path('images'), $imageName);

            $imagePath = $imageName;
        }


        SanPham::create([
            'MaTheLoai' => $validatedData['ma_the_loai'],
            'MaTacGia' => $validatedData['ma_tac_gia'],
            'MaNhaXuatBan' => $validatedData['ma_nha_xuat_ban'],
            'TenSanPham' => $validatedData['ten_san_pham'],
            'GiaBan' => $validatedData['gia_ban'],
            'TonKho' => $validatedData['ton_kho'],
            'MoTa' => $validatedData['mo_ta'],
            'NgayXuatBan' => $validatedData['ngay_xuat_ban'],
            'HinhAnh' => $imagePath,
        ]);

        return redirect()->route('admin.sachs.index')->with('success', 'Thêm sách thành công!');
    }

    public function edit($id)
    {
        $sach = SanPham::findOrFail($id);
        $theLoai = TheLoai::all();
        $tacGia = TacGia::all();
        $nhaXuatBan = NhaXuatBan::all();

        return view('admin.sachs.edit', compact('sach', 'theLoai', 'tacGia', 'nhaXuatBan'));
    }


    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'ten_san_pham' => 'required|string|max:255',
            'ma_the_loai' => 'required|exists:the_loai,MaTheLoai',
            'ma_tac_gia' => 'required|exists:tac_gia,MaTacGia',
            'ma_nha_xuat_ban' => 'required|exists:nha_xuat_ban,MaNhaXuatBan',
            'gia_ban' => 'required|numeric|min:0',
            'ton_kho' => 'required|integer|min:0',
            'mo_ta' => 'nullable|string',
            'ngay_xuat_ban' => 'required|date',
            'hinh_anh' => '',
        ]);

        $sach = SanPham::findOrFail($id);

        if ($request->hasFile('hinh_anh')) {
            if ($sach->HinhAnh && file_exists(public_path('images/' . $sach->HinhAnh))) {
                unlink(public_path('images/' . $sach->HinhAnh));
            }

            $imageName = time() . '.' . $request->hinh_anh->extension();
            $request->hinh_anh->move(public_path('images'), $imageName);

            $validatedData['hinh_anh'] = $imageName;
        } else {
            $validatedData['hinh_anh'] = $sach->HinhAnh;
        }

        $sach->update([
            'MaTheLoai' => $validatedData['ma_the_loai'],
            'MaTacGia' => $validatedData['ma_tac_gia'],
            'MaNhaXuatBan' => $validatedData['ma_nha_xuat_ban'],
            'TenSanPham' => $validatedData['ten_san_pham'],
            'GiaBan' => $validatedData['gia_ban'],
            'TonKho' => $validatedData['ton_kho'],
            'MoTa' => $validatedData['mo_ta'],
            'NgayXuatBan' => $validatedData['ngay_xuat_ban'],
            'HinhAnh' => $validatedData['hinh_anh'] ?? $sach->HinhAnh,
        ]);

        return redirect()->route('admin.sachs.index')->with('success', 'Cập nhật sách thành công!');
    }


    public function destroy($id)
    {
        $sanPham = SanPham::findOrFail($id);

        if ($sanPham->HinhAnh && file_exists(public_path('images/' . $sanPham->HinhAnh))) {
            unlink(public_path('images/' . $sanPham->HinhAnh));
        }

        $sanPham->delete();

        return redirect()->route('admin.sachs.index')->with('success', 'Xóa sách thành công!');
    }
}
