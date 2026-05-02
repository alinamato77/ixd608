const listItemTemplate = templater(o=>`
<a class="col-xs-12 col-md-4" href="product.php?id=${o.id}">
    <div class="pet card">
        <div class="pet img">
            <img src="images/${o.image}" alt="${o.name}">
        </div>
        <div class="pet body">
            <p class="pet name">${o.name}</p>
            <p class="pet price">&dollar;${o.price.toFixed(2)}</p>
        </div>
    </div>
</a>
`);