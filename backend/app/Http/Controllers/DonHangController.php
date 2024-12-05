<?php

namespace App\Http\Controllers;

use App\Http\Requests\ThemMoiDiaChiNhanHang;
use App\Mail\XacNhanDonHang;
use App\Models\ChiTietDonHang;
use App\Models\DiaChi;
use App\Models\DonHang;
use App\Models\SanPham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class DonHangController extends Controller
{

    public function thanhToanVNP(Request $request)
    {
        $customer = Auth::guard('sanctum')->user();
        $address = DiaChi::orderBy('id', 'desc')->where('id_khach_hang', $customer->id)->first();

        if (!$address) {
            return response()->json([
                'status' => false,
                'message' => "Vui lòng gửi địa chỉ"
            ]);
        }

        if (count($request->ds_mua_sp) < 1) {
            return response()->json([
                'status' => false,
                'message' => "Hãy chọn ít nhất một sản phẩm trước khi mua"
            ]);
        }

        $paymentOption = $request->input('chon_thanh_toan');
        $order = DonHang::create([
            'ma_don_hang' => "",
            'tong_tien_thanh_toan' => 0,
            'is_thanh_toan' => 0,
            'tinh_trang_don_hang' => 0,
            'ten_nguoi_nhan' => $address->ten_nguoi_nhan,
            'so_dien_thoai' => $address->so_dien_thoai,
            'dia_chi_giao_hang' => $address->dia_chi,
            'so_luong' => 0,
            'is_giao_kho' => 0,
            'id_khach_hang' => $customer->id
        ]);

        $orderID = "HDBH" . (20022003 + $order->id);
        $total = 0;
        $quantity = 0;

        foreach ($request->ds_mua_sp as $item) {
            $total += $item['thanh_tien'];
            $quantity += $item['so_luong'];
            ChiTietDonHang::where('id', $item['id'])->update(['id_hoa_don' => $order->id]);
        }

        $order->ma_don_hang = $orderID;
        $order->tong_tien_thanh_toan = $total;
        $order->so_luong = $quantity;
        $order->save();
        $address->delete();

        if ($paymentOption == 0) {
            $link = "https://api.vietqr.io/image/970422-000026029999-cqf7OD8.jpg?accountName=LE%20QUANG%20VIEN&amount=" . $total . "&addInfo=" . $orderID;

            $data_1['ten_nguoi_nhan'] = $address->ten_nguoi_nhan;
            $data_1['so_dien_thoai_nhan'] = $address->so_dien_thoai;
            $data_1['dia_chi_nhan_hang'] = $address->dia_chi;
            $data_1['tong_tien_thanh_toan'] = $total;
            $data_1['link_qr_code'] = $link;
            $data_2     = $request->ds_mua_sp;

            Mail::to($customer->email)->send(new XacNhanDonHang($data_1, $data_2));

            return response()->json([
                'status' => true,
                'message' => "Vui lòng vào email để thanh toán"
            ]);
        } else {
            return response()->json([
                'status' => true,
                'message' => "Đặt đơn hàng thành công"
            ]);
        }
    }


    public function donHangProfile(Request $request)
    {
        $khach_hang = Auth::guard('sanctum')->user();
        $donhang = DonHang::where('id_khach_hang', $khach_hang->id)->get();
        return response()->json([
            'data'      => $donhang
        ]);
    }


    public function destroys(Request $request)
    {
        $order = DonHang::where('id', $request->id)->first();
        if ($order) {
            $order->delete();
            return response([
                'status'  => true,
                'message' => 'Đã Xóa Thành Công',
            ]);
            $order->save();
        } else {
            return response([
                'status'  => false,
                'message' => 'Xóa Thất Bại',
            ]);
        }
    }

    public function deleteProfile(Request $request)
    {
        $user = Auth::guard('sanctum')->user();
        $products = DonHang::where('id', $request->id)->where('id_khach_hang', $user->id)->first();
        if ($products) {
            $products->delete();
            return response([
                'status'  => true,
                'message' => 'Đã Xóa Thành Công',
            ]);
            $products->save();
        } else {
            return response([
                'status'  => false,
                'message' => 'Xóa Thất Bại',
            ]);
        }
    }
}
