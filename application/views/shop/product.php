<?php
$explodeimg = explode(",", $detail->photo_product);
$bigthumb = $explodeimg[0];

$rowthumb = $explodeimg;
unset($rowthumb[0]);

?>


<div class="container">
    <div class="row">
        <div class="col-md-12 mb-2 px-5">
            <span class="breadcrumb-mod">
                    <a href="<?= base_url(); ?>">Home</a>
                        <i class="fa fa-angle-double-right"></i>
                    <a href="<?= base_url("category/$detail->id_category-" . $this->toolset->tourl($detail->name_category)); ?>"><?= $detail->name_category; ?></a>
                        <i class="fa fa-angle-double-right"></i>
                    <?= $detail->name_product; ?>
            </span>
        </div>
        <div class="content col-sm-12">
            <div class="row">
                <div class="col-sm-6 p-5">
                    <div class="thumbnails">
                        <div class="left-column" id="ProductPhoto">
                            <a class="thumbnail fancybox" rel="lightbox"
                               href="<?= base_url("img/original/$bigthumb"); ?>" title="<?= $detail->name_product; ?>">
                                <img id="ProductPhotoImg" class="tampil"
                                     src="<?= base_url("img/original/$bigthumb"); ?>"
                                     alt="<?= $detail->name_product; ?>" title="Motif <?= $detail->name_product; ?>"/>
                            </a>
                            <?php foreach ($variant as $motif) {
                                ?>
                                <a class="mb-4 fancybox" rel="lightbox2" href="<?= $motif->image_url; ?>"
                                   title="Motif <?= $motif->variant_product; ?>">
                                    <img id="ProductPhotoImg"
                                         src="<?= $motif->image_url; ?>" data-image="<?= $motif->variant_product; ?>"
                                         alt="<?= $motif->variant_product; ?>" title="<?= $motif->variant_product; ?>"/>
                                </a>
                            <?php }
                            if (count($variant) == 0) {
                                echo '';
                            } ?>
                        </div>
                        <div id="product-thumbnail" class="mt-3 owl-carousel">

                            <!--                            --><?php
                            /*                            foreach ($rowthumb as $img) {
                                                            $img = trim($img);
                                                            */ ?>

                            <!-- Motif kecil kecil -->
                            <?php foreach ($variant as $motif) {
                                ?>
                                <label>
                                    <div class="item">
                                        <div class="image-additional"><a class="thumbnail fancybox" rel="lightbox"
                                                                         href="<?= base_url('assets/motif/' . $motif->motif_link); ?>"
                                                                         title="<?= $motif->variant_product; ?>">
                                                <img
                                                        id="Motif"
                                                        src="<?= base_url('assets/motif/' . $motif->motif_link); ?>"
                                                        title="<?= $motif->variant_product; ?>"
                                                        alt="<?= $motif->variant_product; ?>"/></a></div>
                                    </div>
                                    <?php
                                    $image_link = base_url('assets/motif/') . $motif->motif_link;
                                    if (empty($motif->motif_link)) {
                                        echo '';
                                    } else {
                                        echo "<img class='hidden' src='$image_link'>";
                                    } ?>
                                    <?= $motif->variant_product; ?>
                                </label>
                            <?php }
                            if (count($variant) == 0) {
                                echo 'Tidak ada variant pada produk ini';
                            } ?>
                            <!-- Motif Kecil Kecil -->

                            <!--                            --><?php /*} */ ?>

                        </div>
                    </div>
                </div>
                <div class="col-sm-6 p-5 prodetail">
                    <h1 class="productpage-title"><?= $detail->name_product; ?></h1>
                    <div class="rating hidden"><?= $this->toolset->rating($detail->total_rating); ?></div>
                    <ul class="list-unstyled productinfo-details-top">
                        <li>
                            <h2 class="productpage-price"><?= $this->toolset->rupiah($detail->price_product); ?></h2>
                        </li>
                    </ul>
                    <hr>
                    <div class="col-md-12">
                        <div class="row mb-4">
                            <div class="col-md-3">UKURAN</div>
                            <div class="col-md-8">
                                <select style="height: 43px;border: 1px solid #a5a5a5;margin-bottom: 9px;">
                                    <option value="" selected disabled>-- Pilih Ukuran Untuk Produk Ini --</option>
                                    <option value="" required>45cm x 185cm</option>
                                    <option value="" required>60cm x 185cm</option>
                                    <option value="" required>90cm x 185cm</option>
                                    <option value="" required>90cm x 250cm</option>
                                    <option value="" required>120cm x 185cm</option>

                                </select>
                                <!-- <a href="<? /*= base_url("category/$detail->id_category-" . $this->toolset->tourl($detail->name_category)); */ ?>"><? /*= $detail->name_category; */ ?></a>-->
                            </div>
                        </div>
                        <!--                        <div class="ukuran">
                            <h5>Ukuran</h5>
                            <h1><? /*= $detail->size_product; */ ?></h1>
                        </div>-->
                        <div class="row motif mb-4">
                            <div class="col-md-3">MOTIF</div>
                            <div class="col-md-8">
                                <?php foreach ($variant as $motif) {
                                    ?>
                                    <label>
                                        <input type="radio" name="test" value="<?= $motif->variant_product; ?>"
                                               data-image="<?= $motif->variant_product; ?>">
                                        <?php
                                        $image_link = $motif->image_url;
                                        if (empty($motif->image_url)) {
                                            echo '';
                                        } else {
                                            echo "<img class='hidden' src='$image_link'>";
                                        } ?>
                                        <?= $motif->variant_product; ?>
                                    </label>
                                <?php }
                                if (count($variant) == 0) {
                                    echo 'Tidak ada variant pada produk ini';
                                } ?>

                            </div>
                        </div>
                        <div class="row mb-4">
                            <div>
                                <div class="form-group">
                                    <div class="col-md-3">KUANTITAS</div>
                                    <div class="col-md-8 pl-2">
                                        <div class="input-group">
                                    <span class="input-group-btn">
                                        <button type="button" class="quantity-left-minus btn btn-danger btn-number"
                                                data-type="minus" data-field="">
                                          <span class="glyphicon glyphicon-minus"></span>
                                        </button>
                                    </span>
                                            <input type="text" id="qty"
                                                   class="form-control input-number" value="1" min="1"
                                                   max="<?= $detail->stock_product; ?>"
                                                   style="text-align: center;width: 60px;height: 42px;border-top: 1px solid #a5a5a5;border-bottom: 1px solid #a5a5a5;">
                                            <span class="input-group-btn">
                                        <button type="button" class="quantity-right-plus btn btn-success btn-number"
                                                data-type="plus" data-field="">
                                            <span class="glyphicon glyphicon-plus"></span>
                                        </button>
                                    </span>
                                        </div>
                                        <!--                                        <input id="qty" value="1" type="number">
                                        --> <span class="stock-right">Stok <?= $detail->stock_product; ?> pcs</span>
                                    </div>
                                    <div class=" col-md-3 mt-3 my-5">
                                        <button type="button" class="addtocart-btn csrf text-white btn-tocart"
                                                data-csrf="<?= $this->security->get_csrf_hash(); ?>"
                                                data-id="<?= $detail->id_product; ?>" data-toggle="tooltip"
                                                data-placement="top" title="Tambah ke Keranjang">Pesan
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr>

                    </div>
                </div>
            </div>
            <div class="productinfo-tab">
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#detail-product">Detail Product</a></li>
                    <li class=""><a data-toggle="tab" href="#tab-review">Diskusi Produk (<?= count($comments); ?>)</a>
                    </li>
                    <li class=""><a data-toggle="tab" href="#tab-pemasangan">Cara Pemasangan</a></li>
                    <li class=""><a data-toggle="tab" href="#tab-kebijakan">Kebijakan Pengembalian</a></li>

                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade in active" id="detail-product">
                        <div>
                            <?= nl2br($detail->description_product); ?>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tab-review">
                        <div id="review-list">
                            <h2>Diskusi Teratas</h2>
                            <?php
                            foreach ($comments as $comment) {
                                ?>

                                <div class="review-wrapper">
                                    <div class="review-head">
                                        <div class="info">
                                            <span class="name"><b><?= $comment->name_comment; ?></b></span>
                                            <?= $comment->date_comment; ?>
                                        </div>
                                        <div class="star"><?= $this->toolset->rating($comment->rating_comment); ?></div>
                                    </div>
                                    <div class="review-body">
                                        <?= $comment->body_comment; ?>
                                    </div>
                                </div>
                            <?php }
                            if (count($comments) == 0) {
                                echo 'Belum ada diskusi untuk produk ini';
                            } ?>

                        </div>
                        <form id="formComment">
                            <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value=""
                                   data-csrf="<?= $this->security->get_csrf_hash(); ?>" id="csrf-form" class="csrf">
                            <div id="review"></div>
                            <h2>Tulis Diskusi</h2>
                            <div class="form-group required">
                                <div class="col-sm-12">
                                    <label class="control-label" for="input-name">Nama</label>
                                    <input type="text" name="name_comment" value="" id="input-name"
                                           class="form-control"/>
                                </div>
                            </div>
                            <div class="form-group required">
                                <div class="col-sm-12">
                                    <label class="control-label" for="input-name">Email</label>
                                    <input type="email" name="email_comment" value="" id="input-name"
                                           class="form-control"/>
                                </div>
                            </div>
                            <div class="form-group required">
                                <div class="col-sm-12">
                                    <label class="control-label" for="input-review">Diskusi</label>
                                    <textarea name="body_comment" rows="5" id="input-review"
                                              class="form-control"></textarea>
                                    <div class="help-block"><span class="text-danger">Note:</span> HTML tidak
                                        ditampilkan!
                                    </div>
                                </div>
                            </div>
                            <!--                            <div class="form-group required">
                                                            <div class="col-sm-12">
                                                                <label class="control-label">Rating</label><br>Bad&nbsp;
                                                                <input type="radio" name="rating_comment" value="1"/>
                                                                &nbsp;
                                                                <input type="radio" name="rating_comment" value="2"/>
                                                                &nbsp;
                                                                <input type="radio" name="rating_comment" value="3"/>
                                                                &nbsp;
                                                                <input type="radio" name="rating_comment" value="4"/>
                                                                &nbsp;
                                                                <input type="radio" name="rating_comment" value="5"/>
                                                                &nbsp;Good
                                                            </div>
                                                        </div>-->
                            <div class="buttons clearfix">
                                <div class="pull-right">
                                    <button type="button" id="send-comment" data-loading-text="Loading..."
                                            class="btn btn-primary">Lanjutkan
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="tab-pemasangan">
                        <div>
                            <iframe width="1100" height="450" src="https://www.youtube.com/embed/QeMPCMi4rLc"
                                    frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen="" class="embed-yt">
                            </iframe>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tab-kebijakan">
                        <div>
                            <p>
                            <h2>Kebijakan Garansi dan komplain Produk</h2>
                            <br/>
                            Produk yang dikirimkan sesuai dengan pemesanan sudah di lakukan pengecekan sebelum dilakukan
                            pengiriman, jika ada ketidak sesuaian atau kecacatan produk (bukan karena salah pilih warna
                            atau ukuran) dapat dilakukan retur/pengembalian maksimal 2hari setelah barang diterima oleh
                            customer. Dan dengan hanya mengganti biaya kirim saja (Kita tukar barang baru).
                            <br/><br/>
                            Anda dapat mengajukan klaim pengembalian produk jika ada ketidaksesuaian dengan barang yang
                            dipesan atau kecacatan produksi pada produk, dengan syarat-syarat pengembalian produk
                            sebagai berikut:
                            <br/><br/>
                            <ul class="ml-4">
                                <li>Tidak ada Bekas Pemasangan dan pembongkaran pada produk</li>
                                <li>Seluruh kelengkapan terkirim dalam keadaan baik dan utuh, termasuk packing dan
                                    aksesoris
                                </li>
                                <li>Maksimum klaim pengembalian dan garansi 2 x 24 jam semenjak barang diterima</li>
                            </ul>
                            <br/>
                            Klaim garansi dan komplain product dilakukan via tokopedia, semua biaya pengiriman dalam
                            proses pengembalian produk menjadi tanggung jawab pembeli

                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <h3 class="productblock-title mb-4">Produk Serupa</h3>
            <h4 class="title-subline mb-4">Produk yang mungkin Anda tertarik</h4>
            <div class="box">
                <div id="related-slidertab" class="row owl-carousel product-slider">

                    <?php
                    foreach ($related as $rlt) {
                        $tourl = $this->toolset->tourl($rlt->name_product);
                        if (empty($rlt->url_photo)) {
                            $url_photo = base_url("assets/moonstore/ms01") . "/image/product/product8-8.jpg";
                        } else {
                            $url_photo = base_url("img/622x800/$rlt->url_photo");
                        }
                        ?>

                        <div class="item">
                            <div class="product-thumb transition">
                                <div class="image product-imageblock"><a
                                        href="<?= base_url("product/$rlt->id_product-$tourl"); ?>">
                                        <img src="<?= $url_photo; ?>" alt="<?= $rlt->name_product; ?>"
                                             title="<?= $rlt->name_product; ?>" class="img-responsive"/>
                                        <img src="<?= $url_photo; ?>" alt="<?= $rlt->name_product; ?>"
                                             title="<?= $rlt->name_product; ?>" class="img-responsive"/>
                                    </a>
                                    <ul class="button-group">
                                        <li>
                                            <button title="Tambah ke Keranjang" class="addtocart-btn" type="button">
                                                Tambah ke Keranjang
                                            </button>
                                        </li>
                                    </ul>
                                </div>
                                <div class="caption product-detail">
                                    <div class="rating hidden">
                                        <?= $this->toolset->rating($rlt->total_rating); ?>
                                    </div>
                                    <h4 class="product-name"><a
                                            href="<?= base_url("product/$rlt->id_product-$tourl"); ?>"
                                            title="<?= $rlt->name_product; ?>"><?= $rlt->name_product; ?></a></h4>
                                    <span class="badge hidden"
                                          title="Stok Tersedia - <?= $rlt->stock_product; ?>"><?= $rlt->stock_product; ?> Stok</span>
                                    <p class="price product-price"><?= $this->toolset->rupiah($rlt->price_product); ?></p>
                                </div>
                            </div>
                        </div>

                    <?php } ?>

                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $('#send-comment').on('click', function () {
        var csrf = $("#csrf-form").attr('data-csrf');
        $("#csrf-form").val(csrf);
        $.ajax({
            url: "<?=base_url("comment/index/$detail->id_product");?>",
            method: "POST",
            data: new FormData($('#formComment')[0]),
            contentType: false,
            cache: false,
            processData: false,
            dataType: "json",
            success: function (result) {
                $('.csrf').attr('data-csrf', result['csrf_regenerate']);
                $('#csrf-form').val(result['csrf_regenerate']);
                if (result['status']) {
                    $('#formComment')[0].reset();
                    Swal.fire(
                        'Berhasil',
                        "Ulasan anda telah dikirim",
                        'success'
                    ).then((result) => {
                            if (result.value) {
                                location.reload();
                            }
                        }
                    )
                } else {

                    Swal.fire(
                        'Gagal',
                        result['error'][0]['field'] + " " + result['error'][0]['msg'],
                        'error'
                    )
                }
            }
        });
    });

    $('.addtocart-btn').on("click", function () {
        var id = $(this).attr("data-id");
        var qty = $('#qty').val();
        var csrf = $(this).attr("data-csrf");
        $.ajax({
            url: "<?=base_url("cart/add");?>/",
            method: "POST",
            data: {
                "id": id,
                "qty": qty,
                "<?=$this->security->get_csrf_token_name();?>": csrf
            },
            dataType: "json",
            success: function (result) {
                $('.csrf').attr("data-csrf", result['csrf_regenerate']);
                if (result['status']) {
                    if ($('.cartul .update').length < 1) {

                        $('.cartul').append('<li style="text-align:center;margin-bottom: 12px" class="update">Telah terjadi perubahan. Silahkan refresh page untuk memperbaharui</li>');

                    }
                    Swal.fire({
                        title: 'Berhasil',
                        text: result['msg'],
                        icon: 'success',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Checkout',
                        cancelButtonText: "Lanjutkan belanja"
                    }).then((result) => {
                        if (result.value) {
                            window.location.href = "<?=base_url("transaction/checkout");?>";
                        }
                    })
                } else {
                    Swal.fire(
                        'Gagal',
                        result['msg'],
                        'error'
                    );
                }
            }
        });
    });
</script>
<style>
    div .motif label input[type=radio] + img {
        flex-shrink: 0;
        width: 38px;
        height: 38px;
        background-size: 38px;
        /*border-radius: 12px;*/
        margin: 0 4px 0 0;
    }

    div .motif label:hover {
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15) !important;
    }

    div .motif label {
        font-weight: 400;
        margin-right: 2px;
        -webkit-box-align: center;
        align-items: center;
        background-color: rgb(155 168 174 / 0%);
        /* border-radius: 16px; */
        border: 1px solid #a5a5a5;
        /* color: rgb(155 168 174); */
        display: inline-flex;
        vertical-align: top;
        flex: 1 1 0%;
        flex-wrap: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        transition: all 0.28s ease-in-out 0s;
        cursor: pointer;
        min-width: 106px;
        height: 42px;
        padding: 3px 5px;
        line-height: 18px;
        font-size: 12px;
        white-space: normal;
    }

    /* HIDE RADIO */
    div .motif label [type=radio] {
        position: absolute;
        opacity: 0;
        width: 0;
        height: 0;
    }

    /* IMAGE STYLES */
    [type=radio] + img {
        cursor: pointer;
    }

    /* CHECKED STYLES */
    [type=radio]:checked + img {
        background: #bccad0;
        padding: 4px;
        transition: all 0.28s ease-in-out 0s;
    }

    /* Left Column */
    .left-column img {
        width: 100%;
        opacity: 0;
        transition: all 0.3s ease;
        display: none;
    }

    .left-column img.tampil {
        display: block;
        opacity: 1;
    }

    .shadow-variant {
        box-shadow: -3px 0.3rem 0rem 0px rgb(0 0 0 / 52%);
        font-weight: 800 !important;
    }
</style>
<script>
    $(document).ready(function () {

        $('.motif input').on('click', function () {
            var motifVariant = $(this).attr('data-image');

            $('.tampil').removeClass('tampil');
            $('.left-column img[data-image = ' + motifVariant + ']').addClass('tampil');
            $(this).addClass('tampil');
        });

    });

    var inputs = document.querySelectorAll("input[type=radio]");
    inputs.forEach(function (i) {
        i.addEventListener('click', function (el) {
            var clicked = el.currentTarget;
            var active = clicked.parentElement.parentElement.querySelector('.shadow-variant');
            active && active.classList.remove('shadow-variant');
            clicked.parentElement.classList.add('shadow-variant');
        });
    });

    $(document).ready(function () {

        var quantitiy = 1;
        $('.quantity-right-plus').click(function (e) {

            // Stop acting like a button
            e.preventDefault();
            // Get the field name
            var quantity = parseInt($('#qty').val());

            // If is not undefined

            $('#qty').val(quantity + 1);


            // Increment

        });

        $('.quantity-left-minus').click(function (e) {
            // Stop acting like a button
            e.preventDefault();
            // Get the field name
            var quantity = parseInt($('#qty').val());

            // If is not undefined

            // Increment
            if (quantity > 1) {
                $('#qty').val(quantity - 1);
            }
        });

    });
</script>
<script>$(document).ready(function () {
        $('.fancybox').fancybox();
    });</script>
<script>function productZoom() {
        $(".product-zoom").elevateZoom({
            gallery: 'ProductThumbs',
            galleryActiveClass: "active",
            zoomType: "inner",
            cursor: "crosshair"
        });
        $(".product-zoom").on("click", function (e) {
            var ez = $('.product-zoom').data('elevateZoom');
            $.fancybox(ez.getGalleryList());
            return false;
        });

    };

    function productZoomDisable() {
        if ($(window).width() < 767) {
            $('.zoomContainer').remove();
            $(".product-zoom").removeData('elevateZoom');
            $(".product-zoom").removeData('zoomImage');
        } else {
            productZoom();
        }
    };

    productZoomDisable();

    $(window).resize(function () {
        productZoomDisable();
    });
</script>
