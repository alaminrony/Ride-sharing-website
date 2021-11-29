<!-- Footer area -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="footer_left">
                        &copy;<a href="#"><img src="{{asset('frontEnd/assets/img/faretrim_footer_logo.png')}}" alt="" class="footer_logo"></a><span>2020</span>
                        <a href="{{url('terms-and-condition')}}"><p>Privacy Policy    |   Terms & Conditions</p></a>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="footer_right">
                        <ul class="footer_menu">
                            <li><a href="{{url('list-latest-news')}}">Our News</a></li>
                            <li><a href="{{url('about-us')}}">About us</a></li>
                            <li><a href="{{url('faq-page')}}">Questions?</a></li>
                            <li><a href="{{url('contact-us')}}">Contact us</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>

  
        
        <script src="{{asset('frontEnd/assets/js/jquery-1.12.4.min.js')}}"></script>
        <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
        <script src="{{asset('frontEnd/assets/js/owl.carousel.min.js')}}"></script>
        <script src="{{asset('frontEnd/assets/js/popper.min.js')}}"></script>
        <script src="{{asset('frontEnd/assets/js/jquery.validate.min.js')}}"></script>
        <script src="{{asset('frontEnd/assets/js/jquery.magnific-popup.min.js')}}"></script>
        <script src="{{asset('frontEnd/assets/js/jquery.pagepiling.min.js')}}"></script>
        <script src="{{asset('frontEnd/assets/js/main.js')}}"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
        <script src="{{asset('frontEnd/assets/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('frontEnd/assets/js/sticky.js')}}"></script>
        <script src="{{asset('frontEnd/assets/js/test.js')}}"></script>
        <script src="{{asset('frontEnd/assets/js/swiper.min.js')}}"></script>
        <script src="{{asset('frontEnd/assets/js/customizeSwipper.js')}}"></script>
        <script src="{{asset('frontEnd/assets/js/password-hide.js')}}"></script>
        
        <script type="text/javascript">
            var preloader = document.getElementById("loading");
		function myFunction(){
			preloader.style.display = 'none';
		};
        </script>
        @stack('script')
    </body>
</html>
