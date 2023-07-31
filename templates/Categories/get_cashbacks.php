<!-- src/Template/Categories/get_cashbacks.ctp -->
<?php if (!empty($cashbacks)): ?>
    <?php foreach ($cashbacks as $cashback): ?>
        <div class="coupon-item">
            <div class="store-logo">
                <a href="<?= $this->Url->build(['controller' => 'Deals', 'action' => 'view', $cashback->deal_id]) ?>">
                    <?= $this->Html->image($cashback->deal->store->store_logo) ?>
                </a>
            </div>
            <div class="coupon-description">
                <h3>
                    <?= h($cashback->cashback_description) ?>
                </h3>
            </div>
        </div>
    <?php endforeach; ?>
<?php else: ?>
    <p>No cashbacks found for this category.</p>
<?php endif; ?>