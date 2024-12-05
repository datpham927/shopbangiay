<template>
    <header class="site-header section-padding-img site-header-image" style='margin-top: -7%;'>
        <div class="container">
            <div class="row">

                <div class="col-lg-6 col-12 header-info">
                    <h1>
                        <span class="d-block text-danger" style='font-size: 70px;margin-left: 50px; '>Company</span>
                        <span class="d-block text-dark" style='margin-left: 110px;'>Fashion</span>
                    </h1>
                </div>
            </div>
        </div>

        <img src="../../assets/images/header/businesspeople-meeting-office-working.jpg" class="header-image img-fluid"
            alt="">
    </header>

    <section class="team section-padding">
        <div class="container">
            <div class="row">

                <div class="col-12">
                    <h2 class="mb-5">Meet our <span>team</span></h2>
                </div>

                <div class="col-lg-4 mb-4 col-12">
                    <div class="team-thumb d-flex align-items-center">
                        <img src="../../assets/images/avatars/thanhvien1.png"
                            class="img-fluid custom-circle-image team-image me-4" alt="">

                        <div class="team-info">
                            <h5 class="mb-0">Davis Lee</h5>
                            <strong class="text-muted">Product, VP</strong>

                            <!-- Button trigger modal -->
                            <button type="button" class="btn custom-modal-btn" data-bs-toggle="modal"
                                data-bs-target="#don">
                                <i class="bi-plus-circle-fill"></i>
                            </button>

                        </div>
                    </div>
                </div>

                <div class="col-lg-4 mb-4 col-12">
                    <div class="team-thumb d-flex align-items-center">
                        <img src="../../assets/images/avatars/thanhvien2.png"
                            class="img-fluid custom-circle-image team-image me-4" alt="">

                        <div class="team-info">
                            <h5 class="mb-0">John Nguyễn</h5>
                            <strong class="text-muted">Marketing</strong>

                            <!-- Button trigger modal -->
                            <button type="button" class="btn custom-modal-btn" data-bs-toggle="modal"
                                data-bs-target="#kelly">
                                <i class="bi-plus-circle-fill"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 mb-lg-0 mb-4 col-12">
                    <div class="team-thumb d-flex align-items-center">
                        <img src="../../assets/images/avatars/thanhvien4.png"
                            class="img-fluid custom-circle-image team-image me-4" alt="">

                        <div class="team-info">
                            <h5 class="mb-0">50 Cent</h5>
                            <strong class="text-muted">Founder</strong>

                            <!-- Button trigger modal -->
                            <button type="button" class="btn custom-modal-btn" data-bs-toggle="modal"
                                data-bs-target="#marie">
                                <i class="bi-plus-circle-fill"></i>
                            </button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section class="testimonial section-padding">
        <div class="container">
            <div class="row">

                <div class="col-lg-9 mx-auto col-11">
                    <h2 class="text-center">Customer love, <br> <span>KINGSHOES</span> Fashion</h2>

                    <div class="slick-testimonial">
                        <div class="slick-testimonial-caption">
                            <p class="lead">Với đội ngũ sáng tạo và tận tâm, chúng tôi không ngừng đổi mới để đáp ứng
                                nhu cầu thời trang và sự thoải mái của khách hàng.</p>

                            <div class="slick-testimonial-client d-flex align-items-center mt-4">
                                <img src="../../assets/images/avatars/thanhvien3.png"
                                    class="img-fluid custom-circle-image me-3" alt="">

                                <span>George, <strong class="text-muted">Digital Art Fashion</strong></span>
                            </div>
                        </div>

                        <div class="slick-testimonial-caption">
                            <p class="lead">Chúng tôi kết hợp công nghệ tiên tiến và nguyên liệu bền vững để tạo ra sản
                                phẩm chất lượng cao và thân thiện với môi trường</p>

                            <div class="slick-testimonial-client d-flex align-items-center mt-4">
                                <img src="../../assets/images/avatars/thanhvien2.png"
                                    class="img-fluid custom-circle-image me-3" alt="">

                                <span>Sandar, <strong class="text-muted">Zoom Fashion Idea</strong></span>
                            </div>
                        </div>

                        <div class="slick-testimonial-caption">
                            <p class="lead">Tại Giày KINGSHOES, chúng tôi thiết kế những đôi giày tinh tế và thoải mái,
                                giúp
                                bạn tự tin bước đi mỗi ngày.</p>

                            <div class="slick-testimonial-client d-flex align-items-center mt-4">
                                <img src="../../assets/images/avatars/thanhvien1.png"
                                    class="img-fluid custom-circle-image me-3" alt="">

                                <span>Marie, <strong class="text-muted">Art Fashion Design</strong></span>
                            </div>
                        </div>

                        <div class="slick-testimonial-caption">
                            <p class="lead">Giày KINGSHOES không chỉ là một thương hiệu giày, mà là đối tác đồng hành
                                trong
                                mỗi bước đi của bạn, từ phong cách hàng ngày đến những dịp đặc biệt.</p>

                            <div class="slick-testimonial-client d-flex align-items-center mt-4">
                                <img src="../../assets/images/avatars/thanhvien4.png"
                                    class="img-fluid custom-circle-image me-3" alt="">

                                <span>Catherine, <strong class="text-muted">Dress Fashion</strong></span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- TEAM MEMBER MODAL -->
    <div class="modal fade" id="don" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content border-0">
                <div class="modal-header flex-column">
                    <h3 class="modal-title" id="exampleModalLabel" style="color: red;">Davis Lee</h3>

                    <h6 class="text-muted">Product, VP</h6>

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <h5 class="mb-4">Chúng tôi là công ty giày KINGSHOES, chuyên cung cấp những đôi giày chất lượng cao,
                        kết
                        hợp giữa thiết kế hiện đại và sự thoải mái tối ưu.</h5>

                    <div class="row mb-4">
                        <div class="col-lg-6 col-12">
                            <p style="text-align: justify;">Với sự chú trọng vào chất lượng và tính năng, chúng tôi cam
                                kết sử dụng nguyên liệu bền
                                vững và công nghệ sản xuất tiên tiến để mang đến những sản phẩm giày vừa thời trang vừa
                                thân thiện với môi trường.</p>
                        </div>

                        <div class="col-lg-6 col-12">
                            <p style="text-align: justify;">Đội ngũ thiết kế sáng tạo của chúng tôi luôn theo kịp xu
                                hướng và lắng nghe phản hồi từ
                                khách hàng để tạo ra những mẫu giày độc đáo và phù hợp nhất với phong cách sống hiện
                                đại.</p>
                        </div>
                    </div>

                    <ul class="social-icon">
                        <li class="me-3"><strong>Where to find?</strong></li>

                        <li><a href="#" class="social-icon-link bi-youtube"></a></li>

                        <li><a href="#" class="social-icon-link bi-whatsapp"></a></li>

                        <li><a href="#" class="social-icon-link bi-instagram"></a></li>
                    </ul>
                </div>
            </div>

        </div>
    </div>

    <!-- TEAM MEMBER MODAL -->
    <div class="modal fade" id="kelly" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content border-0">
                <div class="modal-header flex-column">
                    <h3 style="color: red;" class="modal-title" id="exampleModalLabel">John Nguyễn</h3>

                    <h6 class="text-muted">Global, Head of Marketing</h6>

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <h5 class="mb-4">Chúng tôi không chỉ là nơi cung cấp giày, mà còn là đối tác đồng hành trong mỗi
                        bước chân của bạn, giúp bạn tự tin và thoải mái trên mọi nẻo đường.</h5>

                    <div class="row mb-4">
                        <div class="col-lg-6 col-12">
                            <p style="text-align: justify;">Công ty Giày KINGSHOES cung cấp những đôi giày chất lượng
                                cao, kết hợp giữa thiết kế tinh
                                tế và sự thoải mái vượt trội</p>
                        </div>

                        <div class="col-lg-6 col-12">
                            <p style="text-align: justify;">Chúng tôi cam kết sử dụng nguyên liệu bền vững và công nghệ
                                tiên tiến để mang đến sản
                                phẩm vừa thời trang vừa thân thiện với môi trường.</p>
                        </div>
                    </div>

                    <ul class="social-icon">
                        <li class="me-3"><strong>Where to find?</strong></li>

                        <li><a href="#" class="social-icon-link bi-facebook"></a></li>

                        <li><a href="#" class="social-icon-link bi-instagram"></a></li>
                    </ul>
                </div>
            </div>

        </div>
    </div>

    <!-- TEAM MEMBER MODAL -->
    <div class="modal fade" id="marie" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content border-0">
                <div class="modal-header flex-column">
                    <h3 class="modal-title" id="exampleModalLabel" style="color: red;">50 Cent</h3>

                    <h6 class="text-muted">Founder & CEO</h6>

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <h5 style="text-align: justify;" class="mb-4">Chúng tôi tin rằng mỗi bước chân đều đáng giá, và đó
                        là lý do chúng tôi chăm sóc
                        từng chi tiết trong quá trình thiết kế và sản xuất. Chúng tôi sử dụng nguyên liệu cao cấp và quy
                        trình sản xuất bền vững để đảm bảo rằng sản phẩm của chúng tôi không chỉ đáp ứng nhu cầu thời
                        trang mà còn góp phần bảo vệ môi trường.</h5>

                    <div class="row mb-4">
                        <div class="col-lg-6 col-12">
                            <p style="text-align: justify;">Chúng tôi cam kết sử dụng nguyên liệu bền vững và công nghệ
                                tiên tiến để mang đến sản phẩm thời trang và thân thiện với môi trường.</p>
                        </div>

                        <div class="col-lg-6 col-12">
                            <p style="text-align: justify;">Tại Giày ABC, chúng tôi kết hợp thiết kế tinh tế với sự
                                thoải mái tối ưu, tạo ra những đôi giày chất lượng vượt trội cho từng bước chân của bạn.
                            </p>
                        </div>
                    </div>

                    <ul class="social-icon">
                        <li class="me-3"><strong>Where to find?</strong></li>

                        <li><a href="#" class="social-icon-link bi-twitter"></a></li>

                        <li><a href="#" class="social-icon-link bi-linkedin"></a></li>

                        <li><a href="#" class="social-icon-link bi-envelope"></a></li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</template>
<script>
export default {

}
</script>
<style></style>