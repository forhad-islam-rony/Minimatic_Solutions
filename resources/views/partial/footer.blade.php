<div class="footer mt-3" style="background-color: black;margin-top: 40px">
    <div class="container">
        <h1>Get in Touch</h1><br />
        <div class="row">
            <div class="col-md-4 address">
                <label>Contact Us</label>
                <address>Khulna University of Engineering & Technology</address>
                <address>Cell- 01783226830<br />Email: forhadrony161@gmail.com.com</address>
            </div>
            <div class="col-md-4 social" align="center">
                <label>Follow Us on</label><br />
                <a href="#"><img src="/image/fb.png" /></a>
                <a href="#"><img src="/image/gp.png" /></a>
                <a href="#"><img src="/image/twit.png" /></a>
                <a href="#"><img src="/image/yt.png" /></a>
            </div>
        </div>
        <br>
    </div>

    <div class="footer-credit">
        <div class="container" align="center">
            <label>&copy; 2024 by Forhad Islam Rony</label>
        </div>
    </div>
</div>
@if (!Session::has('userId'))
    <x-login />
@endif
