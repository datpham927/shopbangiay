    <template>
        <header class="site-header section-padding-img site-header-image" style='margin-top: -8%'>
            <div class="container">
                <div class="row">

                    <div class="col-lg-10 col-12 header-info">
                        <h1>
                            <span class="d-block text-danger" style='font-size: 70px; margin-left: 50px;'>Your
                                Profile</span>
                            <span class="d-block text-dark" style='font-size: 70px; margin-left: 80px;'> Your
                                Story</span>
                        </h1>
                    </div>
                </div>
            </div>

            <img src="https://tatthanh.com.vn/pic/News/image(8510)_HasThumb.png" class="header-image img-fluid" alt="">
        </header>

        <div class="row">
            <div class="car">
                <div class="car-body">
                    <ul class="nav nav-tabs nav-danger" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" data-bs-toggle="tab" href="#primaryhome" role="tab"
                                aria-selected="true">
                                <div class="d-flex align-items-center">
                                    <div class="tab-icon"><i class="fa-solid fa-user font-18 me-1"></i>
                                    </div>
                                    <div class="tab-title">Profile</div>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" data-bs-toggle="tab" href="#primaryprofile" role="tab"
                                aria-selected="false" tabindex="-1">
                                <div class="d-flex align-items-center">
                                    <div class="tab-icon"><i class="fa-solid fa-address-book font-18 me-1"></i>
                                    </div>
                                    <div class="tab-title">Địa chỉ nhận hàng</div>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" data-bs-toggle="tab" href="#primarycontact" role="tab"
                                aria-selected="false" tabindex="-1">
                                <div class="d-flex align-items-center">
                                    <div class="tab-icon"><i class="fa-solid fa-lock font-18 me-1"></i>
                                    </div>
                                    <div class="tab-title">Đổi mật khẩu</div>
                                </div>
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content py-3">
                        <div class="tab-pane fade show active" id="primaryhome" role="tabpanel">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="car">
                                        <div class="car-body">
                                            <div class="d-flex flex-column align-items-center text-center">
                                                <img src="https://image.pngaaa.com/345/1582345-middle.png" alt=""
                                                    class="rounded-circle p-1 bg-danger" width="180px">
                                                <div class="mt-3">
                                                    <h4></h4>
                                                    <p class="text-secondary mb-1"></p>
                                                </div>
                                            </div>
                                            <hr class="my-4">
                                            <ul class="list-group list-group-flush">
                                                <li
                                                    class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round"
                                                            class="feather feather-instagram me-2 icon-inline text-danger">
                                                            <rect x="2" y="2" width="20" height="20" rx="5" ry="5">
                                                            </rect>
                                                            <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z">
                                                            </path>
                                                            <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                                                        </svg>Instagram</h6>
                                                    <span class="text-secondary">DNK Store</span>
                                                </li>
                                                <li
                                                    class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round"
                                                            class="feather feather-facebook me-2 icon-inline text-primary">
                                                            <path
                                                                d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z">
                                                            </path>
                                                        </svg>Facebook</h6>
                                                    <span class="text-secondary">DNK Store</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <div class="car">
                                        <div class="car-body">
                                            <div class="row mb-3 mt-3">
                                                <div class="col-sm-3">
                                                    <h6 class="mb-0">Full Name</h6>
                                                </div>
                                                <div class="col-sm-9 text-secondary">
                                                    <input v-model="profile.ho_va_ten" type="text" class="form-control"
                                                        placeholder="Enter Name">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-sm-3">
                                                    <h6 class="mb-0">Email</h6>
                                                </div>
                                                <div class="col-sm-9 text-secondary">
                                                    <input v-model="profile.email" type="text" class="form-control"
                                                        placeholder="Enter Email">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-sm-3">
                                                    <h6 class="mb-0">Phone</h6>
                                                </div>
                                                <div class="col-sm-9 text-secondary">
                                                    <input v-model="profile.so_dien_thoai" type="text"
                                                        class="form-control" placeholder="Phone">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-3"></div>
                                                <div class="col-sm-9 text-secondary">
                                                    <input type="button" class="btn btn-warning px-4" value="Save"
                                                        v-on:click="updateProfile()">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="primaryprofile" role="tabpanel">
                            <div class="row">
                                <div class="col-7">
                                    <h2 style="color: red;">Thông Tin Đơn Hàng Của Bạn</h2>
                                </div>
                                <!-- <div class="col-5 text-end">
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#themModal">
                                        <i class="fa-solid fa-plus"></i>Thêm địa chỉ
                                    </button>
                                </div> -->
                                <hr>
                            </div>
                            <div class="table-responsive">
                                <table class="table  table-hover">
                                    <thead>
                                        <tr class="text-center">
                                            <th>STT</th>
                                            <th>Mã Đơn Hàng</th>
                                            <th>Tổng Tiền Thanh Toán</th>
                                            <th>Tình Trạng Đơn Hàng</th>
                                            <th>Tên Người Nhận</th>
                                            <th>Số Điện Thoại</th>
                                            <th>Địa Chỉ Giao Hàng</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <template v-for="(value, index) in orderData" :key="index">
                                            <tr class="text-center">
                                                <td>{{ index + 1 }}</td>
                                                <td>{{ value.ma_don_hang }}</td>
                                                <td>{{ formatCurrency(value.tong_tien_thanh_toan) }}</td>
                                                <td><button disabled v-if="value.tinh_trang_don_hang == 0"
                                                        class="btn btn-primary me-1">
                                                        Đang Kiểm Tra
                                                    </button>
                                                    <button disabled v-if="value.tinh_trang_don_hang == 1"
                                                        class="bt btn-warning me-1">
                                                        Đang Vận Chuyển
                                                    </button>
                                                    <button disabled v-if="value.tinh_trang_don_hang == 2"
                                                        class="btn btn-success me-1">
                                                        Đã Giao Hàng
                                                    </button>
                                                </td>
                                                <td>{{ value.ten_nguoi_nhan }}</td>
                                                <td>{{ value.so_dien_thoai }}</td>
                                                <td>{{ value.dia_chi_giao_hang }}</td>
                                                <td class="text-center">
                                                    <!-- <button v-on:click="deleteOrder(value)" class="btn btn-danger">
                                                        xóa
                                                    </button> -->
                                                    <i v-on:click="deleteOrder(value)"
                                                        class="fa-profile fa-solid fa-2x fa-xmark "></i>
                                                </td>
                                            </tr>
                                        </template>
                                    </tbody>
                                </table>
                            </div>
                            <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                style="display: none;" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h3 class="modal-title" id="exampleModalLabel">Xoá</h3>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <h5>
                                                <b>Lưu ý!</b>
                                            </h5>
                                            <b class="text-danger">Dòng này sẽ bị xoá vĩnh viễn!</b>
                                            <br>
                                            <b class="text-danger"> Bạn có chắc chắn muốn xoá <b>
                                                </b> không?</b>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Đóng</button>
                                            <button type="button" class="btn btn-danger"
                                                data-bs-dismiss="modal">Xoá</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="capnhatModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true" style="display: none;">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Cập nhật địa chỉ</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-6">
                                                    <label for="">Tên Người Nhận</label>
                                                    <input type="text" class="form-control mt-2 mb-2"
                                                        placeholder="Nhập tên người nhận">
                                                </div>
                                                <div class="col-6">
                                                    <label for="">Số điện thoại</label>
                                                    <input type="text" class="form-control mt-2 mb-2"
                                                        placeholder="Nhập số điện thoại">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <label for="">Địa chỉ</label>
                                                <input type="text" class="form-control" placeholder="Nhập vào địa chỉ">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Đóng</button>
                                            <button v-on:click="updateDiaChi()" type="button" class="btn btn-warning"
                                                data-bs-dismiss="modal">Lưu</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="themModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Thêm địa chỉ</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-6">
                                                    <label class="mb-2">Tên Người Nhận:</label>
                                                    <input type="text" class="form-control" placeholder="Họ và tên">
                                                </div>
                                                <div class="col-6">
                                                    <label class="mb-2">Số điện thoại:</label>
                                                    <input type="text" class="form-control" placeholder="Số điện thoại">
                                                </div>
                                            </div>
                                            <label class="mt-2 mb-2">Địa chỉ:</label>
                                            <input type="text" class="form-control"
                                                placeholder="Tỉnh/Thành phố, Quận/Huyện, Phường/Xã">

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Trở
                                                lại</button>
                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Hoàn
                                                Thành</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="primarycontact" role="tabpanel">
                            <div class="col">
                                <h4>Thay đổi mật khẩu</h4>
                            </div>
                            <div class="col">Quản lý mật khẩu để bảo mật tài khoản</div>
                            <hr>
                            <div class="row mb-2">
                                <div class="col-2">
                                    <label for="">Mật khẩu cũ</label>
                                </div>
                                <div class="col-3">
                                    <input v-model="passwordUpdate.old_password" type="password"
                                        placeholder="Nhập mật khẩu cũ" class="form-control">
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-2">
                                    <label for="">Mật khẩu mới</label>
                                </div>
                                <div class="col-3">
                                    <input v-model="passwordUpdate.password" type="password"
                                        placeholder="Nhập mật khẩu mới" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-2">
                                    <label for="">Nhập lại Mật khẩu mới </label>
                                </div>
                                <div class="col-3">
                                    <input v-model="passwordUpdate.re_password" type="password"
                                        placeholder="Nhập lại mật khẩu mới" class="form-control">
                                </div>
                            </div>
                            <button class="btn btn-warning" v-on:click="updatePassword()">Lưu</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </template>
<script>
import { createToaster } from "@meforma/vue-toaster";
import baseRequest from "../../core/baseRequest";
const toaster = createToaster({ position: "top-right" });
export default {
    data() {
        return {
            profile: {},
            passwordUpdate: {},
            addressCreation: {},
            addressList: [],
            addressUpdate: {},
            addressDeletion: {},
            orderData: [],
        }
    },
    mounted() {
        this.fetchProfile();
        this.fetchOrderData();
    },
    methods: {
        formatCurrency(amount) {
            return parseInt(amount).toLocaleString('en-US', { style: 'currency', currency: 'USD' });
        },
        fetchOrderData() {
            baseRequest
                .get('profile/thong-tin-don-hang')
                .then((res) => {
                    this.orderData = res.data.data
                })
        },
        fetchProfile() {
            baseRequest
                .get('khach-hang/thong-tin')
                .then((res) => {
                    this.profile = res.data.data;
                })
        },
        updateProfile() {
            baseRequest
                .post('khach-hang/updateProfile', this.profile)
                .then((res) => {
                    if (res.data.status) {
                        toaster.success('Thông Báo<br>' + res.data.message)
                        this.fetchProfile();
                    } else {
                        toaster.error('Thông Báo<br>' + res.data.message)
                    }
                })
        },
        updatePassword() {
            baseRequest
                .post('khach-hang/updatePassword', this.passwordUpdate)
                .then((res) => {
                    if (res.data.status) {
                        toaster.success('Thông Báo<br>' + res.data.message)
                        this.fetchProfile();
                        this.passwordUpdate = {}
                    } else {
                        toaster.error('Thông Báo<br>' + res.data.message)
                    }
                })
                .catch(function (error) {
                    console.log("Error is: " + error)
                });
        },

        deleteOrder(value) {
            baseRequest
                .post('profile/xoa-don-hang', value)
                .then((res) => {
                    const message = res.data.message;
                    if (res.data.status) {
                        toaster.success('Thông Báo<br>' + message)
                        this.fetchOrderData();
                    } else {
                        toaster.error('Thông Báo<br>' + message)
                    }
                })
        }
    },
}
</script>
<style>
.fa-profile {
    color: #dc3545;
    /* Màu mặc định */
    transition: color 0.3s ease;
    /* Hiệu ứng chuyển màu mượt mà */
    cursor: pointer;
    /* Hiển thị con trỏ hình bàn tay */
}

.fa-profile:hover {
    color: #ff0000;
    /* Màu khi hover */
}
</style>