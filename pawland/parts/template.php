<?php

function productListTemplate($r,$o) {
return $r.<<<HTML
<a class="col-xs-12 col-md-4" href="product.php?id=$o->id">
	<figure class="figure product display-flex flex-column">
		<div class="flex-stretch">
			<img src="images/$o->image" alt="">
		</div>
		<figcaption class="flex-none">
			<div>&dollar;$o->price</div>
			<div>$o->name</div>
		</figcaption>
	</figure>
</a>
HTML;
}

function cartListTemplate($r,$o){
return $r.<<<HTML
<div class="display-flex">
	<div class="flex-none images-thumbs">
		<img src="images/$o->image">
	</div>
	<div class="flex-stretch">
		<strong>$o->name</strong>
		<div style="color:var(--color-primary)">Delete</div>
	</div>
	<div class="flex-none">
		&dollar;$o->price
	</div>
</div>
HTML;
}
