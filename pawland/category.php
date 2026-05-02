<?php
include_once "parts/functions.php";
include_once "parts/template.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>All Products &mdash; Pawland</title>
    <?php include "parts/href.php"; ?>

    <script src="lib/js/functions.js"></script>
    <script src="js/templates.js"></script>
    <script src="js/product_list.js"></script>
</head>
<body>

    <?php include "parts/header.php"; ?>

<main>
    <div class="container">
        <h2>All Products</h2>


        <div class="form-control">
            <div class="card soft display-flex">
                <div class="flex-none">
                    <button data-filter="category" data-value="" type="button" class="btn outline sm" autofocus>All</button>
                </div>
                <div class="flex-none">
                    <button data-filter="category" data-value="dry food" type="button" class="btn outline sm">Dry Food</button>
                </div>
                <div class="flex-none">
                    <button data-filter="category" data-value="wet food" type="button" class="btn outline sm">Wet Food</button>
                </div>
                <div class="flex-none">
                    <button data-filter="category" data-value="fresh food" type="button" class="btn outline sm">Fresh Food</button>
                </div>
                <div class="flex-none">
                    <button data-filter="category" data-value="supplements" type="button" class="btn outline sm">Supplements</button>
                </div>
                <div class="flex-none">
                    <button data-filter="category" data-value="treats" type="button" class="btn outline sm">Treats</button>
                </div>
                <div class="flex-none">
                    <div class="form-select">
                    <select class="js-sort">
                      <option value="1">Newest</option>
                      <option value="2">Oldest</option>
                      <option value="3">Least Expensive</option>
                      <option value="4">Most Expensive</option>
        </select>
    </div>
</div>
            </div>
        </div>

        <div class='productlist grid gap'></div>
    </div>
    </main>

        <?php include "parts/footer.php"; ?>

</body>
</html>