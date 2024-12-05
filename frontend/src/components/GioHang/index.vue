<template>
    <div class="container">
        <div class="row">
            <div class="col-12 " style="margin-top: -70px;">
                <h4 class="text-center" style="font-size: 40px; color: gray; margin-bottom: 20px;">Giỏ Hàng</h4>
                <div class="table-responsive">
                    <table class="table table-hover ">
                        <thead>
                            <tr class="text-center">
                                <th></th>
                                <th>STT</th>
                                <th>Ảnh Đại Diện</th>
                                <th>Tên Sản Phẩm</th>
                                <th>Số Lượng</th>
                                <th>Size</th>
                                <th>Đơn Giá</th>
                                <th>Thành Tiền</th>
                                <th>Hành Động</th>
                            </tr>
                        </thead>
                        <tbody>
                            <template v-for="(value, index) in shoppingCartItems" :key="index">
                                <tr class="align-middle" style="height: 185px;">
                                    <td class="align-middle text-center">
                                        <input v-on:change="calculateTotalAmount()" v-model="value.chon_sp"
                                            class="form-check-input me-3" type="checkbox" value="" aria-label="...">
                                    </td>
                                    <th class="align-middle text-center">{{ index + 1 }}</th>
                                    <td class="align-middle text-center"><img class="img-fluid"
                                            style="max-width: 120px; height: auto;" v-bind:src="value.hinh_anh" alt="">
                                    </td>
                                    <td class="align-middle text-center">{{ value.ten_san_pham }}</td>
                                    <td style="width: 140px;" class="align-middle">
                                        <div class="input-group input-spinner d-flex justify-content-center flex-row"
                                            style="flex-wrap: nowrap;">
                                            <button v-on:click="value.so_luong--; updateCartItem(value)"
                                                class="btn btn-dark" type="button" id="button-minus"> − </button>
                                            <input v-model="value.so_luong" v-on:change="updateCartItem(value)"
                                                type="text" class="form-control text-center">
                                            <button v-on:click="value.so_luong++; updateCartItem(value)"
                                                class="btn btn-dark" type="button" id="button-plus"> + </button>
                                        </div>
                                    </td>
                                    <td style="width: 140px;" class="align-middle">
                                        <div class="input-group input-spinner d-flex justify-content-center flex-row"
                                            style="flex-wrap: nowrap;">
                                            <button v-on:click="value.size--; updateCartItem(value)"
                                                class="btn btn-dark" id="button-minus"> − </button>
                                            <input v-model="value.size" width="60px" v-on:keyup="updateCartItem(value)"
                                                type="text" class="form-control text-center">
                                            <button v-on:click="value.size++; updateCartItem(value)"
                                                class="btn btn-dark" type="button" id="button-plus"> + </button>
                                        </div>
                                    </td>
                                    <td class="align-middle text-center">{{ formatCurrency(value.don_gia) }}</td>
                                    <td class="align-middle text-center">{{ formatCurrency(value.thanh_tien) }}</td>
                                    <td class="align-middle text-center">
                                        <!-- <div>
                                        <button v-on:click="removeItemFromCart(value)"
                                            class="btn btn-danger me-3">Xóa</button>
                                    </div> -->
                                        <i v-on:click="removeItemFromCart(value)"
                                            class="fa-cart fa-solid fa-2x fa-xmark "></i>
                                    </td>
                                </tr>


                            </template>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-8">
            </div>
            <div class="col-lg-4">
                <div class="card tongtien" style="background-color: gainsboro;">
                    <div class="card-header">
                        <div class="title-thanhToan">
                            <b>Tổng giỏ hàng</b>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="content text-end">
                            <p class="para-giohang">Tạm Tính</p>
                            <b class="para-giohang" style="color: black; font-size: 25px;">{{
                                formatCurrency(total_amount)
                            }}</b>
                            <p class="para-giohang">Giảm Giá</p>
                            <b class="para-giohang" style="color: black; font-size: 25px;">{{
                                formatCurrency(total_promotion)
                                }}</b>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="thanhtien text-end">
                            <b style="font-size: 20px;">Tổng: </b>
                            <b style="font-size: 20px; color: red;"> {{ formatCurrency(total_amount)
                                }}</b>
                            <div>
                                <button v-on:click="purchaseSelectedItems()" class="btn btn-danger mb-3 mt-3"> Vào
                                    Trang Thanh
                                    Toán
                                </button>
                            </div>
                        </div>
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
            shoppingCartItems: [],
            total_amount: 0,
            total_promotion: 0,
        }
    },
    mounted() {
        this.fetchShoppingCart();
    },
    methods: {
        fetchShoppingCart() {
            baseRequest
                .get('chi-tiet-don-hang/select-gio-hang')
                .then((res) => {
                    this.shoppingCartItems = res.data.data
                    this.calculateTotalAmount();
                })
        },
        removeItemFromCart(value) {
            baseRequest
                .post('chi-tiet-don-hang/delete-san-pham-gio-hang', value)
                .then((res) => {
                    if (res.data.status) {
                        toaster.success("Thông Báo<br>" + res.data.message);
                        this.fetchShoppingCart();
                    } else {
                        toaster.success("Thông Báo<br>" + res.data.message);
                    }
                })
        },

        updateCartItem(value) {
            baseRequest
                .post('chi-tiet-don-hang/update-gio-hang', value)
                .then((res) => {
                    if (res.data.status) {
                        toaster.success("Thông Báo <br>" + res.data.message);
                        this.fetchShoppingCart();
                    } else {
                        toaster.error("Thông Báo <br>" + res.data.message);
                    }
                })
        },
        formatCurrency(amount) {
            return parseInt(amount).toLocaleString('en-US', { style: 'currency', currency: 'USD' });
        },
        calculateTotalAmount() {
            this.total_amount = this.shoppingCartItems
                .filter(value => value.chon_sp)
                .reduce((total, value) => total + value.thanh_tien, 0)
        },
        purchaseSelectedItems() {
            const selectedItems = this.shoppingCartItems.filter(value => value.chon_sp);
            const payload = {
                'ds_mua_sp': selectedItems,
            }
            baseRequest
                .post('gio-hang/list-chon-san-pham', payload)
                .then((res) => {
                    const message = res.data.message
                    if (res.data.status) {
                        toaster.success('Thông báo<br>' + message);
                        this.$router.push('/thanh-toan')
                    } else {
                        toaster.error("Thông Báo<br>" + message);
                    }
                });
        }
    },
}
</script>
<style>
.fa-cart {
    color: #dc3545;
    transition: color 0.3s ease;
    cursor: pointer;
}

.fa-cart:hover {
    color: #ff0000;
}
</style>