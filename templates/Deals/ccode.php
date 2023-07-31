<center>
    <h1>Coupon Details</h1>
</center>
<?php if (!empty($deal->coupons)): ?>
    <?php foreach ($deal->coupons as $coupon): ?>
        <div class="coupon-info1">
            <table>
                <tr>
                    <th>
                        <?= $this->Html->image($deal->store->store_logo) ?>
                    </th>
                    <th>
                        <div id="coupon_details1">
                            <p>Shop Now At
                                <?= h($deal->store->store_name) ?> And Get Amazing Deals On Prices
                            </p>
                            <p>
                                <?= h($deal->store->store_name) ?> coupons available for ALL USERS
                            </p>
                        </div>
                        <div id="coupon_details2">
                            <p>1.Offer validity:Till
                                <?= h($coupon->coupon_validity) ?>
                            </p>
                            <p>2.Limited Period Offer </p>
                            <div id="coupon_code">
                                <?= h($coupon->coupon_code) ?>
                            </div>
                        </div>
                    </th>
                </tr>
            </table>
        </div>
    <?php endforeach; ?>
<?php else: ?>
    <p id="zero">Zero Coupons</p>
<?php endif; ?>

<?= $this->Html->css('view.css'); ?>