<?php

namespace App\Http\Controllers;

use App\Models\ChiTietDonHang;
use App\Models\SanPham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Input\Input;

class ChiTietDonHangController extends Controller
{


    public function themVaoGioHang(Request $request)
    {
        $customer  = Auth::guard('sanctum')->user();
        $product  = SanPham::find($request->id_san_pham);

        if (!$product) {
            return response()->json([
                'status' => false,
                'message' => "Sản phẩm không tồn tại!"
            ]);
        }
        $quantityToBuy = $request->input('quantily');
        if ($product->so_luong < $quantityToBuy) {
            return response()->json([
                'status' => false,
                'message' => "Số lượng bạn nhập vượt quá trong kho!"
            ]);
        }
        $price = ($product->gia_khuyen_mai > 0) ? $product->gia_khuyen_mai : $product->gia_ban;
        $orderDetail = ChiTietDonHang::where('id_khach_hang', $customer->id)
            ->where('id_san_pham', $product->id)
            ->whereNull('id_hoa_don')
            ->first();
        if ($orderDetail) {
            $orderDetail->so_luong += 1;
            $orderDetail->thanh_tien = $orderDetail->so_luong * $price;
            $orderDetail->save();
        } else {
            ChiTietDonHang::create([
                'id_khach_hang' => $customer->id,
                'id_san_pham' => $product->id,
                'don_gia' => $price,
                'thanh_tien' => $price * $$quantityToBuy,
                'so_luong' => $quantityToBuy,
            ]);
        }
        return response()->json([
            'status' => true,
            'message' => "Sản phẩm đã được thêm vào giỏ hàng thành công!"
        ]);
    }


    public function deleteThanhToan(Request $request)
    {
        $user = Auth::guard('sanctum')->user();
        $giohang = ChiTietDonHang::where('id', $request->id)->where('id_khach_hang', $user->id)->first();
        if ($giohang) {
            $giohang->delete();
            return response()->json([
                'status' => true,
                'message' => "Sản phẩm đã được xóa khỏi vào giỏ hàng thành công!"
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => "Có lỗi xảy ra!"
            ]);
        }
    }

    public function store()
    {
        $customer  = Auth::guard('sanctum')->user();
        $data = ChiTietDonHang::where('id_khach_hang', $customer->id)
            ->join('san_phams', 'san_phams.id', 'chi_tiet_don_hangs.id_san_pham')
            ->select('san_phams.hinh_anh', 'san_phams.ten_san_pham', 'chi_tiet_don_hangs.*')
            ->whereNull('id_hoa_don')->get();
        return response()->json([
            'data' => $data
        ]);
    }

    public function destroy(Request $request)
    {
        $customer  = Auth::guard('sanctum')->user();
        $giohang = ChiTietDonHang::where('id', $request->id)->where('id_khach_hang', $customer->id)->first();
        if ($giohang) {
            $giohang->delete();
            return response()->json([
                'status' => true,
                'message' => "Sản phẩm đã được xóa khỏi vào giỏ hàng thành công!"
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => "Có lỗi xảy ra!"
            ]);
        }
    }


    public function update(Request $request)
    {
        $customer  = Auth::guard('sanctum')->user();
        $giohang = ChiTietDonHang::where('id', $request->id)->where('id_khach_hang', $customer->id)->first();
        if ($giohang) {
            $giohang->so_luong     = $request->so_luong;
            $giohang->size         = $request->size;
            $giohang->thanh_tien   = $request->so_luong * $giohang->don_gia;
            $giohang->ghi_chu      = $request->ghi_chu;
            $giohang->save();
            return response()->json([
                'status' => true,
                'message' => "Đã cập nhật giỏ hàng thành công!"
            ]);
        } else {
            return response()->json([
                'status' => true,
                'message' => "Đã cập nhật giỏ hàng thành công!"
            ]);
        }
    }


    public function giohang(Request $request)
    {
        $user = Auth::guard('sanctum')->user();
        $data = ChiTietDonHang::where('id_khach_hang', $user->id)->where('is_gio_hang', 1)
            ->join('san_phams', 'san_phams.id', 'chi_tiet_don_hangs.id_san_pham')
            ->select('san_phams.hinh_anh', 'san_phams.ten_san_pham', 'chi_tiet_don_hangs.*')
            ->whereNull('id_hoa_don')->get();
        return response()->json([
            'data'   => $data
        ]);
    }


    public function listChon(Request $request)
    {
        $khach_hang = Auth::guard('sanctum')->user();
        $check = ChiTietDonHang::where('id_khach_hang', $khach_hang->id)->get();
        if ($check) {
            if (count($request->ds_mua_sp) < 1) {
                return response()->json([
                    'status' => false,
                    'message' => "Bạn chưa chọn sản phẩm nào hết!"
                ]);
            } else {
                foreach ($request->ds_mua_sp as $key => $value) {
                    ChiTietDonHang::where('id', $value['id'])->update([
                        'is_gio_hang'    => 1,
                    ]);
                };
                return response()->json([
                    'status' => true,
                    'message' => "Trang Thanh Toán"
                ]);
            }
        }
    }
}
