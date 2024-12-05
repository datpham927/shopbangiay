<template>
    <div class="header-wrapper">
        <Top></Top>
    </div>
    <div class="page-wrapper">
        <div class="page-content">
            <router-view></router-view>
        </div>
    </div>
    <FooterClient></FooterClient>
</template>
<script>
// var __vnp =
//     { code: 23311, key: '', secret: '9bbf2e89a2227969cdb774a8cc148e7f' };
// (function () {
//     var ga = document.createElement('script');
//     ga.type = 'text/javascript'; ga.async = true;
//     ga.defer = true; ga.src = '//core.vchat.vn/code/tracking.js?v=40077';
//     var s = document.getElementsByTagName('script');
//     s[0].parentNode.insertBefore(ga, s[0]);
// })();
import '../../assets/js/bootstrap.bundle.min.js';
import '../../assets/js/jquery.min.js';
import '../../assets/js/index.js';
import '../../assets/js/app.js';
import '../../assets/js/jQuery.headroom.js';
import '../../assets/css/bootstrap.min.css';
import '../../assets/css/bootstrap-icons.css';
import '../../assets/css/slick.css';
import '../../assets/css/tooplate-little-fashion.css';
import '../../assets/plugins/simplebar/js/simplebar.min.js';
import '../../assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js';
import Top from '../components/Top.vue';
import FooterClient from '../components/FooterClient.vue';
export default {
    name: 'app',
    components: {
        Top, FooterClient
    }
}
</script>
<style>
@import '../../assets/plugins/simplebar/css/simplebar.css';
@import url("https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap");
@import '../../assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css';
@import '../../assets/css/bootstrap.min.css';
@import '../../assets/css/bootstrap-extended.css';
@import '../../assets/css/app.css';
@import '../../assets/css/icons.css';
@import '../../assets/css/dark-theme.css';
@import '../../assets/css/semi-dark.css';
@import '../../assets/css/header-colors.css';
@import url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css');
@import url('https://fonts.googleapis.com/css2?family=Inter:wght@100;300;400;700;900&display=swap');
@import url('https://fonts.googleapis.com');
@import url('https://fonts.gstatic.com');
</style>