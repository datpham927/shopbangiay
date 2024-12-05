<template>
    <div class="bg-ProductCategory">
        <header class="site-header section-padding d-flex justify-content-center align-items-center"
            style='margin-top: -7%;'>
            <div class="container">
                <div class="row">

                    <div class="col-lg-10 col-12">
                        <h1>
                            <span class="d-block text-danger" style='font-size: 70px; margin-left:70px;'>Choose
                                your</span>
                            <span class="d-block text-dark" style='margin-left: 140px;'>favorite shoes</span>
                        </h1>
                    </div>
                </div>
            </div>
        </header>
        <section class="products section-padding">
            <div class="container" style="margin-top: -100px;">
                <div class="row">
                    <div class="col-12">
                        <h2 class="mb-5" style="color: red; font-size: 50px;">{{
                            danh_muc.ten_danh_muc
                        }}</h2>
                        <hr>
                    </div>
                    <template v-for=" (value, index) in categoryList " :key="index">
                        <div class="col-lg-4 col-12 mb-3">
                            <router-link :to="'/chi-tiet-san-pham/' + value.id + '-' + value.slug_san_pham">
                                <div class="product-thumb">
                                    <a href="product-detail.html">
                                        <img v-bind:src="value.hinh_anh" class="img-fluid product-image" alt="">
                                    </a>
                                    <div class="product-top d-flex">
                                        <span class="product-alert">Trending</span>
                                        <a href="#" class="bi-heart-fill product-icon ms-auto"></a>
                                    </div>
                                    <div class="product-info d-flex" style="height: 255px;">
                                        <div>
                                            <div style="height: 200px;">
                                                <h5 class="product-title mb-0">
                                                    <a href="product-detail.html" class="product-title-link">{{
                                                        value.ten_san_pham
                                                    }}</a>
                                                </h5>
                                                <p class="product-p" style="text-align: justify;">{{ value.mo_ta_ngan }}
                                                </p>
                                            </div>
                                            <div class="row" style="margin-top: -30px;">
                                                <div class="col-7">
                                                    <small style="font-size: 17px;"
                                                        class="product-price text-muted ms-auto mt-auto mb-5"><span
                                                            style="color: red;">Giá
                                                            Khuyến Mãi</span>: {{
                                                                value.gia_khuyen_mai
                                                            }}$</small>
                                                </div>
                                                <div class="col-5">
                                                    <small style="font-size: 17px;"
                                                        class="product-price text-decoration-line-through text-muted ms-auto mt-auto mb-5"><span>Giá
                                                            Gốc: </span>{{
                                                                value.gia_ban
                                                            }}$</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </router-link>
                        </div>
                    </template>
                </div>
            </div>
        </section>
    </div>
</template>
<script>
import axios from 'axios'
import baseRequest from '../../core/baseRequest';
export default {
    props: ['id_danh_muc', 'slug_danh_muc'],
    data() {
        return {
            categoryList: [],
            categoryId: null,
            danh_muc: {},
        }
    },
    mounted() {
        this.categoryId = this.$route.params.id_danh_muc;
        this.fetchProductsByCategory();
    },
    beforeRouteUpdate(to, from, next) {
        this.categoryId = to.params.id_danh_muc;
        this.fetchProductsByCategory();
        next();
    },
    methods: {
        fetchProductsByCategory() {
            baseRequest
                .get('danh-muc/danh-sach-san-pham/select/' + this.categoryId)
                .then((res) => {
                    const { data, danh_muc } = res.data;
                    this.categoryList = data
                    this.danh_muc = danh_muc;
                })
                .catch(error => {
                    console.error("Error fetching products by category:", error); // Xử lý lỗi
                });
        }
    },
}
</script>
<style>
.bg-ProductCategory {
    background-color: #EFFDF5;
}
</style>