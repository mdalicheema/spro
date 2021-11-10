@php
    $contacts = App\Models\Contact::first();
@endphp

<!-- ======= Footer ======= -->
<footer id="footer">

    <div class="footer-top">
        <div class="container">
            <div class="row">

                <div class="col-lg-3 col-md-6 footer-contact">
                    <h3>Company</h3>
                    <p style="width: 250px">
                        {{ $contacts->address }} <br>
                        Lahore,  Punjab 54000<br>
                        Pakistan <br><br>
                        <strong>Phone:</strong> {{ $contacts->phone }}<br>
                        <strong>Email:</strong> {{ $contacts->email }}<br>
                    </p>
                </div>

                <div class="col-lg-2 col-md-6 footer-links">
                    <h4>Useful Links</h4>
                    <ul>
                        <li><i class="bx bx-chevron-right"></i> <a href="/">Home</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="{{ url('/about') }}">About us</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="{{ url('/service') }}">Services</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="{{ url('/') }}">Terms of service</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="{{ url('/') }}">Privacy policy</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6 footer-links">
                    <h4>Our Services</h4>
                    <ul>
                        <li><i class="bx bx-chevron-right"></i> <a href="{{ url('/') }}">Web Design</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="{{ url('/') }}">Web Development</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="{{ url('/') }}">Product Management</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="{{ url('/') }}">Marketing</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="{{ url('/') }}">Graphic Design</a></li>
                    </ul>
                </div>

                <div class="col-lg-4 col-md-6 footer-newsletter">
                    <h4>Join Our Newsletter</h4>
                    <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
                    <form action="" method="post">
                        <input type="email" name="email"><input type="submit" value="Subscribe">
                    </form>
                </div>

            </div>
        </div>
    </div>

    <div class="container d-md-flex py-4">

        <div class="mr-md-auto text-center text-md-left">
            <div class="copyright">
                &copy; Copyright <strong><span>Company</span></strong>. All Rights Reserved
            </div>
            <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://alicheema.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://alicheema.com/company-free-html-bootstrap-template/ -->
                Designed by <a href="https://alicheema.com/">Ali Cheema</a>
            </div>
        </div>
        <div class="social-links text-center text-md-right pt-3 pt-md-0">
            <a href="https://twitter.com/AliCh33ma" class="twitter"><i class="bx bxl-twitter"></i></a>
            <a href="https://www.facebook.com/mdalicheema" class="facebook"><i class="bx bxl-facebook"></i></a>
            <a href="{{ url('/') }}" class="instagram"><i class="bx bxl-instagram"></i></a>
            <a href="{{ url('/') }}" class="google-plus"><i class="bx bxl-skype"></i></a>
            <a href="https://www.linkedin.com/in/mdalicheema/" class="linkedin"><i class="bx bxl-linkedin"></i></a>
        </div>
    </div>
</footer><!-- End Footer -->