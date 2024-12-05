<template>
    <div class="header-wrapper">
        <TopAdmin></TopAdmin>
        <MenuAdmin></MenuAdmin>
    </div>
    <div class="page-wrapper">
        <div class="page-content">
            <router-view></router-view>
        </div>
    </div>
    <!-- <FooterClient></FooterClient> -->
</template>
<script>
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
import TopAdmin from '../components/TopAdmin.vue';
import MenuAdmin from '../components/MenuAdmin.vue';

export default {
    name: 'app',
    components: {
        TopAdmin, MenuAdmin
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