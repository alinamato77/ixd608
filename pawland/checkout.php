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
                                    <input class="input" type="text" placeholder="First Name">
                                </div>
                            </div>
                            <div class="col-xs-12 col-md-6">
                                <div class="form group">
                                    <input class="input" type="text" placeholder="Last Name">
                                </div>
                            </div>
                        </div>
                        <div class="form group">
                            <input class="input" type="text" placeholder="Address">
                        </div>
                        <div class="grid gap">
                            <div class="col-xs-12 col-md-5">
                                <div class="form group">
                                    <input class="input" type="text" placeholder="City">
                                </div>
                            </div>
                            <div class="col-xs-6 col-md-4">
                                <div class="form group">
                                    <input class="input" type="text" placeholder="State">
                                </div>
                            </div>
                            <div class="col-xs-6 col-md-3">
                                <div class="form group last">
                                    <input class="input" type="text" placeholder="ZIP">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card soft">
                        <h4>Payment</h4>

                        <label class="payment method option card outline display-flex" id="pm-card">
                            <input type="radio" name="payment" checked>
                            <span>Credit Card</span>
                        </label>

                        <div id="card-fields" class="card outline">
                            <div class="form group">
                                <input class="input" type="text" placeholder="Card Number">
                            </div>
                            <div class="grid gap">
                                <div class="col-xs-6">
                                    <div class="form group last">
                                        <input class="input" type="text" placeholder="MM / YY">
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <div class="form group last">
                                        <input class="input" type="text" placeholder="CVC">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



                </div>

                <div class="col-xs-12 col-md-5">
                    <div class="card soft">
                        <h4>In your cart</h4>
                        
                        <?php
                        $items = getCartItems();
                        $total = array_reduce($items, function($r,$o){ return $r + $o->total; }, 0);
                        ?>

                        <div class="checkout-item-list">
                            <?php foreach($items as $item): ?>
                                <div class="display-flex">
                                    <div class="flex-none">
                                        <img src="images/<?= htmlspecialchars($item->image) ?>" alt="<?= htmlspecialchars($item->name) ?>">
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