<template>
    <div class="bg-quenmatkhau">
        <div class="authentication-forgot d-flex align-items-center justify-content-center">
            <div class="card forgot-box " style="background-color:rgba(255, 255, 255, 0.1)">
                <div class="card-body">
                    <div class="p-4 rounded  border">
                        <div class="text-center">
                            <img src="../../../assets/images/icons/forgot-2.png" width="120" alt="">
                        </div>
                        <div class="text-center">
                            <h4 class="mt-3 font-weight-bold" style="color: white;">Quên Mật Khẩu?</h4>
                            <p class="text-muted">Nhập Email để lấy lại mật khẩu</p>
                        </div>
                        <div class="my-4">
                            <input v-model="quen_mat_khau.email" type="text" class="form-control form-control-lg"
                                placeholder="Nhập vào Email">
                        </div>
                        <div class="d-grid gap-2">
                            <button v-on:click="actionQuenMatKhau()" type="button"
                                class="btn btn-danger btn-lg">Gửi</button>
                            <router-link to="/sign-in">
                                <a class="btn btn-light"><i class="bx bx-arrow-back mr-1"></i>Quay lại trang đăng
                                    nhập</a>
                            </router-link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import axios from 'axios';
import { createToaster } from "@meforma/vue-toaster";
import baseRequest from '../../core/baseRequest';
const toaster = createToaster({ position: "top-right" });
export default {
    data() {
        return {
            quen_mat_khau: {},
        }
    },
    methods: {
        actionQuenMatKhau() {
            baseRequest
                .post('khach-hang/quen-mat-khau', this.quen_mat_khau)
                .then((res) => {
                    const message = res.data.message;
                    if (res.data.status) {
                        toaster.success(message);
                    } else {
                        toaster.error(message);
                    }
                })
        },
    },
}
</script>
<style>
.bg-quenmatkhau {
    background-image: url("https://c.wallhere.com/photos/8b/96/nike_concept_art_brand_sport_shoes-1011677.jpg!d");
    width: 100%;
    height: 100%;
    background-size: cover;
    background-position: center;

}
</style>