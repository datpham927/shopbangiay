<template>
    <div class='bgr'>
        <section class="sign-in-form section-padding">
            <div class="container">
                <div class="row">

                    <div class="col-lg-8 mx-auto col-12">

                        <h1 class="hero-title text-center mb-5" style='color: white;'>Sign In <span
                                style="color: red;">ADMIN</span></h1>

                        <div class="row">
                            <div class="col-lg-8 col-11 mx-auto">

                                <div class="form-floating mb-4 p-0">
                                    <input v-model="login_Admin.email" type="email" class="form-control"
                                        placeholder="Email address">

                                    <label for="email">Email address</label>
                                </div>

                                <div class="form-floating p-0">
                                    <input v-model="login_Admin.password" type="password" class="form-control"
                                        placeholder="Password">

                                    <label for="password">Password</label>
                                </div>
                            </div>
                        </div>
                        <div class="text-center mt-3">
                            <button v-on:click="loginAdmin()" class="btn btn-danger">Đăng Nhập</button>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>
<script>
import { createToaster } from "@meforma/vue-toaster";
import baseRequest from "../../core/baseRequest";
const toaster = createToaster({ position: "top-right" });
export default {
    data() {
        return {
            login_Admin: {},
        }
    },

    methods: {
        loginAdmin() {
            baseRequest
                .post('admin/login-nhan-vien', this.login_Admin)
                .then((res) => {
                    if (res.data.status == 1) {
                        toaster.success('Thông báo<br>' + res.data.message);
                        this.$router.push('/admin')
                        localStorage.setItem('key', res.data.chia_khoa);
                        localStorage.setItem('ten_admin', res.data.ten_admin);

                    } else if (res.data.status == 0) {
                        toaster.error('Thông báo<br>' + res.data.message);
                    } else {
                        toastr.warning(res.data.message);
                    }
                })
        }
    },
}
</script>
<style>
.bgr {
    background-image: linear-gradient(to bottom, rgba(0, 0, 0, 0) 10%, rgba(0, 0, 0, 0.5) 50%), url("https://img4.thuthuatphanmem.vn/uploads/2020/07/05/hinh-anh-background-nen-tim-hinh-khong-gian_034913582.jpg");
    width: 100%;
    height: 800px;
    background-size: cover;
    background-position: center;
}
</style>