<template>
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <router-link to="/">
                <a class="navbar-brand" href="index.html">
                    <strong><span>Shoe</span> Store</strong>
                </a>
            </router-link>

            <!-- <div class="d-lg-none">
                <a href="sign-in.html" class="bi-person custom-icon me-3"></a>

                <a href="product-detail.html" class="bi-bag custom-icon"></a>
            </div> -->

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <router-link to="/">
                            <a class="nav-link active" href="index.html">Home</a>
                        </router-link>
                    </li>

                    <li class="nav-item">
                        <router-link to="/about">
                            <a class="nav-link" href="about.html">Story</a>
                        </router-link>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="javascript:;" class="nav-link" data-bs-toggle="dropdown">
                            <div class="parent-icon">
                            </div>
                            <div class="menu-title">Products</div>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <router-link to="/product">
                                    <a id="viewallproduct" class="dropdown-item" href="products.html"><i
                                            class="bx bx-right-arrow-alt"></i>View
                                        All Products</a>
                                </router-link>
                                <template v-for="(v, k) in list_category" :key="k">
                                    <router-link :to="'/danh-sach-san-pham/' + v.id + '-' + v.slug_danh_muc">
                                        <a class="dropdown-item" id="menu1"><i class=" bx bx-right-arrow-alt"></i>{{
                                            v.ten_danh_muc
                                            }}</a>
                                    </router-link>
                                </template>
                            </li>

                        </ul>
                    </li>

                    <li class="nav-item">
                        <router-link to="/faq">
                            <a class="nav-link" href="faq.html">FAQs</a>
                        </router-link>
                    </li>

                    <li class="nav-item">
                        <router-link to="/contact">
                            <a class="nav-link" href="contact.html">Contact</a>
                        </router-link>
                    </li>
                </ul>
                <div class="position-relative search-bar-box" style="width: 370px;"><input type="text"
                        class="form-control search-control" placeholder="Type to search..."><span
                        class="position-absolute top-50 search-show translate-middle-y"><i
                            class="bx bx-search"></i></span><span
                        class="position-absolute top-50 search-close translate-middle-y"><i class="bx bx-x"></i></span>
                </div>

                <template v-if="auth">
                    <div class="user-box dropdown me-5">
                        <a class="d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret" href="#"
                            role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="https://image.pngaaa.com/345/1582345-middle.png" style="width: 70px;"
                                alt="user avatar">
                            <div class="user-info ps-3">
                                <p class="user-name mb-0">{{ nameKH }}</p>
                                <p class="designattion mb-0">Phong Cách</p>
                            </div>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                                <router-link to="/profile">
                                    <a class="dropdown-item" href="javascript:;">
                                        <i class="bx bx-user"></i><span>Profile</span>
                                    </a>
                                </router-link>
                            </li>
                            <li>
                                <div class="dropdown-divider mb-0"></div>
                            </li>
                            <li><a v-on:click="LogOut()" class="dropdown-item"><i
                                        class='bx bx-log-out-circle'></i><span>Đăng
                                        Xuất</span></a>
                            </li>
                            <li><a v-on:click="LogOutAllDevice()" class="dropdown-item"><i
                                        class='bx bx-log-out-circle'></i><span>Đăng Xuất Tất
                                        Cả</span></a>
                            </li>
                        </ul>
                    </div>
                </template>

                <template v-else>
                    <div class="user-box me-5">
                        <a class="d-flex align-items-center">
                            <router-link to="/sign-in">
                                <a href="" style="color: red; margin-left: 10px;">Đăng Nhập</a>
                            </router-link>
                            <span style="margin-left: 7px; margin-right: 7px;"> / </span>
                            <router-link to="/sign-up">
                                <a href="" style="color: red;">Đăng Ký</a>
                            </router-link>
                        </a>
                    </div>
                </template>

                <div class="d-none d-lg-block">
                    <router-link to="/gio-hang">
                        <a href="product-detail.html" class="bi-bag custom-icon"></a>
                    </router-link>
                </div>

                <!-- <div class="d-none d-lg-block">
                    <router-link to="/sign-in">
                        <a href="sign-in.html" class="bi-person custom-icon m   e-3"></a>
                    </router-link>

                    <router-link to="/gio-hang">
                        <a href="product-detail.html" class="bi-bag custom-icon"></a>
                    </router-link>
                </div> -->
            </div>
        </div>
    </nav>
</template>
<script>
import { createToaster } from "@meforma/vue-toaster";
import baseRequest from '../../core/baseRequest';
const toaster = createToaster({ position: "top-right" });
export default {
    data() {
        return {
            list_category: [],
            auth: false,
            nameKH: '',
        }
    },
    mounted() {
        this.ListCategory();
        this.checkLogin();
        this.nameKH = localStorage.getItem('ten_kh')
    },
    methods: {
        ListCategory() {
            baseRequest
                .get('danh-muc/san-pham/select')
                .then((res) => {
                    this.list_category = res.data.data
                })
        },
        checkLogin() {
            baseRequest
                .post('khach-hang/check-login')
                .then((res) => {
                    if (res.data.status) {
                        this.auth = true
                    }
                })
        },
        LogOut() {
            baseRequest
                .get('khach-hang/dang-xuat')
                .then((res) => {
                    if (res.data.status) {
                        toaster.success('Thông Báo<br>' + res.data.message);
                        window.localStorage.removeItem('chia_khoa_16');
                        window.localStorage.removeItem('ten_kh');
                        this.auth = false;
                        this.$router.push('/sign-in');
                    } else {
                        toaster.error('Thông Báo <br>' + res.data.message);
                    }
                })
        },
        LogOutAllDevice() {
            baseRequest
                .get('khach-hang/dang-xuat-tat-ca-thiet-bi')
                .then((res) => {
                    if (res.data.status) {
                        toaster.success('Thông báo<br>' + res.data.message);
                        window.localStorage.removeItem('chia_khoa_16');
                        window.localStorage.removeItem('ten_kh');
                        this.auth = false;
                        this.$router.push('/');
                    } else {
                        toaster.error('Thông báo<br>' + res.data.message);
                    }
                })
        }
    },
}
</script>
<style>
/* .dropdown-item:hover {
    color: red;
    background-color: beige;
} */
</style>