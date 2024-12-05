<?php

namespace App\Http\Controllers;

use App\Models\ChiTietDonHang;
use App\Models\SanPham;
use Illuminate\Http\Request;

class CapNhatSanPhamController extends Controller
{

    public function updateKho(Request $request)
    {
        $sanPham = SanPham::where('id', $request->id)->first();

        if ($sanPham) {
            $chi_tiet_don_hang = ChiTietDonHang::where('id_san_pham', $sanPham->id)->where('is_gio_hang', 1)->get();

            if ($chi_tiet_don_hang->isNotEmpty()) {
                $so_luong_moi = $sanPham->so_luong;

                foreach ($chi_tiet_don_hang as $item) {
                    $so_luong_moi -= $item->so_luong;
                }

                // Cập nhật số lượng mới vào sản phẩm
                $update = $sanPham->so_luong = $so_luong_moi;
                // $sanPham->save();
            }
            $sanPham->update([
                'so_luong' => $update
            ]);
            $sanPham->save();
        }
    }
}
