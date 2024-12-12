<!DOCTYPE html>

<head lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>FloodPrediction</title>
        <style>
            @media only screen and (min-width: 501px) {

                body {
                    font-family: poppins;
                    background-color: #2b2b2b;

                }

                .topbar {
                    display: flex;
                    justify-content: space-between;
                    align-items: center;
                    color: white;
                }

                .logo {
                    order: 1;
                    margin-left: 55px;
                }

                .auth {
                    order: 2;
                    color: white;
                    display: flex;
                    margin-right: 100px;
                }


                .auth a {
                    text-decoration: none;


                }

                .auth p {

                    color: white;

                }

                .signup {
                    font-family: poppins;
                    padding: 12px 40px;
                    border: 0px;
                    margin-left: 40px;
                    border-radius: 14px;
                    background-color: #bfaff2;
                    color: #575365;

                }

                .getstarted {

                    font-family: poppins;
                    padding: 12px 40px;
                    border: 0px;
                    border-radius: 14px;
                    background-color: #f8d57e;

                }


                .welcome {
                    width: 1280px;
                    height: auto;
                    background-color: #2b2b2b;
                    display: flex;
                    margin-left: 120px;
                    margin-top: 70px;
                }



                .words {
                    width: 600px;
                    margin-right: 80px;
                    background-color: #2b2b2b;
                    height: 471px;

                }

                .picture1 {
                    width: 600px;
                    background-color: #2b2b2b;
                    height: 471px;

                }

                .picture1 p {
                    width: 600px;
                    background-color: #2b2b2b;
                    height: 471px;

                }

                .words h1 {

                    font-size: 67px;
                    line-height: 23px;
                    color: white;

                }

                .words .p1 {

                    font-size: 18px;
                    line-height: 11px;
                    color: grey;

                }

                .w1 {

                    margin-top: 70px;
                }

                .w2 {
                    margin-top: 75px;
                    margin-bottom: 44px;
                }

                .picture1 img {
                    max-width: 100%;
                    max-height: 100%;
                    width: auto;
                    height: auto;
                }

                .strip {
                    width: 1280px;
                    margin-left: 100px;

                }

                .strip img {
                    width: 1280px;
                    height: 200px;
                }

                .solo {
                    background-color: #fdf5df;
                    margin-left: 100px;
                    width: 1280px;
                    margin-top: 100px;
                    text-align: center;
                }

                .solo img {

                    width: 1190px;
                    margin-bottom: -7px;
                }

                .container {
                    width: 1280px;
                    margin-left: 100px;
                    display: flex;
                    margin-top: 100px;
                }

                .part {
                    flex: 1;
                    padding: 20px;
                    display: flex;
                    flex-direction: column;
                    align-items: center;
                    text-align: center;
                    border: 55px solid #2b2b2b;
                }

                .part img {
                    max-width: 100%;
                    height: auto;
                    margin-bottom: 10px;
                }

                .part p {
                    font-size: 18px;
                    color: grey;

                }

                .part h2 {
                    font-size: 18px;
                    color: white;

                }

                .review {
                    background-color: #2b2b2b;
                    margin-left: 100px;
                    width: 1280px;
                    margin-top: 100px;
                    text-align: center;
                }

                .review img {

                    width: 1280px;

                }

                hr {
                    background-color: grey;
                    width: 1280px;
                    height: 0.5px;
                }


                .end-container {
                    width: 1280px;
                    margin-left: 100px;
                    display: flex;
                }

                .end-left {
                    flex: 1;
                    padding: 20px;
                }

                .end-right {
                    flex: 1;
                    padding: 50px;
                    margin-left: 200px;
                }

                .end-left h1 {
                    margin-bottom: 25px;
                    color: white;
                }

                .end-left ul {
                    list-style: none;
                    padding: 0;
                    margin: 0;
                    display: flex;
                    flex-direction: row;
                }

                .end-left ul li {
                    margin-right: 22px;
                    width: 118px;
                }

                .end-left ul li a {
                    text-decoration: none;
                    color: white;
                }

                .end-right input[type="email"] {
                    width: 200px;
                    padding: 5px;
                    margin-right: 10px;
                    border-radius: 10px;
                    font-family: poppins;
                    background-color: #333333;
                    color: grey;
                    border: 0px;

                }


                .end-right button {
                    font-family: poppins;
                    padding: 8px 40px;
                    margin-left: 7px;
                    border: 0px;
                    border-radius: 14px;
                    background-color: #bfaff2;
                    color: #575365;
                }

                .end-right p {

                    color: white;
                }

            }











            @media only screen and (max-width: 500px) {

                .logo h1 {
                    font-size: 20px;
                }

                body {
                    font-family: poppins;
                    background-color: #2b2b2b;

                }

                .topbar {
                    display: flex;
                    justify-content: space-between;
                    align-items: center;
                    color: white;
                }

                .logo {
                    order: 1;

                }

                .auth {
                    order: 2;
                    color: white;
                    display: flex;
                    margin-right: -1px;
                }


                .auth a {
                    text-decoration: none;
                }

                .auth p {
                    color: white;
                    font-size: 15px;
                }

                .signup {
                    font-family: poppins;
                    padding: 6px 21px;
                    font-size: 12px;
                    margin-top: 14px;
                    border: 0px;
                    margin-left: 40px;
                    border-radius: 14px;
                    background-color: #bfaff2;
                    color: #575365;

                }

                .getstarted {

                    font-family: poppins;
                    padding: 7px 12px;
                    border: 0px;
                    border-radius: 14px;
                    background-color: #f8d57e;

                }


                .welcome {
                    width: 500px;
                    margin-left: -2px;
                    margin-top: 32px;
                    height: auto;
                    background-color: #2b2b2b;


                }



                .words {

                    width: 400px;
                    margin-left: 30px;
                    height: 226px;
                    text-align: center;
                    background-color: #2b2b2b;

                }

                .picture1 {

                    width: 400px;
                    height: 260px;
                    background-color: #2b2b2b;

                }

                .picture1 p {
                    width: 600px;
                    background-color: #2b2b2b;
                    height: 471px;

                }

                .words h1 {

                    font-size: 20px;
                    line-height: 23px;
                    color: white;

                }

                .words .p1 {

                    font-size: 11px;
                    line-height: 11px;
                    color: grey;

                }


                .w2 {

                    margin-bottom: 20px;
                }

                .picture1 img {
                    max-width: 100%;
                    max-height: 100%;
                    width: auto;
                    height: auto;
                    margin-left: 80px;
                }

                .strip {
                    width: 500px;
                    margin-left: -5px;
                    margin-top: -62px;
                }



                .strip img {
                    width: 500px;
                }

                .solo {
                    background-color: #fdf5df;
                    margin-left: -3px;
                    width: 1280px;
                    margin-top: 100px;
                    text-align: center;
                    width: 490px;
                }

                .solo img {

                    width: 400px;
                    margin-bottom: -7px;
                }

                .container {
                    width: 500px;
                    margin-top: 100px;
                }

                .part {
                    flex: 1;
                    padding: 0px;
                    display: flex;
                    flex-direction: column;
                    align-items: center;
                    text-align: center;
                    border: 55px solid #2b2b2b;
                }

                .part img {
                    max-width: 100%;
                    height: auto;
                    margin-bottom: 10px;
                }

                .part p {
                    font-size: 12px;
                    color: grey;

                }

                .part h2 {
                    font-size: 14px;
                    color: white;

                }

                .review {
                    background-color: #2b2b2b;
                    margin-left: -4px;
                    width: 500px;
                    margin-top: 45px;
                    margin-bottom: 100px;
                    text-align: center;
                }

                .review img {

                    width: 500px;
                    margin-left: -8px;
                }

                hr {
                    background-color: grey;
                    width: 500px;
                    margin-top: 100px;
                    height: 0.5px;
                }


                .end-container {
                    width: 500px;

                }

                .end-left {
                    flex: 1;
                    padding: 0px;
                }

                .end-right {
                    flex: 1;
                    margin-top: 41px;
                }

                .end-left h1 {
                    margin-bottom: 13px;
                    color: white;
                    font-size: 18px;
                }

                .end-left ul {
                    list-style: none;
                    padding: 0;
                    margin: 0;
                    display: flex;
                    flex-direction: row;
                }

                .end-left ul li {
                    width: 118px;
                    margin-right: -15px;
                }

                .end-left ul li a {
                    text-decoration: none;
                    color: white;
                    font-size: 11px;
                }

                .end-right input[type="email"] {
                    width: 200px;
                    padding: 7px;
                    font-size: 10px;
                    margin-right: 10px;
                    border-radius: 10px;
                    font-family: poppins;
                    background-color: #333333;
                    color: grey;
                    border: 0px;

                }


                .end-right button {
                    font-family: poppins;
                    padding: 8px 40px;
                    margin-left: 7px;
                    border: 0px;
                    border-radius: 14px;
                    background-color: #bfaff2;
                    color: #575365;
                    font-size: 10px;
                }

                .end-right p {
                    font-size: 11px;
                    color: white;
                }
            }
        </style>
    </head>

<body>

    <div class="topbar">

        <div class="logo">
            <h1>Nairobi Flood Prediction</h1>
        </div>

        <div class="auth">
            @if (Route::has('login'))
                @auth
                    <!-- Dashboard link for authenticated users -->
                    <a href="{{ url('/home') }}" class="signup">
                        <p>Dashboard</p>
                    </a>
                @else
                    <!-- Register Link with <p> tag -->
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">
                            <p>Sign up</p>
                        </a>
                    @endif

                    <!-- Login Link as a button -->
                    <a href="{{ route('login') }}">
                        <button class="signup">Log in</button>
                    </a>
                @endauth
            @endif
        </div>



    </div>


    <div class="welcome">
        <div class="words">
            <div class="w1">
                <h1>Predict Floods</h1>
                <h1>in Nairobi, Kenya</h1>
            </div>

            <div class="w2">
                <p class="p1">Check your location to discover</p>
                <p class="p1"> the level of safety</p>
            </div>

            <a href="{{ route('register') }}"><button class="getstarted">Get started</button></a>
        </div>

        <div class="picture1">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15977.900365396263!2d36.817223!3d-1.286389!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x182f12fd8d9a9c67%3A0x503c1b1aa0e3a5e1!2sNairobi!5e0!3m2!1sen!2suk!4v1632160284886!5m2!1sen!2suk"
                width="600" height="300" frameborder="0" style="border:0" allowfullscreen>
            </iframe>
            <p>
                &copy; <a href="https://www.google.com/intl/en_US/help/terms_maps.html" target="_blank">Google</a>
            </p>
        </div>

    </div>

  <!--
<div class="strip">
    <img src="strip.png">
</div>
-->
</body>

</html>