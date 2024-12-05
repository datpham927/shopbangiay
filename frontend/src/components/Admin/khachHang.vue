<template>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered mb-0">
                        <thead>
                            <tr class="text-center">
                                <th>#</th>
                                <th>Họ Và Tên</th>
                                <th>Email</th>
                                <th>Số Điện Thoại</th>
                                <th>Trạng Thái</th>
                                <th>Kích Hoạt</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <template v-for="(value, index) in list_don_hang" :key="index">
                                <tr class="align-middle">
                                    <th class="text-center">{{ index + 1 }}</th>
                                    <td>{{ value.ho_va_ten }}</td>
                                    <td>{{ value.email }}</td>
                                    <td class="text-center">{{ value.so_dien_thoai }}</td>
                                    <td class="text-center">
                                        <button v-if="value.is_block" class="btn btn-success me-1">
                                            Hoạt Động
                                        </button>
                                        <button v-else class="btn btn-danger me-1">
                                            Tạm Tắt
                                        </button>
                                    </td>
                                    <td class="text-center">
                                        <button v-on:click="changeTrangThaiKhachHang(value)" v-if="value.is_active == 0"
                                            class="btn btn-warning me-1">
                                            Chưa Kích Hoạt
                                        </button>
                                        <button v-on:click="changeTrangThaiKhachHang(value)" v-else
                                            class="btn btn-primary me-1">
                                            Đã Kích Hoạt
                                        </button>
                                    </td>
                                    <td class="text-center">
                                        <button class="btn btn-primary me-1" data-bs-toggle="dropdown">Cập Nhật</button>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">
                                            <a v-on:click="Object.assign(update_user, value)" class="dropdown-item"
                                                data-bs-toggle="modal" data-bs-target="#capNhatKhachhangModal">Cập Nhật
                                                Khách hàng</a>
                                            <a class="dropdown-item" data-bs-toggle="modal"
                                                data-bs-target="#doiMatKhauKhachHangModal">Cập Nhật Mật Khẩu</a>
                                        </div>
                                        <button v-on:click="Object.assign(delete_user, value)" class="btn btn-danger"
                                            data-bs-toggle="modal" data-bs-target="#xoaKhachhangModal">Xóa</button>
                                    </td>
                                </tr>
                            </template>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="capNhatKhachhangModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cập Nhật Khách Hàng</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col-md-12 mb-2">
                        <label class="form-label">Họ và Tên</label>
                        <input v-model="update_user.ho_va_ten" type="text" class="form-control">
                    </div>
                    <div class="col-md-12 mb-2">
                        <label class="form-label">Email</label>
                        <input v-model="update_user.email" type="email" class="form-control">
                    </div>
                    <div class="col-md-12 mb-2">
                        <label class="form-label">Số Điện Thoại</label>
                        <input v-model="update_user.so_dien_thoai" type="text" class="form-control">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button v-on:click="updateUser()" type="button" class="btn btn-primary" data-bs-dismiss="modal">Xác
                        Nhận</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="xoaKhachhangModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Xóa Khách Hàng</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-danger border-0 bg-danger alert-dismissible fade show py-2">
                        <div class="d-flex align-items-center">
                            <div class="font-35 text-white"><i class="bx bxs-message-square-x"></i>
                            </div>
                            <div class="ms-3">
                                <h6 class="mb-0 text-white">Cảnh Báo!</h6>
                                <div class="text-white">Bạn Có chắc chắn xóa tài khoản <b style="color: yellow;">{{
                                    delete_user.ho_va_ten
                                        }}</b>
                                    này không!</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button v-on:click="deleteUser()" type="button" class="btn btn-primary" data-bs-dismiss="modal">Xác
                        Nhận</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="doiMatKhauKhachHangModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Đổi Mật Khẩu</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col-md-12 mb-2">
                        <label class="form-label">Mật Khẩu Mới</label>
                        <input type="text" class="form-control" placeholder="Nhập vào mật khẩu mới">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Xác Nhận</button>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import { createToaster } from "@meforma/vue-toaster";
import baseRequest from "../../core/baseRequest";
const toaster = createToaster({ position: "top-right" });
export default {
    data() {
        return {
            list_don_hang: [],
            update_user: {},
            delete_user: {},
        }
    },
    mounted() {
        this.callListKhachHang();
    },
    methods: {
        callListKhachHang() {
            baseRequest
                .get('admin/thong-tin-khach-hang')
                .then((res) => {
                    this.list_don_hang = res.data.data
                })
        },
        updateUser() {
            baseRequest
                .post('admin/update-khach-hang', this.update_user)
                .then((res) => {
                    if (res.data.status) {
                        toaster.success('Thông Báo<br>' + res.data.message)
                        this.callListKhachHang()
                    } else {
                        toaster.error('Thông Báo<br>' + res.data.message)
                    }
                })
        },

        deleteUser() {
            baseRequest
                .post('admin/delete-khach-hang', this.delete_user)
                .then((res) => {
                    if (res.data.status) {
                        toaster.success('Thông Báo<br>' + res.data.message)
                        this.callListKhachHang()
                    } else {
                        toaster.error('Thông Báo<br>' + res.data.message)
                    }
                })
        },

        changeTrangThaiKhachHang(value) {
            baseRequest
                .post('admin/change-trang-thai-khach-hang', value)
                .then((res) => {
                    if (res.data.status) {
                        toaster.success('Thông Báo<br>' + res.data.message)
                        this.callListKhachHang();
                    } else {
                        toaster.error('Thông Báo<br>' + res.data.message)
                    }
                })
        }

    },
}
</script>
<style></style>