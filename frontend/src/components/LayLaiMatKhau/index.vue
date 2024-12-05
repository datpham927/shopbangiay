<template>
    <div class="bg-laylaimatkhau">
        <div class="row">
            <div class="col-12 col-lg-10 mx-auto">
                <div class="card" style="background-color:rgba(255, 255, 255, 0.2)">
                    <div class="row g-0">
                        <div class="col-lg-5 border-end">
                            <div class="card-body">
                                <div class="p-5">
                                    <div class="text-center">
                                        <img src="https://sgweb.vn/wp-content/uploads/2022/12/thiet-ke-logo-shop-giay-18_1584095086.jpg"
                                            width="180" alt="">
                                    </div>
                                    <h4 class="mt-5 font-weight-bold" style="color: orange;">Thay Đổi Mật Khẩu</h4>
                                    <p class="" style="color: white;">Nhập lại mật khẩu mới để thay đổi mật
                                        khẩu</p>
                                    <div class="mb-3 mt-3">
                                        <label class="form-label" style="color: orange;">Mật khẩu mới</label>
                                        <input v-model="resetPasswordData.password" type="password" class="form-control"
                                            placeholder="Nhập mật khẩu của bạn">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" style="color: orange;">Xác nhận mật khẩu</label>
                                        <input v-model="resetPasswordData.re_password" type="password"
                                            class="form-control" placeholder="Nhập lại mật khẩu của bạn">
                                    </div>
                                    <div class="d-grid gap-2">
                                        <button v-on:click="resetPassword()" type="button" class="btn btn-danger">Thay
                                            đổi mật khẩu</button>
                                        <!-- <router-link to="/dang-nhap">
                                                <a  class="btn btn-light"><i class="bx bx-arrow-back mr-1"></i>Quay lại trang đăng nhập</a>
                                            </router-link> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <img src="https://png.pngtree.com/png-clipart/20220131/original/pngtree-global-data-security-personal-data-security-cyber-data-security-online-concept-png-image_7255044.png"
                                class="card-img login-img h-100" alt="...">
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
const toaster = createToaster({ position: "top-right" });
import baseRequest from '../../core/baseRequest';
export default {
    props: ['hash_reset'],
    data() {
        return {
            resetPasswordData: {},
        }
    },
    mounted() {

    },
    methods: {
        resetPassword() {
            baseRequest
                .post('khach-hang/lay-lai-mat-khau/' + this.$route.params.hash_reset, this.resetPasswordData)
                .then((res) => {
                    const message = res.data.message;
                    if (res.data.status) {
                        toaster.success('Thông Báo<br>' + message)
                        this.$router.push('/sign-in')
                    } else {
                        toaster.error('Thông Báo<br>' + message)
                    }
                })
        }
    },
}
</script>
<style>
.bg-laylaimatkhau {
    background-image: url("https://c.wallhere.com/photos/8b/96/nike_concept_art_brand_sport_shoes-1011677.jpg!d");
    width: 100%;
    height: 100%;
    background-size: cover;
    background-position: center;
}
</style>