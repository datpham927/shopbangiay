<template>
    <div class='bgr2'>
        <section class="sign-in-form section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mx-auto col-12">

                        <h1 class="hero-title text-center mb-5" style='color: white;'>Register</h1>

                        <div class="row">
                            <div class="col-lg-8 col-11 mx-auto">

                                <div class="form-floating">
                                    <input v-model="accountData.ho_va_ten" type="text" class="form-control"
                                        placeholder="name">

                                    <label for="text">Your Name</label>
                                </div>

                                <div class="form-floating my-4">
                                    <input v-on:change="checkEmail()" v-model="accountData.email" type="email"
                                        class="form-control" placeholder="email">

                                    <label for="email">Email</label>

                                </div>
                                <div class="form-floating my-4">
                                    <input v-model="accountData.so_dien_thoai" type="number" class="form-control"
                                        placeholder="phone">

                                    <label for="Phone">Phone</label>

                                </div>
                                <div class="form-floating my-4">
                                    <input v-model="accountData.password" type="password" class="form-control"
                                        placeholder="Password">

                                    <label for="confirm_password">Password</label>
                                </div>
                                <div class="form-floating">
                                    <input v-model="accountData.re_password" type="password" class="form-control"
                                        placeholder="RePassword">

                                    <label for="confirm_password">RePassword</label>
                                </div>

                                <button v-if="isEmailAvailable == 1" v-on:click="createAccount()" type="button"
                                    class="btn btn-danger custom-btn form-control mt-4 mb-3">
                                    Create account
                                </button>
                                <button disabled v-else v-on:click="createAccount()" type="button"
                                    class="btn btn-danger custom-btn form-control mt-4 mb-3">
                                    Create account
                                </button>


                                <p class="text-center">Already have an account? Please
                                    <router-link to="/sign-in">
                                        <a href="sign-in.html">Login</a>
                                    </router-link>
                                </p>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </div>
</template>
<script>
import baseRequest from '../../core/baseRequest';
import { createToaster } from "@meforma/vue-toaster";
const toaster = createToaster({ position: "top-right" });

export default {
    data() {
        return {
            accountData: {},
            isEmailAvailable: 0,
        }
    },
    mounted() {
    },
    methods: {
        createAccount() {
            baseRequest
                .post('khach-hang/dang-ky/create', this.accountData)
                .then((res) => {
                    const message = res.data.message;
                    if (res.data.status) {
                        toaster.success('Thông báo<br>' + message);
                        this.accountData = {};
                        this.$router.push('/sign-in');
                    } else {
                        toaster.error('Thông báo<br>' + message);
                    }
                })
                .catch(error => {
                    console.error("Error checking email:", error);
                });
        },

        checkEmail() {
            baseRequest
                .post('khach-hang/check-email', this.accountData)
                .then((res) => {
                    const message = res.data.message;
                    if (res.data.status == true) {
                        this.isEmailAvailable = 0;
                        toaster.error("Thông Báo <br>" + message);
                    } else {
                        this.isEmailAvailable = 1;
                        toaster.success("Thông báo<br>" + message);
                    }
                })
                .catch(error => {
                    console.error("Error checking email:", error);
                });
        }
    },
}
</script>
<style>
.bgr2 {
    background-image: linear-gradient(to bottom, rgba(0, 0, 0, 0) 10%, rgba(0, 0, 0, 0.5) 50%), url("https://c.wallhere.com/photos/8b/96/nike_concept_art_brand_sport_shoes-1011677.jpg!d");
    width: 100%;
    height: 100%;
    background-size: cover;
    /* Điều chỉnh kích thước hình ảnh để che phủ toàn bộ phần tử */
    background-position: center;
}
</style>