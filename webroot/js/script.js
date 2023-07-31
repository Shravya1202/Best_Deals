<script>
    $(document).ready(function () {
        var categoryId = null;
        $(".category-link").on("click", function (event) {
            event.preventDefault();
            const categoryId = $(this).data("category-id");
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
                    $('#coupon-details').html(response);
                },
                error: function (xhr, status, error) {
                    console.error(error);
                }
            });
        });
    });
</script>