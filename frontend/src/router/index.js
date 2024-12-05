import { createRouter, createWebHistory } from "vue-router"; // cài vue-router: npm install vue-router@next --save
import { createToaster } from "@meforma/vue-toaster";
const toaster = createToaster({ position: "top-right" });
import kiemTraKhachHang from './kiemtrakhachhang';
import kiemTraNhanVien from './kiemtranhanvien';

const ROUTE_PATH = {
    DEFAULT: '/',
    ABOUT: '/about',
    PRODUCT: '/product',
    FAQ: '/faq',
    CONTACT: '/contact',
    SIGNIN: '/sign-in',
    SIGNUP: '/sign-up',
    GIOHANG: '/gio-hang',
    THANHTOAN: '/thanh-toan',
    PROFILE: '/profile',
}
const ROUTE_META_CLIENT = {
    layout: 'client'
}
const ROUTE_META_AUTH = {
    layout: 'auth'
}
const ROUTE_META_ADNMIN = {
    layout: 'admin'
}
const ROUTE_META_AUTHADMIN = {
    layout: 'authadmin'
}


const routes = [
    {
        path: ROUTE_PATH.DEFAULT,
        component: () => import('../components/HomePage/TrangChu.vue'),
        meta: ROUTE_META_CLIENT
    },
    {
        path: ROUTE_PATH.ABOUT,
        component: () => import('../components/About/about.vue'),
        meta: ROUTE_META_CLIENT
    },
    {
        path: ROUTE_PATH.PRODUCT,
        component: () => import('../components/Product/product.vue'),
        meta: ROUTE_META_CLIENT
    },
    {
        path: ROUTE_PATH.FAQ,
        component: () => import('../components/FaQ/faq.vue'),
        meta: ROUTE_META_CLIENT
    },
    {
        path: ROUTE_PATH.CONTACT,
        component: () => import('../components/Contact/contact.vue'),
        meta: ROUTE_META_CLIENT
    },
    // auth
    {
        path: ROUTE_PATH.SIGNIN,
        component: () => import('../components/Login/index.vue'),
        meta: ROUTE_META_AUTH
    },
    {
        path: ROUTE_PATH.SIGNUP,
        component: () => import('../components/Register/index.vue'),
        meta: ROUTE_META_AUTH
    },
    // Chi Tiet San Pham
    {
        path: '/chi-tiet-san-pham/:id_san_pham-:slug_san_pham',
        component: () => import('../components/ChiTietSanPham/index.vue'),
        props: true
    },
    // Gio Hang
    {
        path: ROUTE_PATH.GIOHANG,
        component: () => import('../components/GioHang/index.vue'),
        meta: ROUTE_META_CLIENT,
        beforeEnter: kiemTraKhachHang
    },
    {
        path: ROUTE_PATH.THANHTOAN,
        component: () => import('../components/GioHang/thanhToan.vue'),
        meta: ROUTE_META_CLIENT,
        beforeEnter: kiemTraKhachHang
    },
    //Profile
    {
        path: ROUTE_PATH.PROFILE,
        component: () => import('../components/KhachHang/Profile.vue'),
        meta: ROUTE_META_CLIENT,
        beforeEnter: kiemTraKhachHang
    },


    //DanhMuc
    {
        path: '/danh-sach-san-pham/:id_danh_muc-:slug_danh_muc',
        component: () => import('../components/Product/danhMucSanPham.vue'),
        props: true
    },
    // admin
    // {
    //     path: '/admin',
    //     component: () => import('../components/Admin/index.vue'),
    //     meta: { layout: 'admin' }
    // },

    {
        path: '/admin/tai-khoan/khach-hang',
        component: () => import('../components/Admin/khachHang.vue'),
        meta: ROUTE_META_ADNMIN,
        beforeEnter: kiemTraNhanVien

    },

    {
        path: '/admin/don-hang',
        component: () => import('../components/Admin/donHang.vue'),
        meta: { layout: 'admin' },
        beforeEnter: kiemTraNhanVien

    },

    {
        path: '/admin/san-pham',
        component: () => import('../components/Admin/sanPham.vue'),
        meta: ROUTE_META_ADNMIN,
        beforeEnter: kiemTraNhanVien

    },

    {
        path: '/admin',
        component: () => import('../components/Admin/danhMuc.vue'),
        meta: ROUTE_META_ADNMIN,
        beforeEnter: kiemTraNhanVien

    },

    {
        path: '/admin/login',
        component: () => import('../components/Admin/login.vue'),
        meta: ROUTE_META_AUTHADMIN
    },


    // Tìm Kiếm loginer
    {
        path: '/tim-kiem',
        component: () => import('../components/HomePage/timKiemSanPham.vue'),
        meta: ROUTE_META_CLIENT,
        name: 'timKiem',
        props: true
    },

    {
        path: '/kich-hoat-tai-khoan/:id_can_kich_hoat',
        component: () => import('../components/HomePage/kichHoatTaiKhoan.vue'),
        meta: ROUTE_META_CLIENT,
        props: true
    },
    // Lấy lại mật khẩu
    {
        path: '/lay-lai-mat-khau/:hash_reset',
        component: () => import('../components/LayLaiMatKhau/index.vue'),
        meta: ROUTE_META_AUTH,
        props: true
    },
    //Quên mật khẩu
    {
        path: '/quen-mat-khau',
        component: () => import('../components/QuenMatKhau/index.vue'),
        meta: ROUTE_META_AUTH,
        props: true
    }
]

const router = createRouter({
    history: createWebHistory(),
    routes: routes
})

export default router