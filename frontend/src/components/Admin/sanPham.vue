<template>
    <div class="row">
        <div class="col-12">
            <div class="card  shadow-lg p-3 mb-5 bg-body rounded">
                <div class="card-header mt-2">
                    <div class="row">
                        <div class="col-6">
                            <h5>Danh Sách Sản Phẩm</h5>
                        </div>
                        <div class="col-6">
                            <button class="btn btn-outline-primary float-end" data-bs-toggle="modal"
                                data-bs-target="#themmoimodal">Thêm mới</button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr class="text-center align-middle">
                                    <th>#</th>
                                    <th>Tên Sản Phẩm</th>
                                    <th>Hình Ảnh</th>
                                    <th>Mô tả</th>
                                    <th>Số Lượng Nhập</th>
                                    <th>Giá Bán</th>
                                    <th>Giá Khuyến Mãi</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <template v-for="(value, index) in list_products" :key="index">
                                    <tr>
                                        <th class="align-middle text-center">{{ index + 1 }}</th>
                                        <td class="align-middle">{{ value.ten_san_pham }}</td>
                                        <td class="align-middle text-center">
                                            <img v-bind:src="value.hinh_anh" class="img-fluid"
                                                style="height: 100px; width: 100%;" alt="">
                                        </td>
                                        <td class="align-middle">{{ value.mo_ta_ngan }}</td>
                                        <td class="align-middle text-center">{{ value.so_luong }}</td>
                                        <td class="align-middle text-center">{{ value.gia_ban }}</td>
                                        <td class="align-middle text-center">{{ value.gia_khuyen_mai }}</td>
                                        <td class="align-middle text-center">
                                        <td class="align-middle text-nowrap text-center">
                                            <!-- <button class="btn btn-primary me-1" data-bs-toggle="modal"
                                                data-bs-target="#updateModal">Cập Nhật</button> -->
                                            <button class="btn btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#deleteModal"
                                                v-on:click="deleteProduct(value)">Xóa</button>
                                        </td>
                                        </td>
                                    </tr>
                                </template>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="themmoimodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Thêm Mới</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-6 mb-2">
                                <label class="form-label">Tên Sản Phẩm</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="col-6 mb-2">
                                <label class="form-label">Hình Ảnh</label>
                                <input type="email" class="form-control">
                            </div>
                            <div class="col-6 mb-2">
                                <label class="form-label">Mô tả</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="col-6 mb-2">
                                <label class="form-label">Số Lượng Nhập</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="col-6 mb-2">
                                <label class="form-label">Giá Bán</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="col-6 mb-2">
                                <label class="form-label">Giá Khuyến Mãi</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="col-6 mb-2">
                                <label class="form-label">Tình trạng</label>
                                <select class="form-select">
                                    <option value="0">Tạm tắt</option>
                                    <option value="1">Hiển thị</option>
                                </select>
                            </div>
                            <div class="col-6 mb-2">
                                <label class="form-label">Danh Mục</label>
                                <select class="form-select">
                                    <option value="0">Root</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button data-bs-dismiss="modal" type="button" class="btn btn-primary">Xác nhận</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="capNhatmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Cập Nhật</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-6 mb-2">
                                <label class="form-label">Tên Sản Phẩm</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="col-6 mb-2">
                                <label class="form-label">Hình Ảnh</label>
                                <input type="email" class="form-control">
                            </div>
                            <div class="col-6 mb-2">
                                <label class="form-label">Mô tả</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="col-6 mb-2">
                                <label class="form-label">Số Lượng Nhập</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="col-6 mb-2">
                                <label class="form-label">Giá Bán</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="col-6 mb-2">
                                <label class="form-label">Giá Khuyến Mãi</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="col-6 mb-2">
                                <label class="form-label">Tình trạng</label>
                                <select class="form-select">
                                    <option value="0">Tạm tắt</option>
                                    <option value="1">Hiển thị</option>
                                </select>
                            </div>
                            <div class="col-6 mb-2">
                                <label class="form-label">Danh Mục</label>
                                <select class="form-select">
                                    <option value="0">Root</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button data-bs-dismiss="modal" type="button" class="btn btn-primary">Xác
                            nhận</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="xoaModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Xóa</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="alert alert-warning border-0 bg-warning alert-dismissible fade show py-2">
                            <div class="d-flex align-items-center">
                                <div class="font-35 text-dark"><i class="bx bx-info-circle"></i>
                                </div>
                                <div class="ms-3">
                                    <h6 class="mb-0 text-dark">Warning</h6>
                                    <div class="text-dark">
                                        <p>Bạn có muốn xóa sản phẩm <b>XXX</b> này không?
                                        </p>
                                        <p>
                                            <b>Lưu ý:</b> Điều này không thể hoàn tác!
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-danger">Xóa</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import baseRequest from '../../core/baseRequest';
import { createToaster } from "@meforma/vue-toaster";
const toaster = createToaster({ position: "top-right" });
export default {
    data() {
        return {
            list_products: [],
        }
    },
    mounted() {
        this.callProducts();
    },
    methods: {
        callProducts() {
            baseRequest
                .get('select-san-pham/admin')
                .then((res) => {
                    this.list_products = res.data.data
                })
        },
        deleteProduct(value) {
            baseRequest
                .post('xoa-san-pham/admin', value)
                .then((res) => {
                    if (res.data.status) {
                        toaster.success('Thông Báo<br>' + res.data.message)
                        this.callProducts();
                    } else {
                        toaster.error('Thông Báo<br>' + res.data.message)
                    }
                })
        }
    },
}
</script>
<style></style>