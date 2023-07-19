<!-- footer-section -->
<footer class="footer">
    <div class="footer-main">
        <img src="{{ asset('images/shape_02.png') }}" alt="" class="shape-footer">
        <div class="container">
            <div class="footer-top">
                <div class="row">
                    <div class="col-md-6">
                        <div class="footer-logo">
                            <img src="{{ asset('images/lumiba-logo.png') }}" width="100" alt="">
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="footer-form">
                            <input type="text" placeholder="Enter Your Email.." class="form-email">
                            <input type="submit" class="submit-btn1" value="Subscribe Now" id="submit">
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-midd">
                <div class="row">
                    <div class="col-md-3">
                        <div class="footer-content">
                            <h2>About Us</h2>

                            <p class="pera-18">Corporate clients and leisure travelers has
                                been relying on Groundlink for dependable
                                safe, and professional chauffeured car end
                                service in major cities across World.</p>
                            <div class="footer-social-contacts">
                                <ul>
                                    <li><a href=""><i class="fa-brands fa-facebook-f"></i></a></li>
                                    <li><a href=""><i class="fa-brands fa-instagram"></i></a></li>
                                    <li><a href=""><i class="fa-brands fa-twitter"></i></a></li>
                                    <li><a href=""><i class="fa-brands fa-youtube"></i></a></li>
                                    <li><a href=""><i class="fa-brands fa-linkedin"></i></a></li>
                                </ul>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-3">
                        <div class="footer-menu">
                            <div class="footer-links">
                                <h2>Useful Links</h2>
                                <ul>
                                    <li><a href="">About us</a></li>
                                    <li><a href="">Teachers</a></li>
                                    <li><a href="">Partners</a></li>
                                    <li><a href="">Room Details</a></li>
                                    <li><a href="">Gallery</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="footer-menu">
                            <div class="footer-links">
                                <h2>Useful Links</h2>
                                <ul>
                                    <li><a href="">Ui Ux Design</a></li>
                                    <li><a href="">Web Development</a></li>
                                    <li><a href="">Business Strategy</a></li>
                                    <li><a href="">Softwere Development</a></li>
                                    <li><a href="">Business English</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="footer-content">
                            <h2>Recent Posts</h2>
                            <div class="recent-posts">
                                <ul class="recent-posts-list">
                                    <li>
                                        <div class="recent-post-card">
                                            <img src="{{ asset('images/post.png') }}" alt="">
                                            <div class="post-content">
                                                <h3 class="post-date">02 Apr 2021</h3>
                                                <h2 class="post-name">Keep Your Business </h2>

                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="recent-post-card">
                                            <img src="{{ asset('images/post.png') }}" alt="">
                                            <div class="post-content">
                                                <h3 class="post-date">02 Apr 2021</h3>
                                                <h2 class="post-name">Keep Your Business </h2>

                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="recent-post-card">
                                            <img src="{{ asset('images/post.png') }}" alt="">
                                            <div class="post-content">
                                                <h3 class="post-date">02 Apr 2021</h3>
                                                <h2 class="post-name">Keep Your Business </h2>

                                            </div>
                                        </div>
                                    </li>

                                </ul>
                            </div>


                        </div>

                    </div>
                </div>
            </div>
            <div class="footer-mini">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="all-rights ">
                                <p>© 2022 Powered by<strong>Mehedii Vai</strong>. All rights reserved.</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="allrights-list">
                                <ul>
                                    <li><a href="">Terms of Use</a></li>
                                    <li><a href="">Privacy Policy</a></li>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</footer>

<!-- Bootstrap core JavaScript======= -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

<!-- Optional JavaScript; choose one of the two! -->
<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
<script src="{{asset('js/custom.js')}}"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="{{ asset('js/owl.carousel.min.js') }}"></script>
@if(\Request::route()->getName() != 'student.chat')
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
@endif
<script>
    $('.owl-carousel').owlCarousel({
        loop: true,
        margin: 10,
        nav: true,
        items: 1,
        // autoplay: true,
        autoPlaySpeed: 3000,
        autoPlayTimeout: 3000,
        autoplayHoverPause: true,
        autoplay: false,
        autoplayTimeout: 5000,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 2
            },
            1000: {
                items: 2
            }
        }
    });

    const swiper = new Swiper('.swiper', {
        // Optional parameters
        direction: 'horizontal',
        loop: true,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    });
    // html video with play-pause btn

    $(document).ready(function () {
        var ctrlVideo = document.getElementById("video");

        $('#video_play_btn').click(function () {
            if ($('#video_play_btn').hasClass("active"))
            {
                // console.log("play");
                ctrlVideo.play();

                // $('#video_play_btn').html("Pause");
                $('#video_play_btn').removeClass("active ");
                $('#video_play_btn').addClass("fa fa-pause-circle-o");
            } else
            {
                ctrlVideo.pause();

                // $('#video_play_btn').html("play");
                $('#video_play_btn').addClass("active");
                $('#video_play_btn').removeClass("fa fa-pause-circle-o ");
                $('#video_play_btn').addClass("fa fa-play-circle-o");
            }
        });

    });

</script>
</body>

</html>
