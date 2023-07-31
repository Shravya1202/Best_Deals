<!-- src/Template/Categories/index.ctp -->
<!-- Include jQuery library -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<div id="main">
    <table>
        <tr>
            <th id=heading>
                <h2>India's Best Daily Deals!!</h2>
            </th>
        </tr>
        <tr>
            <td>
                <div class="category-container">
                    <?php if (!empty($categories)): ?>
                        <div class="category-item">
                            <?php foreach ($categories as $category): ?>
                                <p id='cat_title'><a href="#" class="category-link"
                                        data-category-id="<?= $category->category_id ?>">
                                        <?= $this->Html->image($category->image, ['alt' => $category->category_name]) ?>
                                    </a>
                                    <?= h($category->category_name); ?>
                                </p>
                            <?php endforeach; ?>
                        </div>
                    <?php else: ?>
                        <p>No categories found.</p>
                    <?php endif; ?>
                </div>
            </td>
        </tr>
    </table>


    <table>
        <tr>
            <th>
                <div id="coupon-details">
                    <h1 id="coupon"></h1>
                </div>
            </th>
            <th>
                <div id="cashback-details">
                    <h1 id="cashback"></h1>
                </div>
            </th>
        </tr>
    </table>
    <div id="corresponding-container"></div>
</div>
<?= $this->Html->css('style.css'); ?>
<script>
    $(document).ready(function () {

        const categoryHeading = document.getElementById('cat_title');

        var currentcategoryId = null;
        var elementsCreated = false;


        $(".category-link").on("click", function (event) {
            event.preventDefault();
            var newcategoryId = $(this).data("category-id");
            console.log("Cashback heading clicked for category ID:", newcategoryId);
            const csrfToken = $('meta[name="csrfToken"]').attr('content');


            if (!elementsCreated) {

                const couponHeading = document.getElementById('coupon');
                couponHeading.textContent = "Coupons";

                const cashbackHeading = document.getElementById('cashback');
                cashbackHeading.textContent = "Cashback";

                elementsCreated = true;

            }

            if (newcategoryId !== currentcategoryId) {
                currentcategoryId = newcategoryId;
                $(".category-link").css("border", "none");
                $(this).css("border", "6px solid rgb(132, 132, 218)");
                const correspondingContainer = document.getElementById('corresponding-container');
                correspondingContainer.innerHTML = ''; // Clear the content
            }

            const couponHeading = document.getElementById('coupon');
            couponHeading.classList.remove('clicked-heading');
            couponHeading.onclick = function () {
                couponHeading.classList.add('clicked-heading');
                cashbackHeading.classList.remove('clicked-heading');
                handleCouponClick(currentcategoryId);
            };

            const cashbackHeading = document.getElementById('cashback');
            cashbackHeading.classList.remove('clicked-heading');
            cashbackHeading.onclick = function () {
                cashbackHeading.classList.add('clicked-heading');
                couponHeading.classList.remove('clicked-heading');
                handleCashbackClick(currentcategoryId);
            };

        });

        function handleCouponClick(categoryId) {

            const csrfToken = $('meta[name="csrfToken"]').attr('content');


            // Make an AJAX request to fetch the coupon details
            $.ajax({
                url: "<?= $this->Url->build(['controller' => 'Categories', 'action' => 'getCoupons']) ?>",
                method: "POST",
                data: { category_id: categoryId },
                headers: {
                    'X-CSRF-Token': csrfToken // CSRF token should be included in the headers
                },
                success: function (response) {
                    // Handle the response and display the coupon details on the same page
                    // You can update a specific section of the page to show the coupon details.
                    // For example, you can use $('#coupon-details').html(response) to replace the content of a div with ID 'coupon-details'.
                    $('#corresponding-container').html(response);
                },
                error: function (xhr, status, error) {
                    console.error(error);
                }
            });
        }

        function handleCashbackClick(categoryId) {

            const csrfToken = $('meta[name="csrfToken"]').attr('content');


            // Make an AJAX request to fetch the coupon details
            $.ajax({
                url: "<?= $this->Url->build(['controller' => 'Categories', 'action' => 'getCashbacks']) ?>",
                method: "POST",
                data: { category_id: categoryId },
                headers: {
                    'X-CSRF-Token': csrfToken // CSRF token should be included in the headers
                },
                success: function (response) {
                    // Handle the response and display the coupon details on the same page
                    // You can update a specific section of the page to show the coupon details.
                    // For example, you can use $('#coupon-details').html(response) to replace the content of a div with ID 'coupon-details'.
                    $('#corresponding-container').html(response);
                },
                error: function (xhr, status, error) {
                    console.error(error);
                }
            });

        }

    });


</script>