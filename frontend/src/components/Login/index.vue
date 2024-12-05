<template>
    <div class='bgr'>
        <section class="sign-in-form section-padding">
            <div class="container">
                <div class="row">

                    <div class="col-lg-8 mx-auto col-12">

                        <h1 class="hero-title text-center mb-5" style='color: white;'>Sign in</h1>

                        <div class="row">
                            <div class="col-lg-8 col-11 mx-auto">

                                <div class="form-floating mb-4 p-0">
                                    <input v-model="loginUserData.email" type="email" class="form-control"
                                        placeholder="Email address">

                                    <label for="email">Email address</label>
                                </div>

                                <div class="form-floating p-0">
                                    <input v-model="loginUserData.password" type="password" class="form-control"
                                        placeholder="Password">

                                    <label for="password">Password</label>
                                </div>

                                <button v-on:click="loginUser()" type="button"
                                    class="btn btn-danger custom-btn form-control mt-4 mb-3">
                                    Sign in
                                </button>
                                <div class="text-center">
                                    <router-link to="/quen-mat-khau">
                                        <a href="">Quên mật khẩu</a>
                                    </router-link>
                                </div>
                                <div class="div-separator w-50 m-auto my-5"><span>or</span></div>
                                <div class="social-login d-flex flex-column w-50 m-auto">
                                    <a href="#" class="btn btn-danger custom-btn social-btn mb-4">
                                        <i class="bi bi-google me-3"></i>
                                        Continue with Google
                                    </a>
                                    <a href="#" class="btn btn-primary custom-btn social-btn">
                                        <i class="bi bi-facebook me-3"></i>
                                        Continue with Facebook
                                    </a>
                                </div>
                                <div class="container overflow-hidden text-center">
                                    <div class="row gy-5">
                                        <div class="col-6">
                                            <p class="text-center">Don’t have an account?
                                                <router-link to="/sign-up">
                                                    <a href="sign-up.html" style="color:brown">Register</a>
                                                </router-link>
                                            </p>
                                        </div>
                                        <div class="col-6">
                                            <p class="text-center">Return to the <br>
                                                <router-link to="/">
                                                    <a href="sign-up.html" style="color:brown">Home.</a>
                                                </router-link>
                                            </p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </section>
    </div>
</template>
<script>
import baseRequest from '../../core/baseRequest'
import { createToaster } from "@meforma/vue-toaster";
const toaster = createToaster({ position: "top-right" });
export default {
    data() {
        return {
            loginUserData: {},
        }
    },
    methods: {
        loginUser() {
            baseRequest
                .post('khach-hang/login', this.loginUserData)
                .then((res) => {
                    const { status, message, chia_khoa, ten_kh } = res.data;
                    if (status === 1) {
                        toaster.success("Thông Báo <br>" + message);
                        localStorage.setItem('chia_khoa_16', chia_khoa);
                        localStorage.setItem('ten_kh', ten_kh);
                        this.$router.push('/');
                        this.loginUserData = {}
                    } else if (status === 2) {
                        toaster.warning("Thông Báo <br>" + message);
                    } else {
                        toaster.error("Thông Báo <br>" + message);
                    }
                })
        }
    }
}
</script>
<style>
.bgr {
    background-image: linear-gradient(to bottom, rgba(0, 0, 0, 0) 10%, rgba(0, 0, 0, 0.5) 50%), url("https://c.wallhere.com/photos/8b/96/nike_concept_art_brand_sport_shoes-1011677.jpg!d");
    width: 100%;
    height: 100%;
    background-size: cover;
    background-position: center;
}
</style>