const listItemTemplate = templater(o=>`
<a class="col-xs-12 col-md-4" href="product.php?id=${o.id}">
    <div class="product-card">
        <div class="product-card-img">
            <img src="images/${o.image}" alt="${o.name}" style="max-width:100%;max-height:100%;object-fit:contain;">
        </div>
        <div class="product-card-body">
            <div class="product-card-name">${o.name}</div>
            <div class="product-card-price">&dollar;${o.price.toFixed(2)}</div>
        </div>
    </div>
</a>
`);