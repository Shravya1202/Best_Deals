<center>
    <h1>Cashback Information</h1>
</center>
<div id="cashback_information"></div>
<div id="rules">


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            const dealID = <?= h($deal->deal_id) ?>;
            handlecashback(dealID);

            function handlecashback(dealID) {
                const csrfToken = $('meta[name="csrfToken"]').attr('content');


                // Make an AJAX request to fetch the coupon details
                $.ajax({
                    url: "<?= $this->Url->build(['controller' => 'Cashbacks', 'action' => 'cashbackinfo']) ?>",
                    method: "POST",
                    data: { deal_id: dealID },
                    headers: {
                        'X-CSRF-Token': csrfToken // CSRF token should be included in the headers
                    },
                    success: function (response) {
                        // Handle the response and display the coupon details on the same page
                        // You can update a specific section of the page to show the coupon details.
                        // For example, you can use $('#coupon-details').html(response) to replace the content of a div with ID 'coupon-details'.
                        $('#cashback_information').html(response);
                    },
                    error: function (xhr, status, error) {
                        console.error(error);
                    }
                });
            }
        });

    </script>