<?php
if (!isset($min)) {
    $min = "";
}
if (!isset($max)) {
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
                    <h3><?= $description_category ?></h3>
                    <hr/>
                </div>
            </div>
        </div>
    <?php } ?>
</div>
<div class="col-md-12">
    <?php
    foreach ($categories as $category) {
        if (isset($caturl)) {
            $isurl = $caturl . $category->id_category;
        } else {
            $isurl = base_url("search?category=$category->id_category");
        }
        ?>
        <a href="<?= base_url("category/$category->id_category-" . $this->toolset->tourl($category->name_category)); ?>"
           class="d-flex">
            <div alt="Produk Baru" class="category-page-div">
                <div class="category-page-text"><?= $category->name_category; ?>
                </div>
                <a href="<?= base_url("category/$category->id_category-" . $this->toolset->tourl($category->name_category)); ?>"
                   role="button" class="category-page-btn">Tampilkan</a>
            </div>
        </a>
        <?php
    }
    ?>
</div>


<script>
    var sort = "<?=$sort;?>";
    if (sort != "") {
        $('#input-sort').val(sort);
    }

    $('#input-sort').on('change', function () {
        var sort = $(this).val();
        location.href = "<?=$sorturl;?>" + sort;
    });

    $('#button-filter').on('click', function () {
        var min = $('.min').val();
        var max = $('.max').val();

        location.href = "<?=$filterurl;?>" + min + "-" + max;
    });

    $(window).on('load resize', function () {
        if ($(window).width() > 950) {
            window.location = "https://www.google.com"
        }
    });
</script>