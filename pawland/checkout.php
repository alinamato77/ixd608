<?php include_once "parts/functions.php"; ?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Checkout &mdash; Pawland</title>
    <?php include "parts/href.php"; ?>
</head>
<body>

    <?php include "parts/header.php"; ?>

    <main>
        <div class="container">

            <ol class="breadcrumb">
                <li><a href="cart.php">Cart</a></li>
                <li>Checkout</li>
            </ol>

            <h1>Checkout</h1>

            <div class="grid gap">

                <div class="col-xs-12 col-md-7">

                    <div class="card soft">
                        <h4>Shipping Information</h4>
                        <div class="grid gap">
                            <div class="col-xs-12 col-md-6">
                                <div class="form group">
                                    <label class="form label" for="ship-first">First Name</label>
                                    <input id="ship-first" class="input" type="text" placeholder="e.g. Jane">
                                </div>
                            </div>
                            <div class="col-xs-12 col-md-6">
                                <div class="form group">
                                    <label class="form label" for="ship-last">Last Name</label>
                                    <input id="ship-last" class="input" type="text" placeholder="e.g. Doe">
                                </div>
                            </div>
                        </div>
                        <div class="form group">
                            <label class="form label" for="ship-address">Address</label>
                            <input id="ship-address" class="input" type="text" placeholder="Street address">
                        </div>
                        <div class="grid gap">
                            <div class="col-xs-12 col-md-5">
                                <div class="form group">
                                    <label class="form label" for="ship-city">City</label>
                                    <input id="ship-city" class="input" type="text" placeholder="City">
                                </div>
                            </div>
                            <div class="col-xs-6 col-md-4">
                                <div class="form group">
                                    <label class="form label" for="ship-state">State</label>
                                    <input id="ship-state" class="input" type="text" placeholder="State">
                                </div>
                            </div>
                            <div class="col-xs-6 col-md-3">
                                <div class="form group last">
                                    <label class="form label" for="ship-zip">ZIP</label>
                                    <input id="ship-zip" class="input" type="text" placeholder="ZIP">
                                </div>
                            </div>
                        </div>
                        <div class="form actions">
                            <button type="button" class="btn primary full mt-2">Save</button>
                        </div>
                    </div>

                    <div class="card soft">
                        <h4>Payment</h4>

                        <label class="control label" id="pm-card">
                            <input type="checkbox" name="payment" value="card" checked>
                            <span>Credit Card</span>
                        </label>

                            <div class="form group">
                                <label class="form label" for="card-number">Card Number</label>
                                <input id="card-number" class="input" type="text" placeholder="1234 5678 9012 3456">
                            </div>
                            <div class="grid gap">
                                <div class="col-xs-6">
                                    <div class="form group last">
                                        <label class="form label" for="card-exp">Expiration</label>
                                        <input id="card-exp" class="input" type="text" placeholder="MM / YY">
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <div class="form group last">
                                        <label class="form label" for="card-cvc">CVC</label>
                                        <input id="card-cvc" class="input" type="text" placeholder="123">
                                    </div>
                                </div>
                            </div>

                        <div class="form actions">
                            <button type="button" class="btn primary full mt-2">Save</button>
                        </div>
                    </div>



                </div>

                <div class="col-xs-12 col-md-5">
                    <div class="card soft">
                        <h4>In your cart</h4>
                          <div class="form label">Items Review</div>
                        
                        <?php
                        $items = getCartItems();
                        $total = array_reduce($items, function($r,$o){ return $r + $o->total; }, 0);
                        ?>

                        <div class="checkout-item-list">
                            <?php foreach($items as $item): ?>
                                <div class="display-flex">
                                    <div class="flex-none">
                                        <img src="images/<?= htmlspecialchars(firstProductImage($item)) ?>" alt="<?= htmlspecialchars($item->name) ?>">
                                    </div>

                                    <div class="flex-stretch">
                                        <div class="product-info-name"><strong><?= htmlspecialchars($item->name) ?></strong></div>
                                        <div class="product-info-amount"><small>Qty: <?= $item->amount ?></small></div>
                                    </div>

                                    <div class="product-info-price">
                                        <strong>&dollar;<?= number_format($item->total, 2) ?></strong>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>

                        <div class="checkout-totals">
                            <div class="display-flex">
                                <span>Subtotal</span>
                                <span class="flex-stretch"></span>
                                <span>&dollar;<?= number_format($total, 2) ?></span>
                            </div>
                            
                            <div class="display-flex">
                                <span>Shipping</span>
                                <span class="flex-stretch"></span>
                                <span>Free</span>
                            </div>

                            <hr>
                            
                            <div class="display-flex total-line">
                                <strong>Total</strong>
                                <span class="flex-stretch"></span>
                                <strong>&dollar;<?= number_format($total, 2) ?></strong>
                            </div>

                                                <div class="form actions">
                        <a href="confirmation.php" class="btn primary full">Place Order</a>
                    </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </main>

    <?php include "parts/footer.php"; ?>
</body>
</html>