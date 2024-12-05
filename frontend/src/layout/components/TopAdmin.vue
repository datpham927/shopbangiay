<template>
    <header>
        <div class="topbar d-flex align-items-center">
            <nav class="navbar navbar-expand">
                <div class="topbar-logo-header">
                    <div class="">
                        <h4 class="logo-text" style="color: red;">ADMIN</h4>
                    </div>
                </div>
                <div class="mobile-toggle-menu"><i class='bx bx-menu'></i></div>
                <div class="search-bar flex-grow-1">
                    <div class="position-relative search-bar-box">
                    </div>
                </div>

                <div class="user-box dropdown">
                    <a class="d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret" href="#"
                        role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="https://logodix.com/logo/1707097.png" class="user-img" alt="user avatar">
                        <div class="user-info ps-3">
                            <p class="user-name mb-0">{{ nameADMIN }}</p>
                            <p class="designattion mb-0">Nhân Viên Của Tháng</p>

                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a v-on:click="dangXuat()" class="dropdown-item"><i
                                    class='bx bx-log-out-circle'></i><span>Đăng Xuất</span></a>
                        </li>
                        <li><a v-on:click="dangXuatAll()" class="dropdown-item"><i
                                    class='bx bx-log-out-circle'></i><span>Đăng Xuất Tất Cả</span></a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>
</template>
<script>
import { createToaster } from "@meforma/vue-toaster";
import baseRequest from "../../core/baseRequest";
const toaster = createToaster({ position: "top-right" });
export default {
    data() {
        return {
            auth: false,
            nameADMIN: '',
        }
    },
    mounted() {
        this.checkLogin();
        this.nameADMIN = localStorage.getItem('ten_admin')
    },
    methods: {
        checkLogin() {
            baseRequest
                .post('admin/check-login-nhan-vien')
                .then((res) => {
                    if (res.data.status) {
                        this.auth = true
                    }
                })
        },
    },

}
</script>
<style></style>