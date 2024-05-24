
<!-- footer-section -->
<footer>
    <div class="info-section">
        <div class="info-words">
            <h1>We're Always Here To Help</h1>
            <p>Reach out to us through any of these support channels.</p>
        </div>
        <div class="info-icons">
            <div class="help-center">
                {{-- <div class="help-icon"><i class="fa-solid fa-circle-exclamation"></i></div> --}}
                <a href="" target="_blank" id="ytb">
                    <i class="fa-solid fa-circle-exclamation"> </i>
                    </a>
                <div class="help-words">
                    <h5>Help Section</h5>
                    <a href="">help.megabuy.com</a>
                </div>
            </div>
            <div class="email-support">
                {{-- <div class="email-icon"><i class="fa-regular fa-envelope"></i></div> --}}
                <a href="" target="_blank" id="ytb">
                    <i class="fa-regular fa-envelope"> </i>
                    </a>
                <div class="email-words">
                    <h5>Email Support</h5>
                    <a href="">care@megabuy.com</a>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-categories">

        @foreach($categories as $category)
            <div class="footer-electronics">
                <h3><a href="{{url('/')}}/{{ $category['name'] }}">{{ $category['name'] }}</a></h3>
                <ul>
                    @foreach ($category['subcategory'] as $subcat)
                        <li><a href="{{url('/')}}/{{ $category['name'] }}/{{ $subcat['name'] }}">{{ $subcat['name'] }}</a></li>
                    @endforeach
                </ul>
            </div>
        @endforeach

    </div>

    <div class="footer-social">
        <div class="download-section">
            Shop on the Go
            <div class="download-icons">
                <i class="fa-brands fa-google-play"></i>
                <i class="fa-brands fa-apple"></i>
            </div>
        </div>
        <div class="social-section">
            Connect with Us
            <div class="social-icons">
                <i class="fa-brands fa-facebook"></i>
                <i class="fa-brands fa-instagram"></i>
                <i class="fa-brands fa-twitter"></i>
                <i class="fa-brands fa-linkedin"></i>
            </div>
        </div>
    </div>

    <div class="footer-copyright">
        <div class="copyright-line">
            &#169; 2024 MegaBuy
        </div>
        <div class="copyright-links">
            <a href="">Careers</a>
            <a href="">|</a>
            <a href="">Terms of Use</a>
            <a href="">|</a>
            <a href="">Privacy Policy</a>
        </div>
    </div>
</footer>
<script src="{{ asset('js/home.js') }}"></script>
</body>
</html>
