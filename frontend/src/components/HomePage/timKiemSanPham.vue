<template>
    <div class="row mb-4">
        <!-- <h4>{{ danh_muc.ten_danh_muc }}</h4> -->
        <template v-for="(value, index) in list" :key="index">
            <div class="col-lg-4 col-12 mb-3">
                <router-link :to="'/chi-tiet-san-pham/' + value.id + '-' + value.slug_san_pham">
                    <div class="product-thumb">
                        <a href="">
                            <img v-bind:src="value.hinh_anh" class="img-fluid product-image" alt="">
                        </a>

                        <div class="product-top d-flex">
                            <span class="product-alert me-auto">New Arrival</span>

                            <a href="#" class="bi-heart-fill product-icon"></a>
                        </div>

                        <div class="product-info d-flex" style="height: 300px;">
                            <div>
                                <div style="height: 200px;">
                                    <h5 class="product-title mb-0">
                                        <a href="product-detail.html" class="product-title-link">{{
                                            value.ten_san_pham
                                            }}</a>
                                    </h5>
                                    <p class="product-p" style="text-align: justify;">{{ value.mo_ta_ngan }}</p>
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
                                <div class="mt-2">
                                    <button class="btn btn-warning"> Xem Chi Tiết</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </router-link>
            </div>
        </template>
    </div>
</template>
<script>
import { createToaster } from "@meforma/vue-toaster";
import baseRequest from '../../core/baseRequest';
const toaster = createToaster({ position: "top-right" });
export default {
    props: ['thong_tin'],

    data() {
        return {
            searchInfo: this.$route.params.thong_tin,
            list: [],
            // danh_muc: {},
        }
    },
    beforeRouteUpdate(to, from, next) {
        this.searchInfo = to.params.thong_tin;
        this.fetchData();
        next();
    },
    mounted() {
        this.fetchData();
    },
    methods: {
        formatToUSD(number) {
            return parseInt(amount).toLocaleString('en-US', { style: 'currency', currency: 'USD' });
        },
        fetchData() {
            var payload = {
                'searchTerm': this.searchInfo
            };
            baseRequest
                .post('trang-chu/tim-kiem', payload)
                .then((res) => {
                    this.list = res.data.data;
                })
        }
    },
}
</script>
<style></style>