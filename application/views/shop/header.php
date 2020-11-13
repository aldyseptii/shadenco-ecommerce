<?php
if(!isset($pagetitle)) {
    $pagetitle = $this->shop_setting->sitename();
}

$this->visitor->hit();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title><?=$pagetitle;?></title>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="<?=$this->shop_setting->description();?>" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link href="<?=base_url("assets/moonstore/ms01");?>/image/favicon.png" rel="icon" type="image/png" >
<link href="<?=base_url("assets/moonstore/ms01");?>/css/bootstrap.min.css" rel="stylesheet" media="screen" />
<link href="<?=base_url("assets/moonstore/ms01");?>/javascript/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css" />
<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet"/>
<link href="<?=base_url("assets/moonstore/ms01");?>/css/stylesheet.css" rel="stylesheet">
<link href="<?=base_url("assets/moonstore/ms01");?>/css/responsive.css" rel="stylesheet">
<link href="<?=base_url("assets/moonstore/ms01");?>/javascript/owl-carousel/owl.carousel.css" type="text/css" rel="stylesheet" media="screen" />
<link href="<?=base_url("assets/moonstore/ms01");?>/javascript/owl-carousel/owl.transitions.css" type="text/css" rel="stylesheet" media="screen" />
<link rel="stylesheet" href="<?= base_url(); ?>assets/adminlte/plugins/sweetalert2/sweetalert2.min.css">
    <link rel="stylesheet"
          href="<?= base_url(); ?>assets/adminlte/plugins/pace-progress/themes/black/pace-theme-flash.css">
    <script type="text/javascript"
            src="<?= base_url("assets/moonstore/ms01"); ?>/javascript/jquery-2.1.1.min.js"></script>
    <!--<script type="text/javascript" src="-->
    <? //=base_url("assets/moonstore/ms01");?><!--/javascript/jquery-ui.min.js" ></script>-->
    <script type="text/javascript"
            src="<?= base_url("assets/moonstore/ms01"); ?>/javascript/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript"
            src="<?= base_url("assets/moonstore/ms01"); ?>/javascript/template_js/jstree.min.js"></script>
    <script type="text/javascript"
            src="<?= base_url("assets/moonstore/ms01"); ?>/javascript/template_js/template.js"></script>
    <script type="text/javascript" src="<?= base_url("assets/moonstore/ms01"); ?>/javascript/common.js"></script>
    <script type="text/javascript" src="<?= base_url("assets/moonstore/ms01"); ?>/javascript/global.js"></script>
    <script type="text/javascript"
            src="<?= base_url("assets/moonstore/ms01"); ?>/javascript/owl-carousel/owl.carousel.min.js"></script>
    <?php if ($this->uri->segment(1) == 'product' && !empty($this->uri->segment(1))) { ?>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.css" rel="stylesheet"
              type="text/css"/>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/elevatezoom/3.0.8/jquery.elevatezoom.min.js"></script>
    <?php } ?>
    <script>
        paceOptions = {
            restartOnRequestAfter: 5,
            ajax: {
                trackMethods: ['GET', 'POST', 'PUT', 'DELETE', 'REMOVE']
            }
        }
    </script>
    <script src="<?= base_url(); ?>assets/adminlte/plugins/pace-progress/pace.min.js"></script>

    <style>.table-bordered, .table-bordered th, .table-bordered td {
            border-color: #aaa !important
        }

        .cartul li {
            list-style: none
        }

        .swal2-popup {
            font-size: 1.6rem !important;
        }

        .courier-item {
            position: relative;
            display: inline-block;
            width: 100%
        }

        .courier-item .table {
            margin: 0
        }

        .courier-item .link {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: transparent
        }

        .courier-item .link:hover {
            border: 1px solid #3085d6 !important
        }

        .payment {
            padding: 9px;
            margin: 0;
            border: 1px solid #aaa
        }

        .payment-cell {
            margin: 9px 0;
            padding: 9px 5px;
            border-bottom: 1px dashed #ddd
        }

        .payment-cell:last-child {
            border: none
        }

        .payment-cell span {
            color: #000;
            font-size: 15px;
            word-wrap: break-word
        }

        .lds-dual-ring {
            display: inline-block;
            width: 80px;
            height: 80px;
        }

        .lds-dual-ring:after {
            content: " ";
            display: block;
            width: 64px;
            height: 64px;
            margin: 8px;
            border-radius: 50%;
            border: 6px solid #cef;
            border-color: #cef transparent #cef transparent;
            animation: lds-dual-ring 1.2s linear infinite;
        }

        @keyframes lds-dual-ring {
            0% {
                transform: rotate(0deg);
            }
            100% {
                transform: rotate(360deg);
            }
        }

        #review-list {
            margin-bottom: 22px;
        }

        .review-wrapper {
            border: 1px solid #aaa;
            margin: 12px 0;
            padding: 5px;
        }

        .review-head {
            background: #FFF;
            margin: 0;
            padding: 12px;
            border-bottom: 1px solid #aaa;
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap
        }

        .review-head .name {
            display: block;
            font-size: 16px;
            color: #333
        }

        .review-body {
            margin: 0;
            padding: 12px
        }</style>
    <style>
        body {
            height: 100%;
        }

        html {
            min-height: 100%;
        }

        body {
            height: 100%;
        }

        #wrapper {
            width: 100%;
            display: block;
            margin: 0px;
            position: relative;
        }

        .header {
            display: block;
            background-color: #f1f1f1;
        }

        .topnav {
            display: block;
        }

        .topnav li {
            margin: 0px 6px;
        }

        .header .topnav li a {
            color: #000;
            font-size: 13px;
            padding: 3px 3px;
            font-weight: 200;
        }

        .followUs a {
            float: left;
        }

        #wrapper .logo {
            max-width: 160px;
            padding: 8px 10px;
            height: auto;
            border-radius: 5px;
        }

        .logo img {
            width: 100%;
        }

        #wrapper .menubar {
            display: block;
            margin: 0px;
            min-height: inherit;
            z-index: 9;
            -webkit-transition: all 0.5s ease 0s;
            -moz-transition: all 0.5s ease 0s;
            -o-transition: all 0.5s ease 0s;
            transition: all 0.5s ease 0s;
            background-color: transparent;
        }

        #wrapper .menubar.navbar-fixed-top {
            /*top: 30px;*/
            background: white;
        }

        #wrapper .menubar:hover {
            background-color: #fff;
            box-shadow: 0 1px 5px rgba(0, 0, 0, .05);
        }

        #wrapper .meffect {
            background-color: #fff;
            box-shadow: 0 1px 5px rgba(0, 0, 0, .05);
        }

        .header .menubar li a {
            color: #000;
            font-size: 13px;
            line-height: 37px;
            padding: 10px 15px;
        }

        .header .menubar li a:hover {
            background-color: transparent;
            color: #252525;
        }

        .header .menubar li a:focus {
            background-color: transparent;
        }

        .header .menubar .mega-dropdown:hover .dropdown-toggle {
            background-color: #252525;
            color: #fff;
        }

        #wrapper .rightmenu {
            margin-left: 15px;
        }

        #wrapper .rightmenu li {
            margin: 0px 10px;
        }

        #wrapper .rightmenu li a {
            display: table;
            position: relative;
            padding: 9px 0px;
        }

        #wrapper .rightmenu li a span {
            width: 40px;
            height: 40px;
            padding: 0px;
            /* line-height: 40px;*/
            display: table-cell;
            vertical-align: middle;
            text-align: center;
            color: #000;
            /*border: 1px solid #e5e5e5;*/
            border-radius: 50%;
        }

        #wrapper .rightmenu a span.cart-count {
            font-size: 10px;
            color: #fff;
            background: #e6281a;
            width: 20px;
            height: 20px;
            line-height: 20px;
            text-align: center;
            border: 0px;
            position: absolute;
            top: 17px;
            right: -5px;
        }

        #wrapper .rightmenu .dropdown-menu {
            min-width: auto;
            margin: 0px;
            padding: 0px;
        }

        #wrapper .rightmenu .dropdown li {
            margin: 0px;
        }

        #wrapper .rightmenu .dropdown li a {
            padding: 9px 10px;
            line-height: normal;
            width: 100%;
            border-bottom: solid 1px #eee;
        }

        #wrapper .rightmenu .dropdown li a:hover {
            background-color: #252525;
            color: #fff;
        }

        .menubar li.dropdown:hover > .dropdown-menu {
            display: block;
        }

        #wrapper .mega-dropdown {
            position: static !important;
        }

        #wrapper .mega-dropdown-menu {
            padding: 10px 0px;
            background-color: #f7f5fb;
            width: 100%;
            text-align: center;
            border-bottom: none;
            box-shadow: 0px 8px 10px -6px #ababab;
            -webkit-box-shadow: 0px 8px 15px -10px #ababab;
        }

        .mega-dropdown-menu > li.col-sm-3 {
            width: 20%;
        }

        .mega-dropdown-menu > li > ul {
            padding: 0;
            margin: 0;
        }

        .mega-dropdown-menu > li > ul > li {
            list-style: none;
            border-bottom: dashed 1px #ebebeb;
        }

        #wrapper .mega-dropdown-menu > li > ul > li > a {
            color: #222;
            font-size: 12px;
            padding: 0px 0px;
            line-height: 34px;
            letter-spacing: 0.6px;
        }

        #wrapper .mega-dropdown-menu > li ul > li > a:hover,
        #wrapper .mega-dropdown-menu > li ul > li > a:focus {
            text-decoration: none;
            color: #252525;
        }

        .mega-dropdown-menu .dropdown-header {
            font-size: 15px;
            color: #000;
            padding: 0px;
            line-height: 30px;
        }

        .carousel-control {
            width: 30px;
            height: 30px;
            top: -35px;

        }

        .left.carousel-control {
            right: 30px;
            left: inherit;
        }

        .carousel-control .glyphicon-chevron-left,
        .carousel-control .glyphicon-chevron-right {
            font-size: 12px;
            background-color: #fff;
            line-height: 30px;
            text-shadow: none;
            color: #333;
            border: 1px solid #ddd;
        }

        .sidenav {
            height: 100%;
            width: 0;
            position: fixed;
            z-index: 999;
            top: 0;
            right: 0;
            background-color: #f6f6f6;
            overflow-x: hidden;
            transition: 0.5s;
            padding-top: 40px;
            -webkit-box-shadow: 5px 0px 15px 5px rgba(131, 201, 194, 0.2);
            -moz-box-shadow: 5px 0px 15px 5px rgba(131, 201, 194, 0.2);
            box-shadow: 5px 0px 15px 5px rgba(131, 201, 194, 0.2);
        }

        .sidenav a {
            padding: 8px 8px 0px 0px;
            text-decoration: none;
            font-size: 20px;
            color: #333;
            display: block;
            transition: 0.3s
        }

        .sidenav a:hover, .offcanvas a:focus {
            color: #000;
        }

        .sidenav .closebtn {
            position: absolute;
            top: -7px;
            right: 25px;
            font-size: 36px;
            margin-left: 50px;
        }

        @media screen and (max-height: 450px) {
            .sidenav {
                padding-top: 15px;
            }

            .sidenav a {
                font-size: 18px;
            }
        }

        .sidemenu {
            padding: 10px 17%;
            display: block;
            position: relative;
            overflow-x: auto;
        }

        .sidemenu .hdwel {
            font-size: 24px;
            margin-bottom: 30px;
            font-weight: 200;
        }

        .sidenav .navbar-nav {
            width: 100%;
            border-bottom: dashed 1px #b159a4;
            padding-bottom: 15px;
            margin-bottom: 15px;
        }

        .sidenav .navbar-nav li {
            width: 100%;
        }

        .sidenav .navbar-nav li a {
            width: 100%;
            display: block;
            font-size: 14px;
            padding: 7px 15px;
            text-transform: uppercase;
        }

        .sidenav .navbar-nav li a:hover {
            color: #000;
        }

        .sidenav .navbar-nav .open .dropdown-menu {
            position: static;
            float: none;
            width: auto;
            margin-top: 0;
            background-color: transparent;
            border: 0;
            -webkit-box-shadow: none;
            box-shadow: none;
        }

        #wrapper .nav2 li a {
            text-transform: uppercase;
            font-size: 14px;
            color: #111;
        }

        #wrapper .nav2 li .fa {
            color: #b159a4;
        }

        .follnav li .fa {
            color: #b159a4;
            font-size: 24px;
            transition: all 0.5s;
        }

        .follnav li .fa:hover {
            -moz-transform: scale(1.4);
            -o-transform: scale(1.4);
            -ms-transform: scale(1.4);
            -webkit-transform: scale(1.4);
            transform: scale(1.4);
        }

        .sidenav2 {
            height: 100%;
            width: 0;
            position: fixed;
            z-index: 999;
            top: 0;
            right: 0;
            background-color: #f6f6f6;
            overflow-x: hidden;
            transition: 0.5s;
            padding-top: 40px;
            -webkit-box-shadow: 5px 0px 15px 5px rgba(131, 201, 194, 0.2);
            -moz-box-shadow: 5px 0px 15px 5px rgba(131, 201, 194, 0.2);
            box-shadow: 5px 0px 15px 5px rgba(131, 201, 194, 0.2);
        }

        .sidenav2 a {
            padding: 1px 8px 0px 0px;
            text-decoration: none;
            font-size: 25px;
            color: #333;
            display: block;
            transition: 0.3s
        }

        .sidenav2 a:hover, .offcanvas a:focus {
            color: #000;
        }

        .sidenav2 .closebtn {
            position: absolute;
            top: 0;
            right: 25px;
            font-size: 36px;
            margin-left: 50px;
        }

        @media screen and (max-height: 450px) {
            .sidenav2 {
                padding-top: 15px;
            }

            .sidenav2 a {
                font-size: 18px;
            }
        }


        .inputserch {
            width: 100%;
            margin: 0px;
            display: block;
            position: relative;
        }

        .inputserch .form-control {
            border: none;
            height: 45px;
            padding-right: 45px;
            border-radius: 0px;
            background-color: transparent;
            box-shadow: none;
            border-bottom: solid 2px #addedc;
        }

        .inputserch .input-group-addon {
            margin: 0px;
            padding: 0px;
            border: none;
            background-color: transparent;
        }

        .inputserch .input-group-addon .btn {
            width: 55px;
            height: 45px;
            border: none;
            background-color: transparent;
            position: absolute;
            right: 0;
            z-index: 99;
            top: 0;
        }

        .listitem {
            width: 100%;
            margin: 20px 0px 0px;
            display: block;
        }

        .listitem li {
            width: 100%;
            display: block;
            float: left;
            margin-bottom: 15px;
        }

        .listitem img {
            width: 55px;
            height: auto;
            margin: 0px 10px 10px 0px;
            float: left;
        }

        #wrapper .listitem .ttbox p {
            font-size: 13.5px;
            color: #000;
            margin: 0px 0px 3px;
        }

        #wrapper .listitem .ttbox span {
            color: #000;
            font-size: 13px;
        }


        .sliderpanel {
            width: 100%;
            height: 100%;
            display: block;
        }

        .myslider {
            display: block;
            height: 100%;
        }

        .myslider .item {
            height: 100vh;
            min-height: 300px;
            background: no-repeat center center scroll;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
            background-position: top;
        }

        .myslider .carousel-control {
            position: absolute;
            top: 40%;
            width: 40px;
            height: 40px;
            margin-top: -20px;
            font-size: 30px;
            font-weight: 100;
            line-height: 30px;
            color: #ffffff;
            text-align: center;
            background: #222222;
            border: 3px solid #ffffff;
            -webkit-border-radius: 23px;
            -moz-border-radius: 23px;
            border-radius: 23px;
            opacity: 0.5;
            filter: alpha(opacity=50);
        }

        .myslider .carousel-control.left {
            left: 10px
        }

        .myslider .carousel-control.right {
            right: 10px
        }

        .dropdown-menu {
            position: absolute;
            top: 100%;
            left: 0;
            z-index: 1000;
            display: none;
            float: left;
            min-width: 160px;
            padding: 5px 0;
            margin: 11px 0 0;
            list-style: none;
            background-color: #9e9e9e;
        }
    </style>
    <script>
        /*===================================

    scrollTop  menu effects

  ===================================*/

        $(window).scroll(function () {
            if ($(window).scrollTop() > 100) {
                $(".menubar").addClass('meffect');
            } else {
                $(".menubar").removeClass('meffect');
            }
        });


        function openNav2() {
            document.getElementById("rightside").style.width = "450px";
            document.body.style.backgroundColor = "#00000036";
        }

        function closeNav2() {
            document.getElementById("rightside").style.width = "0";
            document.body.style.backgroundColor = "white";
        }


        /*===================================

            megadropdown menu

          ===================================*/
        $(function () {
            $('.dropdown').hover(function () {
                    $(this).addClass('open');
                },
                function () {
                    $(this).removeClass('open');
                });
        });

    </script>
</head>
<body class="index">
<div id="wrapper" style="margin-bottom: 12%;">

    <header class="header navbar-fixed-top" style="background-color: #525659;">
        <div class="container pt-5" style="display: none;">
            <ul class="nav navbar-nav navbar-right topnav hidden">
                <li class="followUs">
                    <a href="#"><i class="fa fa-facebook fa-fw"></i></a>
                    <a href="#"><i class="fa fa-twitter fa-fw"></i></a>
                    <a href="#"><i class="fa fa-google-plus fa-fw"></i></a>
                    <a href="#"><i class="fa fa-youtube fa-fw"></i></a>
                </li>
                <li class="active"><a href="callto:9999999999"><i class="fa fa-phone fa-fw"></i> +91 9999999999</a></li>
                <li class="active"><a href="mailto:info@Aditya.com"><i class="fa fa-envelope fa-fw"></i> info@bloom.com</a>
                </li>
            </ul>
        </div><!-- end of container -->

        <nav class="navbar menubar navbar-fixed-top">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
                        <span class="sr-only"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                </div>
                <!-- Collection of nav links, forms, and other content for toggling -->

                <ul class="nav navbar-nav navbar-left">
                    <a href="#" class="navbar-brand logo"><img src="<?= base_url("assets"); ?>/logo.png"
                                                               style="min-width: 124px;max-width: 73px;"
                                                               title="<?= $this->shop_setting->sitename(); ?>"
                                                               alt="<?= $this->shop_setting->sitename(); ?>"
                                                               class="img-responsive"/></a>
                </ul>
                <ul class="nav navbar-nav navbar-right rightmenu mt-4">
                    <li><a href="<?= base_url("cart"); ?>"><span><i
                                    class="fa fa-shopping-cart"></i></span><span class="cart-count"
                                                                                 id="cart_count"><?= count($cart['data']); ?></span></a>
                    </li>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" type="button" data-toggle="dropdown"><span><i
                                    class="fa fa-user"></i></span></a>
                        <ul class="dropdown-menu">
                            <!--                            <li><a href="#">Login</a></li>-->
                            <!--                            <li><a href="#">Register</a></li>-->
                        </ul>
                    </li>
                    <li><a href="#" onclick="openNav2()"><span><i class="fa fa-search"></i></span></a></li>
                </ul>

                <div id="navbarCollapse" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right mt-4">
                        <li class="active"><a href="https://www.shadenco.co.id/">Home</a></li>
                        <li class="dropdown">
                            <a href="<?= base_url('catalog') ?>">
                                <div class="dropdown-toggle" data-toggle="dropdown"
                                     onclick="window.location=('<?= base_url('catalog') ?>')">Kategori
                                </div>
                            </a>
                            <ul class="dropdown-menu">

                                <?php
                                foreach ($categories as $category) {
                                    ?>

                                    <li>
                                        <a href="<?= base_url("category/$category->id_category-" . $this->toolset->tourl($category->name_category)); ?>"><?= $category->name_category; ?></a>
                                    </li>

                                    <?php
                                }
                                ?>

                            </ul>
                        </li> <?php
                        foreach ($pages as $page) {
                            ?>

                            <li><a href="<?= base_url("page/$page->url_page"); ?>"><?= $page->title_page; ?></a></li>

                        <?php } ?>
                        <li><a href="<?= base_url('tracking'); ?>" title="Status Pesanan">Status Pemesanan</a></li>
                    </ul>
                </div>
            </div><!-- end of container -->
        </nav>
        <div class="header-top navbar-fixed-top" style="top: 80px;background: #252525;border-bottom: 0;z-index: 0;">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 my-5">

                    </div>
                </div>
            </div>
        </div>
        <div id="rightside" class="sidenav2">
            <div class="sidemenu">
                <div class="hdwel light">
                    SEARCH
                    <a href="javascript:void(0)" class="closebtn" onclick="closeNav2()">×</a>
                </div><!-- end of hdwel -->

                <div class="input-group inputserch">
                    <form action="<?= base_url('search'); ?>" method="get">
                        <input name="q" value="<?php if (isset($q)) echo $q; ?>" type="text" class="form-control"
                               placeholder="Search">
                        <span class="input-group-addon">
                          <button type="submit" class="btn btn-default">
                              <span class="fa fa-search text-dark"></span>
                          </button>
                      </span>
                    </form>
                </div>
                <br/>

                <div class="clear"></div>
                <br/>
            </div><!-- end of sidemenu -->
        </div><!-- end of sidenav2 -->

    </header><!-- end of header -->

</div><!-- end of wrapper -->
