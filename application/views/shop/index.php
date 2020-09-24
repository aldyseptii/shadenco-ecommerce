
<div class="mainbanner">
  <div id="main-banner" class="owl-carousel home-slider">
    
    <?php
    foreach($sliders as $slider) {
        $slider->img_slider = base_url("slider/1903x600/$slider->img_slider");
    ?>

    <div class="item"> <a href="<?=$slider->link_slider;?>"><img style="width:1903px" src="<?=$slider->img_slider;?>" alt="<?=$slider->title_slider;?>" class="img-responsive" /></a> </div>

    <?php
    }
    ?>

  </div>
</div>
<div id="center">
  <div class="container">
    <div class="row">
      <div class="content col-sm-12">
        <div class="customtab">
          <h3 class="productblock-title" style="margin-bottom: 25px">Terbaru</h3>
        </div>
        <!-- tab-furniture-->
        <div id="tab-furnitur" class="tab-content">
          <div class="row">

            <?php
            foreach($productlist as $product) {
                $tourl = $this->toolset->tourl($product->name_product);
                if(empty($product->url_photo)) {
                    $url_photo = base_url("assets/moonstore/ms01")."/image/product/product8-8.jpg";
                } else {
                    $url_photo = base_url("img/622x800/$product->url_photo");
                }
            ?>

            <div class="product-layout  product-grid  col-lg-3 col-md-4 col-sm-6 col-xs-12">
              <div class="item">
                <div class="product-thumb">
                  <div class="image product-imageblock"> <a href="<?=base_url("product/$product->id_product-$tourl");?>"> <img style="width:622;height:800" src="<?=$url_photo;?>" alt="<?=$product->name_product;?>" title="<?=$product->name_product;?>" class="img-responsive" /> <img src="<?=$url_photo;?>" alt="<?=$product->name_product;?>" title="<?=$product->name_product;?>" class="img-responsive" /> </a>
                    <ul class="button-group">
                      <li>
                        <button type="button" data-id="<?=$product->id_product;?>" class="addtocart-btn addtocart csrf" title="Tambah ke Keranjang" data-csrf="<?=$this->security->get_csrf_hash();?>"> Tambah ke Keranjang </button>
                      </li>
                    </ul>
                  </div>
                  <div class="caption product-detail">
                    <div class="rating">
                        <?=$this->toolset->rating($product->total_rating);?>
                    </div>
                    <h3 class="product-name"><a href="<?=base_url("product/$product->id_product-$tourl");?>" title="<?=$product->name_product;?>"><?=$product->name_product;?></a></h3>
                      <span class="badge" title="Stok Tersedia - <?=$product->stock_product;?>"><?=$product->stock_product;?> Stok</span>
                      <p class="price product-price"><?=$this->toolset->rupiah($product->price_product);?></p>
                  </div>
                </div>
              </div>
            </div>

            <?php
            }
            ?>

            <div class="viewmore">
              <a href="<?=base_url('catalog/?sort=id_product-DESC');?>" class="btn">Lihat Semua</a>
            </div>
          </div>
        </div>
      </div>
      <div class="content col-sm-12">
        <div class="customtab">
          <h3 class="productblock-title" style="margin-bottom: 25px">Rating Teratas</h3>
        </div>
        <!-- tab-furniture-->
        <div id="tab-furnitur" class="tab-content">
          <div class="row">

            <?php
            foreach($toplist as $product) {
                $tourl = $this->toolset->tourl($product->name_product);
                if(empty($product->url_photo)) {
                    $url_photo = base_url("assets/moonstore/ms01")."/image/product/product8-8.jpg";
                } else {
                    $url_photo = base_url("img/622x800/$product->url_photo");
                }
            ?>

            <div class="product-layout  product-grid  col-lg-3 col-md-4 col-sm-6 col-xs-12">
              <div class="item">
                <div class="product-thumb">
                  <div class="image product-imageblock"> <a href="<?=base_url("product/$product->id_product-$tourl");?>"> <img style="width:622;height:800" src="<?=$url_photo;?>" alt="<?=$product->name_product;?>" title="<?=$product->name_product;?>" class="img-responsive" /> <img src="<?=$url_photo;?>" alt="<?=$product->name_product;?>" title="<?=$product->name_product;?>" class="img-responsive" /> </a>
                    <ul class="button-group">
                      <li>
                        <button type="button" data-id="<?=$product->id_product;?>" class="addtocart-btn addtocart csrf" title="Tambah ke Keranjang" data-csrf="<?=$this->security->get_csrf_hash();?>"> Tambah ke Keranjang </button>
                      </li>
                    </ul>
                  </div>
                  <div class="caption product-detail">
                    <div class="rating">
                        <?=$this->toolset->rating($product->total_rating);?>
                    </div>
                    <h4 class="product-name"><a href="<?=base_url("product/$product->id_product-$tourl");?>" title="<?=$product->name_product;?>"><?=$product->name_product;?></a></h4>
                      <span class="badge" title="Stok Tersedia - <?=$product->stock_product;?>"><?=$product->stock_product;?> Stok</span>
                      <p class="price product-price"><?=$this->toolset->rupiah($product->price_product);?></p>
                  </div>
                </div>
              </div>
            </div>

            <?php
            }
            ?>

            <div class="viewmore">
              <a href="<?=base_url('catalog/?sort=total_rating-DESC');?>" class="btn">Lihat Semua</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
