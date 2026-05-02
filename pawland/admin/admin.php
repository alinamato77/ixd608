<?php
ob_start();

include "../parts/functions.php";
include_once "../parts/template.php";

$empty_product = (object)[
    "name"=>"Dental Defense Parsley Sticks",
    "price"=>"9.99",
    "category"=>"Treats",
    "stock_quantity"=>"100",
    "ingredients"=>"Rice Flour, Glycerin, Gelatin, Parsley, Spearmint Oil, Dicalcium Phosphate, Calcium Carbonate, Zinc Sulfate, Sodium Tripolyphosphate, Natural Flavors, Green Tea Extract, Vitamin E Supplement",
    "description"=>"Ridged dental sticks infused with parsley and spearmint to fight plaque, reduce tartar buildup, and freshen breath with every chew. The unique textured shape reaches between teeth for a thorough mechanical clean. Suitable for dogs 6 months and older.",
    "thumbnail"=>"dental-sticks.png",
    "image"=>"dental-sticks.png,dental-sticks-2.png",
    
];



// LOGIC
if(isset($_GET['action'])) try {
    $conn = makePDOConn();
    switch($_GET['action']) {
        case "update":
            $statement = $conn->prepare("UPDATE
                `products`
                SET
                    `name`=?,
                    `price`=?,
                    `category`=?,
                    `stock_quantity`=?,
                    `ingredients`=?,
                    `description`=?,
                    `image`=?
                WHERE `id`=?
                ");
            $statement->execute([
                $_POST['name'],
                (float)$_POST['price'],
                $_POST['category'],
                (int)$_POST['stock_quantity'],
                $_POST['ingredients'],
                $_POST['description'],
                $_POST['image'],
                $_GET['id']
            ]);
            header("location:{$_SERVER['PHP_SELF']}?id={$_GET['id']}");
            exit;
        case "create":
            $statement = $conn->prepare("INSERT INTO
                `products`
                (
                    `name`,
                    `price`,
                    `category`,
                    `stock_quantity`,
                    `ingredients`,
                    `description`,
                    `image`,
                    `created_at`
                )
                VALUES (?,?,?,?,?,?,?,NOW())
                ");
            $statement->execute([
                $_POST['name'],
                (float)$_POST['price'],
                $_POST['category'],
                (int)$_POST['stock_quantity'],
                $_POST['ingredients'],
                $_POST['description'],
                $_POST['image']
            ]);
            $new = $conn->lastInsertId();
            header("location:{$_SERVER['PHP_SELF']}?id=$new");
            exit;
        case "delete":
            $statement = $conn->prepare("DELETE FROM `products` WHERE `id`=?");
            $statement->execute([$_GET['id']]);
            header("location:{$_SERVER['PHP_SELF']}");
            exit;
    }
} catch(PDOException $e) {
    die($e->getMessage());
}

// TEMPLATES
function productListItem($r,$o) {
$firstImg = firstProductImage($o);
return $r.<<<HTML
<div class="card soft flex none">
    <div class="display flex">
        <div class="flex none images-thumbs"><img src='images/{$firstImg}' alt='{$o->name}'></div>
        <div class="flex stretch" style="padding:1em">$o->name</div>
        <div class="flex none"><a href="{$_SERVER['PHP_SELF']}?id=$o->id" class="btn primary sm">Edit</a></div>
    </div>
</div>
HTML;
}

function showProductPage($o) {
$self = $_SERVER['PHP_SELF'];
$id = $_GET['id'];
$addoredit = $id == "new" ? "Add" : "Edit";
$createorupdate = $id == "new" ? "create" : "update";
$name        = $o->name ?? '';
$price       = $o->price ?? '';
$category    = $o->category ?? '';
$description = $o->description ?? '';
$ingredients = $o->ingredients ?? '';
$stock       = $o->stock_quantity ?? '';

$firstImg    = firstProductImage($o);
$thumbs      = productThumbnailHtml($o);
$otherImages = productOtherImagesHtml($o);
$catOptions  = categoryOptions($category);

// heredoc
$display = <<<HTML
<div>
    <h2>{$name}</h2>
    <div>
        <label class="form label">Price</label>
        <span>&dollar;{$price}</span>
    </div>
    <div>
        <label class="form label">Category</label>
        <span>{$category}</span>
    </div>
    <div>
        <label class="form label">Stock Quantity</label>
        <span>{$stock}</span>
    </div>
    <div>
        <label class="form label">Ingredients</label>
        <span>{$ingredients}</span>
    </div>
    <div>
        <label class="form label">Description</label>
        <span>{$description}</span>
    </div>
    <div>
        <label class="form label">Image</label>
        <span class="images-thumbs">{$thumbs}</span>
    </div>
        <div>
        <label class="form label">Other Image</label>
        <span class="gallery-wrapper">{$otherImages}</span>
    </div>
</div>
HTML;

$form = <<<HTML
<form method="post" action="{$self}?id={$id}&action={$createorupdate}">
    <h2>{$addoredit} Product</h2>
    <div class="form group">
        <label class="form label" for="product-name">Name</label>
        <input class="input" name="name" id="name" type="text" value="{$name}" placeholder="Enter the Product Name">
    </div>
    <div class="form group">
        <label class="form label" for="product-price">Price</label>
        <input class="input" name="price" id="price" type="number" step="0.01" min="0" value="{$price}" placeholder="0.00">
    </div>
    <div class="form group">
        <label class="form label" for="product-category">Category</label>
        <select class="input" name="category" id="category">{$catOptions}</select>
    </div>
    <div class="form group">
        <label class="form label" for="product-stock_quantity">Stock Quantity</label>
        <input class="input" name="stock_quantity" id="stock_quantity" type="number" min="0" value="{$stock}">
    </div>
    <div class="form group">
        <label class="form label" for="product-description">Description</label>
        <textarea class="input" name="description" id="description" rows="4" placeholder="Enter the Product Description">{$description}</textarea>
    </div>
    <div class="form group">
        <label class="form label" for="product-ingredients">Ingredients</label>
        <textarea class="input" name="ingredients" id="ingredients" rows="4" placeholder="Enter the Ingredients, comma separated">{$ingredients}</textarea>
    </div>
    <div class="form group">
        <label class="form label" for="product-thumbnail">Thumbnail</label>
        <input class="input" name="image" id="image" type="text" value="{$firstImg}" placeholder="Enter the Image filename, comma separated">
    </div>
    <div class="form group">
        <label class="form label" for="product-image">Other Images</label>
        <input class="input" name="image" id="image" type="text" value="{$o->image}" placeholder="Enter the Image filename, comma separated">
    </div>
    <div class="form actions">
        <button class="btn primary full" type="submit">Save Changes</button>
    </div>
</form>
HTML;

$output = $id == "new" ? $form :
    "<div class='grid gap'>
        <div class='col-xs-12 col-md-7'><div class='card soft'>{$display}</div></div>
        <div class='col-xs-12 col-md-5'><div class='card soft'>{$form}</div></div>
    </div>";

$delete = $id == "new" ? "" : "<a class='btn danger sm' href='{$self}?id={$id}&action=delete'>Delete</a>";

return <<<HTML
<div style="margin-bottom: 1.25rem;">
    <nav class="display flex">
        <div class="flex stretch"><a class="btn outline sm" href="{$self}">Back</a></div>
        <div class="flex none">{$delete}</div>
    </nav>
</div>
{$output}
HTML;

}

?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Product Admin Page</title>
	<base href="../">

	<?php include "../parts/href.php"; ?>
</head>
<body>

	<header class="nav horizontal">
		<div class="display flex">
			<div class="flex none">
				<h1 style="color: white;">Product Admin</h1>
			</div>
			<div class="flex stretch"></div>
			<nav class="flex none">
				<ul>
					<li><a href="<?= $_SERVER['PHP_SELF'] ?>">Product List</a></li>
					<li><a href="<?= $_SERVER['PHP_SELF'] ?>?id=new">Add New Product</a></li>
				</ul>
			</nav>
		</div>
	</header>

	<div class="container">

<?php

if(isset($_GET['id'])) {
    echo showProductPage(
        $_GET['id']=="new" ?
            $empty_product :
            makeQuery(makeConn(),"SELECT * FROM `products` WHERE `id`=".$_GET['id'])[0]
    );
} else {

?>
<h2>Product List</h2>

<?php

$result = makeQuery(makeConn(),"SELECT * FROM `products` ORDER BY `created_at` DESC");

echo array_reduce($result,'productListItem');


?>



<?php } ?>

</div>
</body>
