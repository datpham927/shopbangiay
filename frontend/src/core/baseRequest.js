import axios from "axios";
const apiUrl = 'http://127.0.0.1:8000/api/';
import { createToaster } from "@meforma/vue-toaster";
import { handleError } from "vue";
const toaster = createToaster({ position: "top-right" });

export default {
    getHeader() {
        const token = window.localStorage.getItem('chia_khoa_16');
        return token ? { Authorization: 'Bearer ' + token } : {};
    },
    handleErrors(res) {
        const errors = res.response.data.errors;
        if (errors) {
            Object.values(errors).forEach(errorArray => {
                toaster.error(errorArray[0]);
            });
        }
    },
    get(url) {
        return axios.get(apiUrl + url, { headers: this.getHeader() })
            .catch(this.handleErrors);
    },
    post(url, data) {
        return axios.post(apiUrl + url, data, { headers: this.getHeader() })
            .catch(this.handleErrors);
    },
    delete(url) {
        return axios.delete(apiUrl + url, { headers: this.getHeader() })
            .catch(this.handleErrors);
    },
    put(url, data) {
        return axios.put(apiUrl + url, data, { headers: this.getHeader() })
            .catch(this.handleErrors);
    },
};