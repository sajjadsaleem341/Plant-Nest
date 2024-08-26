<section class="alazea-Gallery-area section-padding-100-0">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- Section Heading -->
                <div class="section-heading text-center">
                    <h2>Gallery</h2>
                    <p>We devote all of our experience and efforts for creation</p>
                </div>
            </div>
        </div>
    </div>

    <?php
        $categories = get_category($con);
        $galleryProducts = get_product($con);
    ?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="alazea-Gallery-filter">
                    <div class="Gallery-filter">
                        <button class="btn active" data-filter="*">All</button>
                        <?php foreach($categories as $cat) { ?>
                            <button class="btn" data-filter=".cat-<?= $cat['Id'] ?>"><?= $cat['Categories'] ?></button>
                        <?php } ?>
                        <!-- <button class="btn" data-filter=".garden">Garden</button>
                        <button class="btn" data-filter=".home-design">Home Design</button>
                        <button class="btn" data-filter=".office-design">Office Design</button> -->
                    </div>
                </div>
            </div>
        </div>

        <div class="row alazea-Gallery">
            <?php foreach($galleryProducts as $product) { ?>
                <!-- Single Gallery Area -->
                <div class="col-12 col-sm-6 col-lg-3 single_Gallery_item cat-<?= $product['Category_Id'] ?> home-design wow fadeInUp" data-wow-delay="100ms">
                    <!-- Gallery Thumbnail -->
                    <div class="Gallery-thumbnail bg-img" style="background-image: url(image/<?= $product['Image'] ?>);"></div>
                    <!-- Gallery Hover Text -->
                    <div class="Gallery-hover-overlay">
                        <a href="product.php?id=<?= $product['Id'] ?>" class="Gallery-img d-flex align-items-center justify-content-center" title="Gallery 1">
                            <div class="port-hover-text">
                                <h3><?= $product['Name'] ?></h3>
                                <h5><?= $product['Categories'] ?></h5>
                            </div>
                        </a>
                    </div>
                </div>
            <?php } ?>
            <!-- / Single Gallery Area -->

        </div>
    </div>
</section>