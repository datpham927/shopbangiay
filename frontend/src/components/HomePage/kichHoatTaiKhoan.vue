<template>
    <router-link to="/sign-in">
        <button class="btn btn-primary">Back</button>
    </router-link>

</template>
<script>
import axios from 'axios';
import { createToaster } from "@meforma/vue-toaster";
const toaster = createToaster({ position: "top-right" });
import baseRequest from '../../core/baseRequest';
export default {
    props: ['id_can_kich_hoat'],
    mounted() {
        this.kichHoatTaiKhoan();
    },
    methods: {
        kichHoatTaiKhoan() {
            baseRequest
                .get('kich-hoat-tai-khoan/' + this.$route.params.id_can_kich_hoat)
                .then((res) => {
                    const message = res.data.message;
                    if (res.data.status) {
                        toaster.success(message);
                    } else {
                        toaster.error(message);
                    }
                })
        }
    },
}
</script>
<style></style>