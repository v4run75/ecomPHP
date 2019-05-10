<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Cross Apps</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="https://ecomwebpulse.000webhostapp.com/images/favicon.ico" type="image/x-icon">
    <link rel="icon" href="https://ecomwebpulse.000webhostapp.com/images/favicon.ico" type="image/x-icon">
</head>
<body>

<link rel="stylesheet" type="text/css" href="https://ecomwebpulse.000webhostapp.com/css/style.css">
<link rel="stylesheet" type="text/css" href="https://ecomwebpulse.000webhostapp.com/css/font-awesome.min.css">

<header>
    <div id="logo">
        <a href="#">
        <img src="https://ecomwebpulse.000webhostapp.com/images/logo.png" alt="logo" width="50" height="50" >
        </a>
    </div>
    <nav id="main-nav">
        <i class="fa fa-bars" aria-hidden="true"></i>
        <ul>
            <a class="active" href="#home"> <li> Home</li></a>
            <a href="#about"><li>Webpulse</li></a>
            <a href="#pathprahari"><li>Pathprahari</li></a>
            <a href="#contact"><li>Contact</li></a>
        </ul>
    </nav>
</header>

<section id="home">
    <hr>
    <h1>Cross Apps</h1>
    <h2>Android App Development</h2>
</section>

<section id="about">
    <hr>
<div id="content">
    <h1>Webpulse Crm</h1>
    <h2>This App is designed with focus to help employees manage customer relationship better.</h2>
</div>

<div id="image">
      <img src="https://ecomwebpulse.000webhostapp.com/images/crm_resize.png" alt="Cover">
</div>


</section>


<section id="contact">
    <h3>Contact</h3>
    <hr>

    <form method="post">
        <input class="input_text" type="text" tabindex="1" placeholder="Name" name = "name" required><br>
        <input class="input_text" type="text" tabindex="2" placeholder="Contact" name = "contact" required><br>
        <input class="input_text" type="email" tabindex="3" placeholder="Email" name = "email" required><br>
        <input class="button" type="submit">
    </form>

<!--{% if messages %}-->
<!--<ul class="messages" >-->
<!--    {% for message in messages %}-->
<!--    <li style="font-size:40px;font-family:'Roboto',sans-serif; font-weight:500; color:#494949;">{{ message }}</li>-->
<!--    {% endfor %}-->
<!--</ul>-->
<!--{% endif %}-->

</section>

<footer>
    <p>&copy 2019 Cross Apps</p>
</footer>

<script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
<script src="https://ecomwebpulse.000webhostapp.com/js/mobile-menu.js"/>
</body>
</html>
