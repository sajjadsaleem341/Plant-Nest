<?php
include "header.php";
?>

<!-- ##### Breadcrumb Area Start ##### -->
<div class="breadcrumb-area">
    <!-- Top Breadcrumb Area -->
    <div class="top-breadcrumb-area bg-img bg-overlay d-flex align-items-center justify-content-center" style="background-image: url(img/bg-img/24.jpg);">
        <h2>Orders</h2>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i> Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Orders</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- ##### Breadcrumb Area End ##### -->

<main>
        <section class="sitemap">
            <div class="container">
                <h2>Site Structure</h2>
                <ul class="sitemap-list">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Shop</a>
                        <ul>
                            <li><a href="#">Indoor Plants</a></li>
                            <li><a href="#">Outdoor Plants</a></li>
                            <li><a href="#">Pots & Planters</a></li>
                        </ul>
                    </li>
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Contact</a></li>
                    <li><a href="#">Blog</a></li>
                    <li><a href="#">FAQ</a></li>
                    <li><a href="#">My Account</a></li>
                </ul>
            </div>
        </section>
    </main>

    <style>
        h1 {
    margin: 0;
}

main {
    padding: 2rem;
}

.sitemap {
    max-width: 800px;
    margin: 0 auto;
}

.sitemap h2 {
    color: #70c745;
    margin-bottom: 1rem;
}

.sitemap-list {
    list-style: none;
    padding: 0;
}

.sitemap-list > li {
    margin-bottom: 0.5rem;
}

.sitemap-list a {
    text-decoration: none;
    color: #333;
    padding: 0.5rem;
    display: block;
    border-radius: 4px;
    transition: background-color 0.3s ease;
}

.sitemap-list a:hover {
    background-color: #f0f0f0;
}

.sitemap-list ul {
    list-style: none;
    padding-left: 1rem;
}
    </style>


<?php
include "footer.php";
?>
