const listItemTemplate = templater(o=>{
    const thumb = (o.image || '').split(',')[0].trim();
    return `
<div class="col-xs-4">
    <figure class="card soft product">
        <span class="badge success">In Stock</span>
        <div class="img placeholder">
            <img src="images/${thumb}" alt="${o.name}">
        </div>
        <h3>${o.name}</h3>
        <div class="product rating">&#9733;&#9733;&#9733;&#9733;&#9734;</div>
        <h4>&dollar;${o.price.toFixed(2)}</h4>
        <a href="product.php?id=${o.id}" class="btn outline full">View</a>
        <form action="cart_actions.php?action=add-to-cart" method="post">
            <input type="hidden" name="product-id" value="${o.id}">
            <input type="hidden" name="product-amount" value="1">
            <button type="submit" class="btn primary full">Add to Cart</button>
        </form>
    </figure>
</div>
`;
});
