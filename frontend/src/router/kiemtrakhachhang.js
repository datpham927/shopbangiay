import axios from 'axios';
import { createToaster } from "@meforma/vue-toaster";

const toaster = createToaster(
    {
        position: "top-right"
    }
);

async function checkLogin(to, from, next) {
    try {
        const response = await axios.post('http://127.0.0.1:8000/api/khach-hang/check-login', {}, {
            headers: {
                Authorization: 'Bearer ' + localStorage.getItem('chia_khoa_16')
            }
        });

        if (response.data.status) {
            next();
        } else {
            handleError(response.data.message);
            next('/sign-in');
        }
    } catch (error) {
        handleError("Bạn phải đăng nhập nhé!");
        next('/sign-in');
    }
}

function handleError(message) {
    toaster.error('Thông báo<br>' + message);
}

export default checkLogin;