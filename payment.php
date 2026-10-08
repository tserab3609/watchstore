<?php

include('layouts/header.php');

if (isset($_POST['order_pay_btn'])) {

    $order_total_price = $_POST['order_total_price'];
    $order_id = $_POST['order_id'];

    // Store actual database order ID
    $_SESSION['order_id'] = $order_id;

    // Create unique eSewa transaction ID
    $transaction_uuid = uniqid();

    $_SESSION['transaction_uuid'] = $transaction_uuid;

} else {

    $order_total_price = 0;
    $order_id = '';
    $transaction_uuid = '';
}


// eSewa signed message
$message =
    "total_amount={$order_total_price}," .
    "transaction_uuid={$transaction_uuid}," .
    "product_code=EPAYTEST";


// eSewa secret key
$secret_key = '8gBm/:&EnhH.1/q';


// Generate signature
$hash = hash_hmac(
    'sha256',
    $message,
    $secret_key,
    true
);

$signature = base64_encode($hash);

?>

<!-- Payment -->

<section class="my-5 py-5">

    <div class="container text-center mt-3 pt-5">

        <h2 class="font-weight-bold">--Payment--</h2>

        <hr class="mx-auto">

    </div>


    <div class="mx-auto container text-center">

        <?php if ($order_total_price > 0) { ?>

            <p>
                Total payment:
                Rs.<?php echo $order_total_price; ?>
            </p>


            <form
                action="https://rc-epay.esewa.com.np/api/epay/main/v2/form"
                method="POST"
            >

                <input
                    type="hidden"
                    name="amount"
                    value="<?php echo $order_total_price; ?>"
                    required
                >

                <input
                    type="hidden"
                    name="tax_amount"
                    value="0"
                    required
                >

                <input
                    type="hidden"
                    name="total_amount"
                    value="<?php echo $order_total_price; ?>"
                    required
                >

                <input
                    type="hidden"
                    name="transaction_uuid"
                    value="<?php echo $transaction_uuid; ?>"
                    required
                >

                <input
                    type="hidden"
                    name="product_code"
                    value="EPAYTEST"
                    required
                >

                <input
                    type="hidden"
                    name="product_service_charge"
                    value="0"
                    required
                >

                <input
                    type="hidden"
                    name="product_delivery_charge"
                    value="0"
                    required
                >

                <!-- IMPORTANT -->

                <input
                    type="hidden"
                    name="success_url"
                    value="http://localhost/watch/esewa_success.php"
                    required
                >

                <input
                    type="hidden"
                    name="failure_url"
                    value="http://localhost/watch/esewa_failure.php"
                    required
                >

                <input
                    type="hidden"
                    name="signed_field_names"
                    value="total_amount,transaction_uuid,product_code"
                    required
                >

                <input
                    type="hidden"
                    name="signature"
                    value="<?php echo $signature; ?>"
                    required
                >

                <input
                    src="assets/imgs/esewa.webp"
                    type="image"
                    height="80px"
                    width="130px"
                >

            </form>

        <?php } else { ?>

            <p>You don't have any order for payment</p>

        <?php } ?>

    </div>

</section>


<?php

include('layouts/footer.php');

?>