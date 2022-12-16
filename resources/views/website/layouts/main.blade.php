@inject("mainDataService", "App\Http\Services\MainDataService")
    <!DOCTYPE html>
<html lang="zxx">
<head>
    <title>@yield("title")</title>
    <meta charset="UTF-8">
    <meta name="description" content="Industry.INC HTML Template">
    <meta name="keywords" content="industry, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Favicon -->
    <link href="{{ asset("img/favicon.ico") }}" rel="shortcut icon"/>

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i&display=swap"
          rel="stylesheet">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{ asset("css/bootstrap.min.css") }}"/>
    <link rel="stylesheet" href="{{ asset("css/font-awesome.min.css") }}"/>
    <link rel="stylesheet" href="{{ asset("css/magnific-popup.css") }}"/>
    <link rel="stylesheet" href="{{ asset("css/slicknav.min.css") }}"/>
    <link rel="stylesheet" href="{{ asset("css/owl.carousel.min.css") }}"/>

    <!-- Main Stylesheets -->
    <link rel="stylesheet" href="{{ asset("css/style.css") }}"/>


    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>
<!-- Page Preloder -->
<div id="preloder">
    <div class="loader"></div>
</div>

<!-- Header section  -->
<x-website.header :mainData="$mainDataService"></x-website.header>
<!-- Header section end  -->

<x-website.top></x-website.top>

@yield("content")


<!-- Footer section -->
<x-website.footer :mainData="$mainDataService"></x-website.footer>
<!-- Footer section end -->

<!--====== Javascripts & Jquery ======-->
<script src="js/website/jquery-3.2.1.min.js"></script>
<script src="js/website/bootstrap.min.js"></script>
<script src="js/website/jquery.slicknav.min.js"></script>
<script src="js/website/owl.carousel.min.js"></script>
<script src="js/website/circle-progress.min.js"></script>
<script src="js/website/jquery.magnific-popup.min.js"></script>
<script src="js/website/main.js"></script>

</body>
</html>
