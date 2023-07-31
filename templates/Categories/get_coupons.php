<!-- src/Template/Categories/get_coupons.ctp -->
<?php if (!empty($coupons)): ?>
    <?php foreach ($coupons as $coupon): ?>
        <div class="coupon-item">
            <div class="store-logo">
                <a href="<?= $this->Url->build(['controller' => 'Deals', 'action' => 'view', $coupon->deal_id]) ?>">
                    <?= $this->Html->image($coupon->deal->store->store_logo) ?>
                </a>
            </div>
            <div class="coupon-description">
                <h3>
                    <?= h($coupon->coupon_description) ?>
                </h3>
            </div>
        </div>
    <?php endforeach; ?>
<?php else: ?>
    <p>No coupons found for this category.</p>
<?php endif; ?>