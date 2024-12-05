
import axios from 'axios';
import { createToaster } from "@meforma/vue-toaster";
const toaster = createToaster({ position: "top-right" });
export default function (to, from, next) {
    axios
        .post('http://127.0.0.1:8000/api/admin/check-login-nhan-vien', {}, {
            headers: {
                Authorization: 'Bearer ' + localStorage.getItem('key')
            }
        })
        .then((res) => {
            if (res.data.status) {
                next();
            } else {
                next('/admin/login');
                toaster.error('Thông báo<br>' + res.data.message);
            }
        })
        .catch(() => {
            next('/admin/login');
            toaster.error("Bạn phải đăng nhập nhé!");
        });
}