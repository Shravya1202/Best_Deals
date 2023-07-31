<!-- src/Template/Categories/get_cashbacks.ctp -->
<?php if (!empty($cashbacks)): ?>
    <?php foreach ($cashbacks as $cashback): ?>
        <div class="coupon-item">
            <div class="store-logo">
                <br>
                <h3 id="no-coupon">
                    ------------------------------------------
                    1 cashback---------------------------------------
                </h3>
            </div>
            <div class="coupon-description">
                <div class="coupon-info">
                    <table>
                        <tr>
                            <th>
                                <?= $this->Html->image($cashback->deal->store->store_logo) ?>
                            </th>
                            <th>
                                <div id="coupon_details">
                                    <p>Shop Now At
                                        <?= h($cashback->deal->store->store_name) ?> And Get Flat
                                        <?= h($cashback->cashback_description) ?>
                                    </p>
                                    <p>
                                        Shop Anything You Need
                                    </p>
                                </div>
                            </th>
                            <th>
                                <a
                                    href="<?= $this->Url->build(['controller' => 'Deals', 'action' => 'cashback', $cashback->deal_id]) ?>">
                                    <div id="grab">View Details and Grab deal</div>
                                </a>
                            </th>
                        </tr>
                    </table>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p id="zero">Zero Cashbacks</p>
    <?php endif; ?>

    <?= $this->Html->css('view.css'); ?>