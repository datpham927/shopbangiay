<template>
    <header class="site-header section-padding-img site-header-image" style='margin-top: -8%'>
        <div class="container">
            <div class="row">

                <div class="col-lg-10 col-12 header-info">
                    <h1>
                        <span class="d-block text-danger" style='font-size: 70px; margin-left: 50px;'>Say hello to
                            us</span>
                        <span class="d-block text-dark" style='font-size: 70px; margin-left: 35px;'>love to hear
                            you</span>
                    </h1>
                </div>
            </div>
        </div>

        <img src="../../assets/images/header/positive-european-woman-has-break-after-work.jpg"
            class="header-image img-fluid" alt="">
    </header>

    <section class="contact section-padding">
        <div class="container">
            <div class="row">

                <div class="col-lg-6 col-12">
                    <h2 class="mb-4">Let's <span>begin</span></h2>

                    <form class="contact-form me-lg-5 pe-lg-3" role="form">

                        <div class="form-floating">
                            <input v-model="create_report.ho_va_ten" type="text" class="form-control"
                                placeholder="Full name" required>

                            <label for="name">Full name</label>
                        </div>

                        <div class="form-floating my-4">
                            <input v-model="create_report.email" type="email" class="form-control"
                                placeholder="Email address" required>

                            <label for="email">Email address</label>
                        </div>

                        <div class="form-floating my-4">
                            <input v-model="create_report.tieu_de" type="subject" class="form-control"
                                placeholder="Subject" required>

                            <label for="subject">Subject</label>
                        </div>

                        <div class="form-floating mb-4">
                            <textarea v-model="create_report.content" class="form-control"
                                placeholder="Leave a comment here" required style="height: 160px"></textarea>

                            <label for="message">Tell us about the project</label>
                        </div>

                        <div class="col-lg-5 col-6">
                            <button v-on:click="CreateReport()" type="button" class="form-control">Send</button>
                        </div>
                    </form>
                </div>

                <div class="col-lg-6 col-12 mt-5 ms-auto">
                    <div class="row">
                        <div class="col-6 border-end contact-info">
                            <h6 class="mb-3">New Business</h6>

                            <a href="mailto:hello@company.com" class="custom-link">
                                hello@company.com
                                <i class="bi-arrow-right ms-2"></i>
                            </a>
                        </div>

                        <div class="col-6 contact-info">
                            <h6 class="mb-3">Main Studio</h6>

                            <a href="mailto:studio@company.com" class="custom-link">
                                studio@company.com
                                <i class="bi-arrow-right ms-2"></i>
                            </a>
                        </div>

                        <div class="col-6 border-top border-end contact-info">
                            <h6 class="mb-3">Our Office</h6>

                            <p class="text-muted">Akershusstranda 20, 0150 Oslo, Norway</p>
                        </div>

                        <div class="col-6 border-top contact-info">
                            <h6 class="mb-3">Our Socials</h6>

                            <ul class="social-icon">

                                <li><a href="#" class="social-icon-link bi-messenger"></a></li>

                                <li><a href="#" class="social-icon-link bi-youtube"></a></li>

                                <li><a href="#" class="social-icon-link bi-instagram"></a></li>

                                <li><a href="#" class="social-icon-link bi-whatsapp"></a></li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
</template>
<script>
import baseRequest from '../../core/baseRequest'
import { createToaster } from "@meforma/vue-toaster";
const toaster = createToaster({ position: "top-right" });
export default {
    data() {
        return {
            create_report: {},
        }
    },
    methods: {
        CreateReport() {
            baseRequest
                .post('contact/khach-hang/create', this.create_report)
                .then((res) => {
                    if (res.data.status) {
                        toaster.success('Thông Báo <br>' + res.data.message)
                        this.create_report = {}
                    } else {
                        toaster.success('Thông Báo <br>' + res.data.message)
                    }
                })
        }
    },
}
</script>
<style></style>