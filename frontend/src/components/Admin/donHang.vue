<template>
    <div class="row">
        <div class="card">
            <div class="card-header">
                Danh Sách Đơn Hàng
            </div>
            <div class="card-body">
                <div class="table">
                    <table class="table table-bordered">
                        <thead>
                            <tr class="text-center">
                                <th>#</th>
                                <th>Mã Đơn Hàng</th>
                                <th>Tên Người Nhận</th>
                                <th>Số Điện Thoại</th>
                                <th>Địa Chỉ</th>
                                <th>Tổng Tiền Thanh Toán</th>
                                <th>Thanh Toán</th>
                                <th>Tình Trạng Đơn Hàng</th>
                                <th>Xóa</th>
                            </tr>
                        </thead>
                        <tbody>
                            <template v-for="(value, index) in list_ProductOrderUser" :key="index">
                                <tr class="align-middle">
                                    <th>{{ index + 1 }}</th>
                                    <td class="text-center">{{ value.ma_don_hang }}</td>
                                    <td>{{ value.ten_nguoi_nhan }}</td>
                                    <td class="text-center">{{ value.so_dien_thoai }}</td>
                                    <td>{{ value.dia_chi_giao_hang }}</td>
                                    <td class="text-end">{{ value.tong_tien_thanh_toan }}</td>
                                    <td class="text-center">
                                        <button v-on:click="changeTinhTrangThanhToan(value)"
                                            v-if="value.is_thanh_toan == 0" class="btn btn-danger">Chưa Thanh
                                            Toán</button>
                                        <button v-on:click="changeTinhTrangThanhToan(value)" v-else
                                            class="btn btn-success">Đã Thanh Toán</button>
                                    </td>
                                    <td class="text-center">
                                        <button v-on:click="changeTrangThaiDonHang(value)"
                                            v-if="value.tinh_trang_don_hang == 0" class="btn btn-danger">Chưa
                                            Giao</button>
                                        <button v-on:click="changeTrangThaiDonHang(value)" v-else
                                            class="btn btn-success">Đã Giao</button>
                                    </td>
                                    <td class="text-center">
                                        <button v-on:click="deleteOrder(value)" class="btn btn-primary"
                                            data-bs-toggle="modal" data-bs-target="#chiTietModal">Xóa Đơn Hàng</button>
                                    </td>
                                </tr>
                            </template>
                        </tbody>
                    </table>
                </div>
                <!-- <div class="modal fade" id="chiTietModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Chi Tiết Đơn Hàng</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr class="text-center">
                                                <th>#</th>
                                                <th>Tên Sản Phẩm</th>
                                                <th>Đại Lý</th>
                                                <th>Số Lượng</th>
                                                <th>Đơn Giá</th>
                                                <th>Thành Tiền</th>
                                                <th>Ghi Chú</th>
                                                <th>Tình Trạng Giao Kho</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="align-middle">
                                                <th></th>
                                                <td class="text-wrap"></td>
                                                <td class="text-center"></td>
                                                <td class="text-center"></td>
                                                <td class="text-end"></td>
                                                <td class="text-end"></td>
                                                <td class="text-center text-wrap"></td>
                                                <td class="text-center">
                                                    <button class="btn btn-danger">Chưa Giao Kho</button>
                                                    <button class="btn btn-success">Đã Giao Kho</button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
</template>
<script>
import baserequest from '../../core/baseRequest';
import { createToaster } from "@meforma/vue-toaster";
const toaster = createToaster({ position: "top-right" });
export default {
    data() {
        return {
            list_ProductOrderUser: [],
        }
    },
    mounted() {
        this.callListProductOrderUser();
    },
    methods: {
        callListProductOrderUser() {
            baserequest
                .get('admin/thong-tin-don-hang/khach-hang')
                .then((res) => {
                    this.list_ProductOrderUser = res.data.data
                })
        },

        changeTrangThaiDonHang(value) {
            baserequest
                .post('admin/change-tinh-trang-don-hang/changeTrangThaiDonHang', value)
                .then((res) => {
                    if (res.data.status) {
                        toaster.success('Thông Báo<br>' + res.data.message)
                        this.callListProductOrderUser()
                    } else {
                        toaster.error('Thông Báo<br>' + res.data.message)
                    }
                })
        },

        changeTinhTrangThanhToan(value) {
            baserequest
                .post('admin/change-tinh-trang-thanh-toan/changeTinhTrangDonHang', value)
                .then((res) => {
                    if (res.data.status) {
                        toaster.success('Thông Báo<br>' + res.data.message)
                        this.callListProductOrderUser()
                    } else {
                        toaster.error('Thông Báo<br>' + res.data.message)
                    }
                })
        },

        deleteOrder(value) {
            baserequest
                .post('xoa-don-hang/admin', value)
                .then((res) => {
                    if (res.data.status) {
                        toaster.success('Thông Báo<br>' + res.data.message)
                        this.callListProductOrderUser();
                    } else {
                        toaster.error('Thông Báo<br>' + res.data.message)
                    }
                })
        }
    },
}
</script>
<style></style>