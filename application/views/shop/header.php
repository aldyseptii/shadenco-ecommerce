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
<!--<link href="--><?//=base_url("assets/moonstore/ms01");?><!--/css/jquery-ui.min.css" rel="stylesheet">-->
<link href="<?=base_url("assets/moonstore/ms01");?>/javascript/owl-carousel/owl.carousel.css" type="text/css" rel="stylesheet" media="screen" />
<link href="<?=base_url("assets/moonstore/ms01");?>/javascript/owl-carousel/owl.transitions.css" type="text/css" rel="stylesheet" media="screen" />
<link rel="stylesheet" href="<?=base_url();?>assets/adminlte/plugins/sweetalert2/sweetalert2.min.css">
<link rel="stylesheet" href="<?=base_url();?>assets/adminlte/plugins/pace-progress/themes/black/pace-theme-flash.css">

<script type="text/javascript" src="<?=base_url("assets/moonstore/ms01");?>/javascript/jquery-2.1.1.min.js" ></script>
<!--<script type="text/javascript" src="--><?//=base_url("assets/moonstore/ms01");?><!--/javascript/jquery-ui.min.js" ></script>-->
<script type="text/javascript" src="<?=base_url("assets/moonstore/ms01");?>/javascript/bootstrap/js/bootstrap.min.js" ></script>
<script type="text/javascript" src="<?=base_url("assets/moonstore/ms01");?>/javascript/template_js/jstree.min.js"></script>
<script type="text/javascript" src="<?=base_url("assets/moonstore/ms01");?>/javascript/template_js/template.js" ></script>
<script type="text/javascript" src="<?=base_url("assets/moonstore/ms01");?>/javascript/common.js" ></script>
<script type="text/javascript" src="<?=base_url("assets/moonstore/ms01");?>/javascript/global.js" ></script>
<script type="text/javascript" src="<?=base_url("assets/moonstore/ms01");?>/javascript/owl-carousel/owl.carousel.min.js" ></script>
<script>
    paceOptions = {
    restartOnRequestAfter: 5,
    ajax: {
      trackMethods: ['GET', 'POST', 'PUT', 'DELETE', 'REMOVE']
    }
  }
</script>
<script src="<?=base_url();?>assets/adminlte/plugins/pace-progress/pace.min.js"></script>

<style>.table-bordered,.table-bordered th,.table-bordered td {border-color:#aaa!important} .cartul li {list-style:none} .swal2-popup { font-size: 1.6rem !important; } .courier-item {position:relative;display:inline-block;width:100%} .courier-item .table {margin:0} .courier-item .link {position:absolute;top:0;left:0;width:100%;height:100%;background:transparent} .courier-item .link:hover { border: 1px solid #3085d6!important } .payment {padding:9px;margin:0;border:1px solid #aaa} .payment-cell {margin:9px 0;padding:9px 5px;border-bottom:1px dashed #ddd} .payment-cell:last-child {border:none} .payment-cell span { color: #000;font-size:15px;word-wrap:break-word } .lds-dual-ring { display: inline-block;width: 80px;height: 80px; } .lds-dual-ring:after { content: " ";display: block;width: 64px;height: 64px;margin: 8px;border-radius: 50%;border:6px solid #cef;border-color: #cef transparent #cef transparent;animation: lds-dual-ring 1.2s linear infinite; } @keyframes lds-dual-ring {0% {transform: rotate(0deg);} 100% {
 transform: rotate(360deg); } } #review-list {margin-bottom:22px;} .review-wrapper {border:1px solid #aaa;margin:12px 0;padding:5px;} .review-head {background:#FFF;margin:0;padding: 12px;border-bottom:1px solid #aaa;display:flex;justify-content:space-between;flex-wrap:wrap} .review-head .name {display:block;font-size:16px;color:#333} .review-body {margin:0;padding: 12px}</style>

</head>
<body class="index">
<header>
<!--<div class="header-top">-->
<!--    <div class="container">-->
<!--      <div class="row">-->
<!--        <div class="col-sm-12">-->
<!--          <div class="top-right pull-right">-->
<!--              <ul class="header-social mt-2">-->
<!--                  <li>-->
<!--                      <a href="#" target="_blank"><i class="fa fa-facebook"></i></a>-->
<!--                  </li>-->
<!--                  <li>-->
<!--                      <a href="#" target="_blank"><i class="fa fa-twitter"></i></a>-->
<!--                  </li>-->
<!--                  <li>-->
<!--                      <a href="#" target="_blank"><i class="fa fa-google-plus"></i></a>-->
<!--                  </li>-->
<!--                  <li>-->
<!--                      <a href="#" target="_blank"><i class="fa fa-instagram"></i></a>-->
<!--                  </li>-->
<!--                  <li>-->
<!--                      <a href="#" target="_blank"><i class="fa fa-linkedin"></i></a>-->
<!--                  </li>-->
<!---->
<!--              </ul>-->
<!--          </div>-->
<!--        </div>-->
<!--      </div>-->
<!--    </div>-->
<!--  </div>-->
  <div class="container">
    <div class="header-inner">
      <div class="col-sm-3 col-xs-3 header-left">
        <div id="logo"> <a href="<?=base_url();?>"><img src="<?= base_url("assets"); ?>/logo.png" style="max-height:130px" title="<?=$this->shop_setting->sitename();?>" alt="<?=$this->shop_setting->sitename();?>" class="img-responsive" /></a> </div>
      </div>
      <div class="col-sm-9 col-xs-9 header-right">
        <div id="search" class="input-group">
          <form action="<?=base_url('search');?>" method="get">
          <input type="text" name="q" value="<?php if(isset($q)) echo $q;?>" placeholder="Cari Roller Blinds.." class="form-control input-lg" />
          <span class="input-group-btn">
          <button type="submit" class="btn btn-default btn-lg"><span>Cari</span></button>
          </span>
          </form>
        </div>
        <div id="cart" class="btn-group btn-block">
          <button type="button" class="btn btn-inverse btn-block btn-lg dropdown-toggle cart-dropdown-button"> <span id="cart-total"><span>Keranjang</span><br>
          <span class="crtitem"><?=count($cart['data']);?></span> item(s) - <span class="crttotal"><?=$this->toolset->rupiah($cart['total']);?></span></span></button>
          <ul class="dropdown-menu pull-right cart-dropdown-menu cartul">

            <?php foreach($cart['data'] as $crt) { ?>

                <li>
                    <table class="table table-striped" style="width:100%">
                        <tbody>
                        <tr>
                            <td class="text-center" style="width:15%"><a href="<?=$crt['photo'];?>"><img class="img-thumbnail" title="<?=$crt['name'];?>" alt="<?=$crt['name'];?>" src="<?=$crt['photo'];?>" style="max-width:30px"></a></td>
                            <td class="text-left" style="width:35%"><a href="<?=base_url("product/".$crt['id']."-".$this->toolset->tourl($crt['name']));?>"><?=$crt['name'];?></a></td>
                            <td class="text-right" style="width:20%">x <?=$crt['qty'];?></td>
                            <td class="text-right" style="width: 20%"><?=$this->toolset->rupiah($crt['sub']);?></td>
                            <td class="text-center" style="width: 10%"><button class="btn btn-danger btn-xs deletecart csrf" data-csrf="<?=$this->security->get_csrf_hash();?>" title="Remove" type="button" data-id="<?=$crt['id'];?>"><i class="fa fa-times"></i></button></td>
                        </tr>
                        </tbody>
                    </table>
                </li>

        <?php
          }
          if(count($cart['data']) < 1) {
        ?>

            <li style="text-align: center;margin-bottom: 12px" class="nullcart">Keranjang masih kosong</li>

          <?php } else { ?>

            <li>
              <div>
                <table class="table table-bordered">
                  <tbody>
                    <tr>
                      <td class="text-right"><strong>Total</strong></td>
                      <td class="text-right"><?=$this->toolset->rupiah($cart['total']);?></td>
                    </tr>
                  </tbody>
                </table>
                <p class="text-right"> <span class="btn-viewcart"><a href="<?=base_url("cart");?>"><strong><i class="fa fa-shopping-cart"></i> Lihat</strong></a></span> <span class="btn-checkout"><a href="<?=base_url("transaction/checkout");?>"><strong><i class="fa fa-share"></i> Checkout</strong></a></span> </p>
              </div>
            </li>

          <?php } ?>

          </ul>
        </div>
      </div>
    </div>
  </div>
</header>
<nav id="menu" class="navbar">
  <div class="nav-inner">
    <div class="navbar-header"><span id="category" class="visible-xs">Menu</span>
      <button type="button" class="btn btn-navbar navbar-toggle" ><i class="fa fa-bars"></i></button>
    </div>
    <div class="navbar-collapse">
      <ul class="main-navigation">
        <li><a href="<?=base_url();?>" class="parent">Home</a> </li>

        <li><a href="#" class="active parent">Kategori</a>
          <ul>

            <?php
            foreach($categories as $category) {
            ?>

            <li><a href="<?=base_url("category/$category->id_category-".$this->toolset->tourl($category->name_category));?>"><?=$category->name_category;?></a></li>

            <?php
            }
            ?>

          </ul>
        </li>
        <?php
        foreach($pages as $page) {
        ?>

        <li><a href="<?=base_url("page/$page->url_page");?>" class="parent"><?=$page->title_page;?></a> </li>

        <?php } ?>
          <li><a href="<?=base_url('tracking');?>" title="Status Pesanan">Status Pesanan</a></li>

      </ul>
    </div>
  </div>
</nav>