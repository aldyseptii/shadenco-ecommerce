<?php
if(!isset($min)) {
    $min = "";
}
if(!isset($max)) {
    $max = "";
}
?>

<div class="breadcrumb parallax-container p-0">
    <h1 class="category-title"><?= $pagetitle; ?></h1>
    <ul>
        <?php foreach ($breadcrumb as $bc) {
            echo $bc;
        } ?>

    </ul>
    <?php if (isset($description_category)) { ?>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <hr/>
                    <h3><?= $description_category; ?></h3>
                    <hr/>
                </div>
            </div>
        </div>
    <?php } elseif (!empty($this->input->get("category"))) { ?>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <hr/>
                    <h3>
                        <?php
                        if ($this->input->get("category") == 1) {
                            echo $categories[0]->description;
                        } elseif ($this->input->get("category") == 2) {
                            echo $categories[1]->description;
                        } elseif ($this->input->get("category") == 3) {
                            echo $categories[2]->description;
                        } elseif ($this->input->get("category") == 4) {
                            echo $categories[3]->description;
                        }
                        ?>
                    </h3>
                    <hr/>
                </div>
            </div>
        </div>

    <?php } ?>
</div>
<div class="container">
    <div class="row">
        <div id="column-left" class="col-sm-3 column-left">
            <div class="Categories left-sidebar-widget hidden-xs">
                <div class="columnblock-title">Kategori</div>

                <div class="category_block">
                    <ul class="box-category treeview">
                        <?php
                        foreach ($categories as $category) {
                            if (isset($caturl)) {
                                $isurl = $caturl . $category->id_category;
                            } else {
                                $isurl = base_url("category/$category->id_category-" . $this->toolset->tourl($category->name_category));
                            }
                            ?>

                            <li <?php if ($this->uri->segment(2) == $category->id_category . '-' . $this->toolset->tourl($category->name_category)) {
                                echo 'style="font-weight:600;"';
                            } elseif ($this->input->get("category") == $category->id_category) {
                                echo 'style="font-weight:600;"';
                            } ?>><a href="<?= $isurl; ?>"><?= $category->name_category; ?></a></li>

                            <?php
                        }
            ?>
                    </ul>
                </div>
            </div>
            <!--      <div class="filter left-sidebar-widget">
        <div class="columnblock-title">Filter</div>
        <div class="filter-block">
          <div class="list-group">
            <p class="list-group-item">Harga</p>
            <div class="list-group-item">
              <div id="filter-group1">
                <label>Min</label>
                <input type="number" value="<? /*=$min;*/ ?>" class="form-control min">
                <label>Max</label>
                <input type="number" value="<? /*=$max;*/ ?>" class="form-control max">
              </div>
            </div>
          </div>
            <div class="panel-footer">
                <button type="button" id="button-filter" class="btn btn-primary">Terapkan</button>
            </div>
        </div>
      </div>
-->
            <?php
            //            if ($this->router->fetch_class() !== 'category') { ?>
            <div class="Categories left-sidebar-widget
                <?php
            if ($this->router->fetch_class() == 'search') { ?>hidden-xs <?php } ?>">
                <div class="columnblock-title">Ukuran</div>
                <div class="category_block">
                    <ul class="box-category treeview collapsable">


                        <li>
                            <?php
                            $x = $this->input->get("category");
                            if ($this->router->fetch_class() == 'catalog') {

                                    //$y = ($x == 0 && $this->uri->segment(2) == $id_cat);
                                } else if (empty($id_cat)) {

                                } else {
                                    $y = ($x == 0 && $this->uri->segment(2) == $id_cat);
                                }


                                $opt1Txt = '45cm x 185cm';
                                $opt2Txt = '60cm x 185cm';
                                $opt3Txt = '90cm x 185cm';
                                $opt4Txt = '90cm x 250cm';
                                $opt5Txt = '120cm x 185cm';
                                if ($this->uri->segment(1) == 'category') {
                                    $opt1 = base_url() . 'search?category=' . $id_cat . '&q=' . $opt1Txt;
                                    $opt2 = base_url() . 'search?category=' . $id_cat . '&q=' . $opt2Txt;
                                    $opt3 = base_url() . 'search?category=' . $id_cat . '&q=' . $opt3Txt;
                                    $opt4 = base_url() . 'search?category=' . $id_cat . '&q=' . $opt4Txt;
                                    $opt5 = base_url() . 'search?category=' . $id_cat . '&q=' . $opt5Txt;

                                } else {
                                    $opt1 = base_url() . 'search?category=' . $x . '&q=' . $opt1Txt;
                                    $opt2 = base_url() . 'search?category=' . $x . '&q=' . $opt2Txt;
                                    $opt3 = base_url() . 'search?category=' . $x . '&q=' . $opt3Txt;
                                    $opt4 = base_url() . 'search?category=' . $x . '&q=' . $opt4Txt;
                                    $opt5 = base_url() . 'search?category=' . $x . '&q=' . $opt5Txt;
                                }
                                if (empty($q)) {

                                } else {
                                    if ($q === $opt1Txt) {
                                        $opt1Txt = '45cm x 185cm <i class="fa fa-check"></i> ';
                                    } elseif ($q === $opt2Txt) {
                                        $opt2Txt = '60cm x 185cm <i class="fa fa-check"></i> ';
                                    } elseif ($q === $opt3Txt) {
                                        $opt3Txt = '90cm x 185cm <i class="fa fa-check"></i> ';
                                    } elseif ($q === $opt4Txt) {
                                        $opt4Txt = '90cm x 250cm <i class="fa fa-check"></i> ';
                                    } elseif ($q === $opt5Txt) {
                                        $opt5Txt = '120cm x 185cm <i class="fa fa-check"></i> ';
                                    }
                                }


                                ?>
                                <div class="checkbox hidden-sm hidden-xs">
                                    <label>
                                        <a href="<?= $opt1; ?>">
                                            <span><?= $opt1Txt; ?></span>
                                        </a>
                                    </label>
                                    <br/>
                                    <label>
                                        <a href="<?= $opt2; ?>">
                                            <span><?= $opt2Txt; ?></span>
                                        </a>
                                    </label>
                                    <br/>
                                    <label>
                                        <a href="<?= $opt3; ?>">
                                            <span><?= $opt3Txt; ?></span>
                                        </a>
                                    </label>
                                    <br/>
                                    <label>
                                        <a href="<?= $opt4; ?>">
                                            <span><?= $opt4Txt; ?></span>
                                        </a>
                                    </label>
                                    <br/>
                                    <label>
                                        <a href="<?= $opt5; ?>">
                                            <span><?= $opt5Txt; ?></span>
                                        </a>
                                    </label>
                                </div>
                                <div class="row hidden-md hidden-lg">
                                    <div class="col-sm-6 col-xs-6 text-center">
                                        <label>
                                            <a href="<?= $opt1; ?>">
                                                <img src="<?= base_url('assets/ukuran/') . '45cmx185cm.png' ?>">
                                                <span style="color: rgb(255 255 255);background: rgb(37 37 37);margin-left: 1px;-webkit-box-align: center;align-items: center;border: 2px solid rgb(37 37 37);padding: 5px;"><?= $opt1Txt; ?></span>
                                            </a>
                                        </label>
                                    </div>

                                    <div class="col-sm-6 col-xs-6 text-center">
                                        <label>
                                            <a href="<?= $opt2; ?>">
                                                <img src="<?= base_url('assets/ukuran/') . '60cmx185cm.png' ?>">
                                                <span style="color: rgb(255 255 255);background: rgb(37 37 37);margin-left: 1px;-webkit-box-align: center;align-items: center;border: 2px solid rgb(37 37 37);padding: 5px;"><?= $opt2Txt; ?></span>
                                            </a>
                                        </label>
                                    </div>

                                    <div class="col-sm-6 col-xs-6 text-center">
                                        <label>
                                            <a href="<?= $opt3; ?>">
                                                <img src="<?= base_url('assets/ukuran/') . '90cmx185cm.png' ?>">
                                                <span style="color: rgb(255 255 255);background: rgb(37 37 37);margin-left: 1px;-webkit-box-align: center;align-items: center;border: 2px solid rgb(37 37 37);padding: 5px;"><?= $opt3Txt; ?></span>
                                            </a>
                                        </label>
                                    </div>

                                    <div class="col-sm-6 col-xs-6 text-center">
                                        <label>
                                            <a href="<?= $opt4; ?>">
                                                <img src="<?= base_url('assets/ukuran/') . '90cmx250cm.png' ?>">
                                                <span style="color: rgb(255 255 255);background: rgb(37 37 37);margin-left: 1px;-webkit-box-align: center;align-items: center;border: 2px solid rgb(37 37 37);padding: 5px;"><?= $opt4Txt; ?></span>
                                            </a>
                                        </label>
                                    </div>

                                    <div class="col-sm-6 col-xs-6 text-center">
                                        <label>
                                            <a href="<?= $opt5; ?>">
                                                <img src="<?= base_url('assets/ukuran/') . '120cmx185cm.png' ?>">
                                                <span style="color: rgb(255 255 255);background: rgb(37 37 37);margin-left: 1px;-webkit-box-align: center;align-items: center;border: 2px solid rgb(37 37 37);padding: 5px;"><?= $opt5Txt; ?></span>
                                            </a>
                                        </label>
                                    </div>

                                </div>

                        </li>

                    </ul>
                </div>
            </div>
            <!--            --><?php //} ?>
        </div>
        <div class="content col-sm-9 <?php
        if ($this->router->fetch_class() == 'category') { ?> hidden-xs hidden-sm <?php } ?>">
            <!-- Begin Display Ukuran -->
            <?php
            if ($this->router->fetch_class() == 'category') {
                $x = $this->input->get("category");
                if ($this->router->fetch_class() == 'catalog') {

                    //$y = ($x == 0 && $this->uri->segment(2) == $id_cat);
                } else {
                    $y = ($x == 0 && $this->uri->segment(2) == $id_cat);
                }


                $opt1Txt = '45cm x 185cm';
                $opt2Txt = '60cm x 185cm';
                $opt3Txt = '90cm x 185cm';
                $opt4Txt = '90cm x 250cm';
                $opt5Txt = '120cm x 185cm';
                if ($this->uri->segment(1) == 'category') {
                    $opt1 = base_url() . 'search?category=' . $id_cat . '&q=' . $opt1Txt;
                    $opt2 = base_url() . 'search?category=' . $id_cat . '&q=' . $opt2Txt;
                    $opt3 = base_url() . 'search?category=' . $id_cat . '&q=' . $opt3Txt;
                    $opt4 = base_url() . 'search?category=' . $id_cat . '&q=' . $opt4Txt;
                    $opt5 = base_url() . 'search?category=' . $id_cat . '&q=' . $opt5Txt;

                } else {
                    $opt1 = base_url() . 'search?category=' . $x . '&q=' . $opt1Txt;
                    $opt2 = base_url() . 'search?category=' . $x . '&q=' . $opt2Txt;
                    $opt3 = base_url() . 'search?category=' . $x . '&q=' . $opt3Txt;
                    $opt4 = base_url() . 'search?category=' . $x . '&q=' . $opt4Txt;
                    $opt5 = base_url() . 'search?category=' . $x . '&q=' . $opt5Txt;
                }
                if (empty($q)) {

                } else {
                    if ($q === $opt1Txt) {
                        $opt1Txt = '45cm x 185cm <i class="fa fa-check"></i> ';
                    } elseif ($q === $opt2Txt) {
                        $opt2Txt = '60cm x 185cm <i class="fa fa-check"></i> ';
                    } elseif ($q === $opt3Txt) {
                        $opt3Txt = '90cm x 185cm <i class="fa fa-check"></i> ';
                    } elseif ($q === $opt4Txt) {
                        $opt4Txt = '90cm x 250cm <i class="fa fa-check"></i> ';
                    } elseif ($q === $opt5Txt) {
                        $opt5Txt = '120cm x 185cm <i class="fa fa-check"></i> ';
                    }
                }
                ?>

                <div class="row">
                    <div class="columnblock-title" style="
    font-size: 16px;
    font-family: Montserrat;
    color: #000;
    margin-bottom: 15px;
    padding: 0 0 20px;
    font-weight: 600;
    border-bottom: 1px solid #bccad0;
">Pilih Ukuran
                    </div>
                    <div class="col-sm-4 col-xs-6 text-center">
                        <label>
                            <a href="<?= $opt1; ?>">
                                <img src="<?= base_url('assets/ukuran/') . '45cmx185cm.png' ?>">
                                <div class="btn-category-ukuran"><?= $opt1Txt; ?></div>
                            </a>
                        </label>
                    </div>

                    <div class="col-sm-4 col-xs-6 text-center">
                        <label>
                            <a href="<?= $opt2; ?>">
                                <img src="<?= base_url('assets/ukuran/') . '60cmx185cm.png' ?>">
                                <div class="btn-category-ukuran"><?= $opt2Txt; ?></div>
                            </a>
                        </label>
                    </div>

                    <div class="col-sm-4 col-xs-6 text-center">
                        <label>
                            <a href="<?= $opt3; ?>">
                                <img src="<?= base_url('assets/ukuran/') . '90cmx185cm.png' ?>">
                                <div class="btn-category-ukuran"><?= $opt3Txt; ?></div>
                            </a>
                        </label>
                    </div>

                    <div class="col-sm-4 col-xs-6 text-center">
                        <label>
                            <a href="<?= $opt4; ?>">
                                <img src="<?= base_url('assets/ukuran/') . '90cmx250cm.png' ?>">
                                <div class="btn-category-ukuran"><?= $opt4Txt; ?></div>
                            </a>
                        </label>
                    </div>

                    <div class="col-sm-4 col-xs-6 text-center">
                        <label>
                            <a href="<?= $opt5; ?>">
                                <img src="<?= base_url('assets/ukuran/') . '120cmx185cm.png' ?>">
                                <div class="btn-category-ukuran"><?= $opt5Txt; ?></div>
                            </a>
                        </label>
                    </div>

                </div>
            <?php } ?>

            <!-- End Display Ukuran -->
            <?php
            if ($this->router->fetch_class() !== 'category') { ?>

                <div class="category-page-wrapper">
                    <div class="col-md-2 text-right sort-wrapper">
                        <label class="control-label" for="input-sort">Urutkan :</label>
                        <div class="sort-inner">
                            <select id="input-sort" class="form-control">
                                <option value="id_product-DESC">Default</option>
                                <option value="name_product-ASC">Nama (A - Z)</option>
                                <option value="name_product-DESC">Nama (Z - A)</option>
                                <option value="price_product-ASC">Harga (Termurah &gt; Termahal)</option>
              <option value="price_product-DESC">Harga (Termahal &gt; Termurah)</option>
              <option value="total_rating-DESC">Rating (Tertinggi)</option>
              <option value="total_rating-ASC">Rating (Terendah)</option>
            </select>
          </div>
        </div>
        <div class="col-md-6 list-grid-wrapper">
          <div class="btn-group btn-list-grid">
            <button type="button" id="list-view" class="btn btn-default list" data-toggle="tooltip" title="List"></button>
            <button type="button" id="grid-view" class="btn btn-default grid" data-toggle="tooltip" title="Grid"></button>
          </div>
        </div>
      </div>
      <br />
      <div class="grid-list-wrapper">
        <?php
        foreach($productlist as $product) {
            $tourl = $this->toolset->tourl($product->name_product);
            if(empty($product->url_photo)) {
                $url_photo = base_url("assets/moonstore/ms01") . "/image/product/product8-8.jpg";
            } else {
                $url_photo = base_url("img/original/$product->url_photo");
            }
            ?>

            <div class="product-layout product-list col-xs-12">
                <div class="product-thumb">
                    <div class="image product-imageblock">
                        <a href="<?= base_url("product/$product->id_product-$tourl"); ?>">
                            <img src="<?= $url_photo; ?>" alt="<?= $product->name_product; ?>"
                                 title="<?= $product->name_product; ?>"/>
                            <img src="<?= $url_photo; ?>" alt="<?= $product->name_product; ?>"
                                 title="<?= $product->name_product; ?>"/>
                        </a>
                        <ul class="button-group grid-btn">
                            <li>
                                <button type="button" data-id="<?= $product->id_product; ?>"
                                        class="addtocart-btn addtocart csrf" title="Tambah ke Keranjang"
                                        data-csrf="<?= $this->security->get_csrf_hash(); ?>"> Tambah ke Keranjang
                                </button>
                            </li>
                        </ul>
                    </div>
                    <div class="caption product-detail">
                        <div class="rating hidden"> <?= $this->toolset->rating($product->total_rating); ?> </div>
                        <h4 class="product-name"><a href="<?= base_url("product/$product->id_product-$tourl"); ?>"
                                                    title="<?= $product->name_product; ?>"><?= $product->name_product; ?></a>
                        </h4>
                        <span class="badge hidden"
                              title="Stok Tersedia - <?= $product->stock_product; ?>"><?= $product->stock_product; ?> Stok</span>
                        <hr style="margin-top: 12px;margin-bottom: 12px;border: 0;border-top: 2px solid #121212;"/>
                        <h5 class="product-cat">
                            <p><?php echo "$product->name_category"; ?></p>
                        </h5>
                        <p class="price product-price"><?= $this->toolset->rupiah($product->price_product); ?></p>
                        <p class="product-desc"><?= strip_tags(substr($product->description_product, 0, 400)); ?></p>
                        <ul class="button-group list-btn">
                            <li>
                                <button type="button" data-id="<?= $product->id_product; ?>"
                                        class="addtocart-btn addtocart csrf" title="Tambah ke Keranjang"
                                        data-csrf="<?= $this->security->get_csrf_hash(); ?>"> Tambah ke Keranjang
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        <?php } if(count($productlist) < 1) { ?>

            <div class="text-center">Belum ada produk</div>
        <?php } ?>

      </div>
                <div class="category-page-wrapper">
                    <div class="result-inner">Menampilkan <?= $pageinfo['from']; ?> sampai <?= $pageinfo['to']; ?>
                        dari <?= $pageinfo['total']; ?> (<?= $pageinfo['numpage']; ?> Halaman)
                    </div>
                    <div class="pagination-inner">
                        <ul class="pagination">
                            <?= $paging; ?>
                        </ul>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>

<script>
    var sort = "<?=$sort;?>";
    if (sort != "") {
        $('#input-sort').val(sort);
    }

    $('#input-sort').on('change',function(){
        var sort = $(this).val();
        location.href = "<?=$sorturl;?>"+sort;
    });

    $('#button-filter').on('click',function(){
        var min = $('.min').val();
        var max = $('.max').val();

        location.href = "<?=$filterurl;?>"+min+"-"+max;
    });
</script>