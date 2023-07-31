<!-- src/Template/Categories/get_cashbacks.ctp -->
<?php if (!empty($cashbacks)): ?>
    <?php foreach ($cashbacks as $cashback): ?>
        <div class="coupon-item">
            <div class="coupon-description">
                <div class="coupon-info">
                    <table>
                        <tr>
                            <th>
                                <?= $this->Html->image($cashback->deal->store->store_logo) ?>
                            </th>
                            <th>
                                <div id="cashback_details">
                                    <p>Shop Now At
                                        <?= h($cashback->deal->store->store_name) ?> And Get Flat
                                        <span id="details">
                                            <?= h($cashback->cashback_description) ?>
                                        </span>
                                    </p>
                                    <p>
                                        Shop Anything You Need
                                    </p>
                                </div>
                            </th>
                            <th>
                                <div id="grab">Activate Your Cashback Now and Shop</div>
                            </th>
                        </tr>
                    </table>
                </div>
                <div id="other_details">
                    <table>
                        <tr>
                            <th>
                                <div class="rules">
                                    <p>1) Eligibility for Cashback</p>
                                    <br>
                                    <p><span class="tick">&#10004;</span> Shopping @
                                        <?= h($cashback->deal->store->store_name) ?> Desktop Website
                                    </p>
                                    <p><span class="tick">&#10004;</span> Shopping @
                                        <?= h($cashback->deal->store->store_name) ?> Mobile Website
                                    </p>
                                    <p><span class="cross">&#10008;</span> Shopping @
                                        <?= h($cashback->deal->store->store_name) ?> Mobile App is Not Eligible for Cbk
                                    </p>
                                    <p><span class="tick">&#10004;</span> Items that are Added to
                                        <?= h($cashback->deal->store->store_name) ?> Shopping Cart only after<br> Your
                                        Login/Clickout & then Ordered within 30 Minutes
                                    </p>
                                </div>
                            </th>
                            <th>
                                <div class="rules">
                                    <p>2) Eligibility for 100 Bonus Xuper Cashback</p>
                                    <br>
                                    <p><span class="tick">&#10004;</span> Shopping @
                                        <?= h($cashback->deal->store->store_name) ?> Desktop/Mobile Website after Clickout
                                    </p>
                                    <p><span class="tick">&#10004;</span> Valid Only for Xuper Members who'll be earning
                                        Cashback<br> for the 1st Time Ever</p>
                                    <p><span class="tick">&#10004;</span> Valid on Any Order of 100 & Above</p>
                                    <p><span class="cross">&#10008;</span> Shopping @
                                        <?= h($cashback->deal->store->store_name) ?> Mobile App is Not Eligible for Cbk
                                    </p>
                                </div>

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