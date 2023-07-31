<!-- src/Template/Deals/view.ctp -->

<?php if ($deal !== null): ?>
    <div id="fixed">
        <div class="store-logo">
            <table>
                <tr>
                    <th>
                        <?= $this->Html->image($deal->store->store_logo) ?>
                    </th>
                    <th>
                        Latest
                        <?= h($deal->store->store_name) ?> Coupons, Offers And Cashback Deals
                    </th>
                </tr>
            </table>
        </div>
        <nav>
            <a class="nav-link" id="cashback_nav" href="#cashback">Cashback</a>
            <a class="nav-link" id="coupon_nav" href="#coupon">Coupons</a>
        </nav>
    </div>

    <div class="content">
        <div id="cashback">

        </div>

        <div id="coupon">
            <?php if (!empty($deal->coupons)): ?>
                <?php foreach ($deal->coupons as $coupon): ?>
                    <div class="coupon-description">
                        <br>
                        <h3 id="no-coupon">
                            --------------------------------------------
                            <?= h($coupon->coupon_description) ?>----------------------------------------
                        </h3>
                        <?php for ($i = 0; $i < $coupon->no_coupons; $i++): ?>
                            <div class="coupon-info">
                                <table>
                                    <tr>
                                        <th>
                                            <?= $this->Html->image($deal->store->store_logo) ?>
                                        </th>
                                        <th>
                                            <div id="coupon_details">
                                                <p>Shop Now At
                                                    <?= h($deal->store->store_name) ?> And Get Amazing Deals On Prices
                                                </p>
                                                <p>
                                                    <?= h($deal->store->store_name) ?> coupons available for ALL USERS
                                                </p>
                                            </div>
                                            <div id="coupon_details1">
                                                <p>1.Offer validity:Till
                                                    <?= h($coupon->coupon_validity) ?>
                                                </p>
                                                <p>2.Limited Period Offer </p>
                                            </div>
                                        </th>
                                        <th>
                                            <a
                                                href="<?= $this->Url->build(['controller' => 'Deals', 'action' => 'ccode', $coupon->deal_id]) ?>">
                                                <div id="view_coupon">
                                                    <div id="view1">
                                                        <?= h($coupon->coupon_code) ?>
                                                    </div>
                                                    <div id="view2">View Coupon</div>
                                                </div>
                                            </a>
                                        </th>
                                    </tr>
                                </table>
                            </div>
                        <?php endfor; ?>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p id="zero">Zero Coupons</p>
            <?php endif; ?>
        </div>
    </div>

<?php else: ?>
    <p>Deal not found.</p>
<?php endif; ?>

<?= $this->Html->css('view.css'); ?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function () {
        const dealID = <?= h($deal->deal_id) ?>;

        $(".nav-link").on("click", function (event) {
            event.preventDefault();
            var target = $(this).attr("href"); // Get the href attribute value
            $("html, body").animate(
                {
                    scrollTop: $(target).offset().top, // Scroll to the target section
                },
                800 // Adjust the scrolling speed (in milliseconds)
            );

            // Remove the active class from all links
            $(".nav-link").removeClass("change");
            // Add the active class to the clicked link
            $(this).addClass("change");
        });

        handlecashbacknav_click(dealID);

        function handlecashbacknav_click(dealID) {
            const csrfToken = $('meta[name="csrfToken"]').attr('content');


            // Make an AJAX request to fetch the coupon details
            $.ajax({
                url: "<?= $this->Url->build(['controller' => 'Cashbacks', 'action' => 'cashback']) ?>",
                method: "POST",
                data: { deal_id: dealID },
                headers: {
                    'X-CSRF-Token': csrfToken // CSRF token should be included in the headers
                },
                success: function (response) {
                    // Handle the response and display the coupon details on the same page
                    // You can update a specific section of the page to show the coupon details.
                    // For example, you can use $('#coupon-details').html(response) to replace the content of a div with ID 'coupon-details'.
                    $('#cashback').html(response);
                },
                error: function (xhr, status, error) {
                    console.error(error);
                }
            });
        }
    });

</script>